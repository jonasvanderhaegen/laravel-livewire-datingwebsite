<?php

declare(strict_types=1);

namespace Modules\Shard\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

final class MigrateShards extends Command
{
    // add a --refresh flag
    protected $signature = 'migrate:shards {--refresh : Perform a migrate:refresh instead of migrate}';

    protected $description = 'Run shard-only migrations on every user_shard_* connection';

    public function handle(): void
    {
        // decide which migration command to run
        $migrationCommand = $this->option('refresh')
            ? 'migrate:refresh'
            : 'migrate';

        // 1) core shard migrations folder
        $paths = [
            base_path('database/migrations_shards'),
        ];

        // 2) each module’s shard migrations
        foreach (File::directories(base_path('Modules')) as $moduleDir) {
            $shardDir = $moduleDir.'/database/migrations_shards';
            if (File::isDirectory($shardDir)) {
                $paths[] = $shardDir;
            }
        }

        $allConnections = config('shard.database.connections');
        $shards = array_filter(
            array_keys($allConnections),
            fn (string $name) => Str::startsWith($name, 'user_shard_')
        );

        // 3) run the chosen migrate* command on each shard
        foreach ($shards as $conn) {
            $this->info("👉 Running `{$migrationCommand}` on connection: {$conn}");
            Artisan::call($migrationCommand, [
                '--database' => $conn,
                '--path' => $paths,
                '--realpath' => true,
                '--force' => true,
            ]);
            $this->line(Artisan::output());
        }
    }
}
