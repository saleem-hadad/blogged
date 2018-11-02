<?php

namespace BinaryTorch\Blogged\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;
use BinaryTorch\Blogged\BloggedServiceProvider;

class InstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'blogged:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install Blogged and publish the required assets and configurations.';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->line('Publishing assets and congigurations.. 🍪');
        $this->call('vendor:publish', ['--provider' => BloggedServiceProvider::class, '--tag' => ['blogged_assets', 'blogged_config']]);

        $this->dumpAutoLoad();

        $this->info('Migrating the database tables into your application');
        $this->call('migrate');

        if ($this->confirm('Do you wish to include dummy data?')) {
            $this->line('Seeding dummy data into the database');
            $this->seed('BloggedSeeder');
        }

        $this->info('Adding the storage symlink to your public folder');
        $this->call('storage:link');

        $this->line('Successfully installed Blogged!');
        $this->info('Visit /blog to see the blog articles.');
        $this->info('Visit /blog/dashboard to see the admin panel.');
    }

    /**
     * @return void
     */
    public function dumpAutoLoad()
    {
        $composer = $this->findComposer();
        $process = new Process($composer.' dump-autoload');
        $process->setTimeout(null);
        $process->setWorkingDirectory(base_path())->run();
    }

    /**
     * Get the composer command for the environment.
     *
     * @return string
     */
    protected function findComposer()
    {
        if (file_exists(getcwd().'/composer.phar')) {
            return '"'.PHP_BINARY.'" '.getcwd().'/composer.phar';
        }

        return 'composer';
    }

    /**
     * @param $class
     * @return void
     */
    public function seed($class)
    {
        if (!class_exists($class)) {
            $seedersPath = dirname(__DIR__) . '/../database/seeds/';

            require_once $seedersPath.$class.'.php';
        }

        with(new $class())->run();
    }
}