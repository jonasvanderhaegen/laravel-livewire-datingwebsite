<?php

declare(strict_types=1);

namespace Modules\Core\Console;

use Illuminate\Console\Command;
use Modules\Profile\Models\Profile;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

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
