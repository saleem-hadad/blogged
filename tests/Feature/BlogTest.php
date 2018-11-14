<?php

namespace BinaryTorch\Blogged\Tests\Feature;

use BinaryTorch\Blogged\Tests\TestCase;
use BinaryTorch\Blogged\Models\Article;
use BinaryTorch\Blogged\Models\Category;

class BlogTest extends TestCase
{
    /** @test */
    public function a_guest_can_view_the_blog_home_page_with_published_articles_only()
    {
        $article = factory(Article::class)->create([
            'title' => 'How to become a developer in 1 min?'
        ]);

        $this->get('/blog')
            ->assertStatus(200)
            ->assertDontSee('How to become a developer in 1 min?');

        $article->publish();
        $this->get('/blog')
            ->assertStatus(200)
            ->assertSee('How to become a developer in 1 min?');
    }

    /** @test */
    public function a_guest_can_view_a_given_article_if_published()
    {
        $article = factory(Article::class)->create([
            'title' => 'How to become a developer in 1 min?',
            'slug'  => 'how-to',
        ]);

        $this->get($article->path())
            ->assertStatus(403)
            ->assertDontSee('How to become a developer in 1 min?');

        $article->publish();
        $this->get('/blog')
            ->assertStatus(200)
            ->assertSee('How to become a developer in 1 min?');
    }

    /** @test */
    public function a_guest_can_view_all_articles_in_a_given_category()
    {
        $category = factory(Category::class)->create();
        $article = factory(Article::class)->create([
            'title'       => 'BlaBla',
            'category_id' => $category->id
        ]);

        $article->publish();
        $this->get($category->path())
            ->assertStatus(200)
            ->assertSee('BlaBla');
    }

    /** @test */
    public function a_guest_can_filter_articles_by_title_or_slug()
    {
        $category = factory(Category::class)->create();
        $article = factory(Article::class)->create([
            'title'       => 'BlaBla',
            'slug'        => 'bloblo',
            'category_id' => $category->id
        ]);

        $this->get($category->path() . '?search=nothere')
            ->assertStatus(200)
            ->assertDontSee('BlaBla');

        $this->get($category->path() . '?search=blob')
            ->assertStatus(200)
            ->assertDontSee('BlaBla');
    }
}
