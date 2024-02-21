<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class DeployCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'deploy';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Setting up the project...');
        $this->call('optimize:clear');
        $this->info('Bringing application down for maintenance...');
        $this->call('down');
        $this->info('Migrating the database...');
        $this->call('migrate');
        $this->info(shell_exec('git stash'));
        $this->info(shell_exec('git pull'));
//        $this->call('php artisan migrate:fresh --seed');
//        $this->info('Generating a new application key...');
//        $this->call('key:generate', [
//            '--force' => true,
//        ]);
        $this->info(shell_exec('git stash apply'));
//        $this->call('view:cache ');
//        $this->call('config:cache ');
        $this->info('Bringing application up...');
        $this->call('up');

        $this->info('The project is set up!');

        return self::SUCCESS;
    }
}
