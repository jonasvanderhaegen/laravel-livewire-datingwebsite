<?php

declare(strict_types=1);

namespace Modules\Core\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;

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
        if (!File::exists(base_path('.env'))) {
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
    }
}
