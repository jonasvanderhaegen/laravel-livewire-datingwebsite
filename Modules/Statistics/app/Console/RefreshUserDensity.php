<?php

declare(strict_types=1);

namespace Modules\Statistics\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

final class RefreshUserDensity extends Command
{
    /**
     * The name and signature of the console command.
     */
    protected $signature = 'density:refresh';

    /**
     * The console command description.
     */
    protected $description = 'Recompute user density buckets from all shards';

    /**
     * Create a new command instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $shards = ['user_shard_1', 'user_shard_2', 'user_shard_3'];
        $central = DB::connection(config('database.default'));

        foreach ($shards as $shard) {
            $this->info("Extracting from {$shard}…");

            $rows = DB::connection($shard)->table('profiles')
                ->selectRaw('ROUND(lat,1) AS lat_bucket, ROUND(lng,1) AS lng_bucket, COUNT(*) AS user_count')
                ->whereNotNull('lat')->whereNotNull('lng')
                ->groupBy('lat_bucket', 'lng_bucket')
                ->get();

            foreach ($rows as $row) {
                $central->table('user_density_aggregated')
                    ->updateOrInsert(
                        [
                            'lat_bucket' => $row->lat_bucket,
                            'lng_bucket' => $row->lng_bucket,
                            'shard_id' => $shard,
                        ],
                        [
                            'user_count' => $row->user_count,
                            'updated_at' => now(),
                        ]
                    );
            }
        }

        $this->info('User density refreshed on main DB.');
    }

    /**
     * Get the console command arguments.
     */
    protected function getArguments(): array
    {
        return [
            ['example', InputArgument::REQUIRED, 'An example argument.'],
        ];
    }

    /**
     * Get the console command options.
     */
    protected function getOptions(): array
    {
        return [
            ['example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null],
        ];
    }
}
