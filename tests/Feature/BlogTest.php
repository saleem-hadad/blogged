<?php

namespace BinaryTorch\Blogged\Tests\Feature;

use BinaryTorch\Blogged\Tests\TestCase;
use BinaryTorch\Blogged\Models\Article;

class BlogTest extends TestCase
{
    /** @test */
    public function a_guest_can_view_the_blog_home_page()
    {
        $article = factory(Article::class)->create(['title' => 'How to become a developer in 1 min?']);

        $this->get('/blog')
            ->assertStatus(200)
            ->assertSee('How to become a developer in 1 min?');
    }

    /** @test */
    public function a_guest_can_view_a_given_article()
    {
        $article = factory(Article::class)->create([
            'title' => 'How to become a developer in 1 min?',
            'slug'  => 'how-to',
        ]);

        $this->get($article->path())
            ->assertStatus(200)
            ->assertSee('How to become a developer in 1 min?');
    }
}
