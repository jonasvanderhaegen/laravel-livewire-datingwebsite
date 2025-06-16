<?php

declare(strict_types=1);

namespace Modules\Core\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Redis;
use Modules\Profile\Models\Profile;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

// @codeCoverageIgnoreStart
final class Reset extends Command
{
    /**
     * The name and signature of the console command.
     */
    protected $signature = 'core:reset';

    /**
     * The console command description.
     */
    protected $description = 'Command description.';

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
    public function handle(): void
    {
        $this->info('Delete all data and run migrations.');

        $this->call('cache:clear');

        Redis::del([
            'user_shard:emails',
            'user_shard:ids',
            'user_shard:ulids',
        ]);

        $this->call('migrate:fresh');

        $this->call('migrate:shards', [
            '--refresh' => true,
        ]);

        $this->call('db:seed');

        $this->call('module:seed', [
            '--all' => true,
        ]);

        /*
        $this->call('module:seed', [
            '--all' => true,
        ]);
        */

        /*
        $this->call('migrate:fresh', [
            '--seed' => true,
        ]);

        $this->call('module:seed', [
            '--all' => true,
        ]);

        $this->call('scout:delete-all-indexes');

        $this->call('scout:import', [
            'model' => Profile::class,
        ]);

        $this->call('scout:sync-index-settings');

        $this->call('cache:clear');

        $this->info('All done!');
        */
    }

    /**
     * @return array<int, mixed[]>
     */
    protected function getArguments(): array
    {
        return [
            ['example', InputArgument::REQUIRED, 'An example argument.'],
        ];
    }

    /**
     * @return array<int, mixed[]>
     */
    protected function getOptions(): array
    {
        return [
            ['example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null],
        ];
    }
}
// @codeCoverageIgnoreEnd
