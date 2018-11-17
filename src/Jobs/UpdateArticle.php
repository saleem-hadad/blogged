<?php

namespace BinaryTorch\Blogged\Jobs;

use Illuminate\Http\Request;
use Illuminate\Bus\Queueable;
use Mews\Purifier\Facades\Purifier;
use Illuminate\Queue\SerializesModels;
use BinaryTorch\Blogged\Models\Article;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use BinaryTorch\Blogged\Http\Requests\UpdateArticleFormRequest;

class UpdateArticle
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    
    protected $article;
    protected $request;

    /**
     * __construct
     *
     * @param Article $article
     * @param UpdateArticleFormRequest $request
     * @return void
     */
    public function __construct(Article $article, UpdateArticleFormRequest $request)
    {
        $this->article = $article;
        $this->request = $request;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if($this->request->has('body')) {
            $body = Purifier::clean($this->request->body, [
                'AutoFormat.AutoParagraph' => false,
                'AutoFormat.RemoveEmpty'   => false,
            ]);
            $this->request->body = $body;
        }

        if($this->request->has('image') && ($this->article->image != $this->request->image)) {
            $this->article->deleteImage();
        }

        $allowdAttributes = ['title', 'slug', 'image', 'excerpt', 'body', 'publish_date', 'featured', 'category_id'];
        $this->article->update($this->request->only($allowdAttributes));

        if($this->request->published) {
            $this->article->publish();
        }
    }
}
