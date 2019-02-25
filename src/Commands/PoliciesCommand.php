<?php

namespace BinaryTorch\Blogged\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use BinaryTorch\Blogged\BloggedServiceProvider;

class PoliciesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'blogged:policies';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Setup policies for Blogged articles and categories';

    /**
     * @var Filesystem
     */
    protected $files;

    public function __construct(Filesystem $files)
    {
        parent::__construct();
        $this->files = $files;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->line('Copy the policies to Policies directory');

        $files = [
            __DIR__.'/../../publishable/policies/BloggedArticlePolicy.php' => app_path('Policies/BloggedArticlePolicy.php'),
            __DIR__.'/../../publishable/policies/BloggedCategoryPolicy.php' => app_path('Policies/BloggedCategoryPolicy.php'),
        ];

        foreach ($files as $from => $to) {
            if ($this->files->exists($to)) {
                continue;
            }

            if (! $this->files->exists($dir = dirname($to))) {
                $this->files->makeDirectory($dir, 0755, true);
            }

            $this->files->put($to, $this->replaceNamespace($from));
            $this->info('Copied: '.$to);
        }
    }

    /**
     * Replace default namespace with the actual app namespace
     *
     * @param  string $from Source file
     * @return string
     */
    protected function replaceNamespace($from)
    {
        $content = $this->files->get($from);

        if ('App\\' === ($appNamespace = $this->getLaravel()->getNamespace())) {
            return $content;
        }

        return str_replace('App\\', $appNamespace, $content);
    }

}
