<?php

namespace BinaryTorch\Blogged\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Http\Request;
use BinaryTorch\Blogged\Models\Article;

class CreateNewArticle
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Article::create([
            'title'        => request()->title, 
            'slug'         => request()->slug,
            'image'        => request()->image, 
            'excerpt'      => request()->excerpt, 
            'body'         => request()->body, 
            'publish_date' => request()->publish_date, 
            'published'    => request()->published, 
            'featured'     => request()->featured,
            'category_id'  => request()->category_id,
            'author_id'    => auth()->id(),
        ]);
    }
}
