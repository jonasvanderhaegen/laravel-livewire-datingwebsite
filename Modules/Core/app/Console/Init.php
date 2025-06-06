<?php

declare(strict_types=1);

namespace Modules\Core\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

final class Init extends Command
{
    /**
     * The name and signature of the console command.
     *
     * You can pass `--env=sail`, `--env=herd-free`, `--env=herd-pro`, or `--env=mamp` to skip the prompt.
     */
    protected $signature = 'core:init
                            {--env= : Target local environment (sail, herd-free, herd-pro, or mamp)}';

    /**
     * The console command description.
     */
    protected $description = 'Bootstrap .env for Herd (Free/Pro—PostgreSQL), Sail (Valkey), or MAMP Pro.';

    public function handle(): void
    {
        $this->info('▶ Starting initialization.');

        // 1) Ensure .env exists
        if (! File::exists(base_path('.env'))) {
            $this->info('No .env file found. Copying .env.example → .env');
            File::copy(base_path('.env.example'), base_path('.env'));
        }

        // 2) Generate APP_KEY if missing
        if (empty(config('app.key'))) {
            $this->info('APP_KEY is empty. Generating a new key…');
            Artisan::call('key:generate', ['--ansi' => true]);
            $this->info('✔ APP_KEY set.');
        } else {
            $this->info('APP_KEY already exists. Skipping key:generate.');
        }

        // 3) Determine the environment choice
        $envOption = mb_strtolower((string) $this->option('env'));
        $validEnvs = ['sail', 'herd-free', 'herd-pro', 'mamp'];

        if (! in_array($envOption, $validEnvs, true)) {
            $envOption = $this->choice(
                'Which local environment are you using?',
                ['herd-free', 'herd-pro', 'sail', 'mamp'],
                0
            );
        }

        $this->info("→ Configuring for “{$envOption}”…");

        // 4) Gather / confirm values based on selection
        switch ($envOption) {
            case 'sail':
                // ──────────────────────────────
                // Laravel Sail with Valkey instead of Redis
                // ──────────────────────────────
                //
                // In your docker-compose, you must have a Valkey service (e.g. “valkey”).
                // We configure:
                //   DB (MySQL by default), and VALKEY for cache/queue.
                //
                $dbConnection = 'mysql';
                $dbHost = 'mysql';
                $dbPort = '3306';
                $dbDatabase = $this->ask('Database name', 'laravel');
                $dbUsername = $this->ask('Database username', 'sail');
                $dbPassword = $this->ask('Database password', 'password');
                $appUrl = $this->ask('Application URL', 'http://localhost');

                // Valkey instead of Redis
                $valkeyHost = $this->ask('Valkey host (service name)', 'valkey');
                $valkeyPort = $this->ask('Valkey port', '6379');
                $valkeyPass = $this->ask('Valkey password (leave blank if none)', '');
                break;

            case 'herd-free':
            case 'herd-pro':
                // ──────────────────────────────
                // Laravel Herd (Free vs Pro) → PostgreSQL
                // ──────────────────────────────
                //
                // Herd always uses local Postgres. We just ask for DB name/credentials.
                //
                $dbConnection = 'pgsql';
                $dbHost = $this->ask('PostgreSQL host', '127.0.0.1');
                $dbPort = $this->ask('PostgreSQL port', '5432');
                $dbDatabase = $this->ask('Database name', 'laravel');
                $dbUsername = $this->ask('Database username', 'postgres');
                $dbPassword = $this->ask('Database password (leave blank if none)', '');

                // Herd’s “Free” vs “Pro” differs in TLS and custom domain:
                if ($envOption === 'herd-free') {
                    // Herd Free URLs are *.test without TLS
                    $defaultAppNameSlug = Str::slug(Str::replace('\\', '.', config('app.name', 'laravel')));
                    $defaultAppUrl = "http://{$defaultAppNameSlug}.test";
                } else {
                    // Herd Pro URLs usually use https://{name}.com (or .io), we prompt
                    $defaultAppUrl = $this->ask(
                        'Herd Pro URL (e.g. https://my-app.local)',
                        'https://'.Str::slug(Str::replace('\\', '.', config('app.name', 'laravel'))).'.local'
                    );
                    // If you have a valid certificate, Herd Pro will serve on HTTPS.
                }
                $appUrl = $this->ask('Application URL', $defaultAppUrl);
                break;

            case 'mamp':
            default:
                // ──────────────────────────────
                // MAMP Pro → MySQL
                // ──────────────────────────────
                //
                $dbConnection = 'mysql';
                $dbHost = $this->ask('Database host', '127.0.0.1');
                $dbPort = $this->ask('Database port', '8889');
                $dbDatabase = $this->ask('Database name', 'laravel');
                $dbUsername = $this->ask('Database username', 'root');
                $dbPassword = $this->ask('Database password', 'root');
                $appUrl = $this->ask('Application URL', 'http://localhost:8888');
                break;
        }

        // 5) Write these values into .env
        $this->info('⬇ Writing configuration to .env…');

        $this->setEnvironmentValue('APP_URL', $appUrl);
        $this->setEnvironmentValue('DB_CONNECTION', $dbConnection);
        $this->setEnvironmentValue('DB_HOST', $dbHost);
        $this->setEnvironmentValue('DB_PORT', $dbPort);
        $this->setEnvironmentValue('DB_DATABASE', $dbDatabase);
        $this->setEnvironmentValue('DB_USERNAME', $dbUsername);
        $this->setEnvironmentValue('DB_PASSWORD', $dbPassword);

        // 6) If Sail, configure Valkey instead of Redis
        if ($envOption === 'sail') {
            // Set Redis client to valkey
            $this->setEnvironmentValue('REDIS_CLIENT', 'valkey');
            // Valkey host/port/password
            $this->setEnvironmentValue('VALKEY_HOST', $valkeyHost);
            $this->setEnvironmentValue('VALKEY_PORT', $valkeyPort);
            $this->setEnvironmentValue('VALKEY_PASSWORD', $valkeyPass);
        }

        // 7) Clear cached config so new values take effect
        $this->info('Clearing cached config…');
        Artisan::call('config:clear', ['--ansi' => true]);

        $this->info("✅ core:init finished. “{$envOption}” is configured.");
    }

    /**
     * Replace or append a key=value pair in the .env file.
     */
    protected function setEnvironmentValue(string $key, string $value): void
    {
        $envPath = base_path('.env');

        if (! File::exists($envPath)) {
            // If .env somehow disappeared, re-create
            File::copy(base_path('.env.example'), $envPath);
        }

        // Escape for quotes
        $escaped = str_replace(
            ['\\', "\n", "\r", '"'],
            ['\\\\', '\\n', '\\r', '\"'],
            $value
        );

        $pattern = "/^{$key}=.*/m";
        $contents = File::get($envPath);

        if (preg_match($pattern, $contents)) {
            // Replace existing line
            $contents = preg_replace(
                $pattern,
                "{$key}=\"{$escaped}\"",
                $contents
            );
        } else {
            // Append as new
            $contents .= "\n{$key}=\"{$escaped}\"\n";
        }

        File::put($envPath, $contents);
    }
}
