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

        $this->line('Dumping the autoloaded files and reloading all new files.. 🍪');
        $composer = $this->findComposer();
        $process = new Process($composer.' dump-autoload');
        $process->setTimeout(null);
        $process->setWorkingDirectory(base_path())->run();

        $this->info('Blogged successfully installed! Enjoy 😍');
        $this->info('Visit /blog in your browser 👻');
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
}