<?php

namespace BinaryTorch\Blogged\Tests\Unit;

use BinaryTorch\Blogged\Models\Article;
use BinaryTorch\Blogged\Tests\TestCase;

class ArticleTest extends TestCase
{
    /** @test */
    public function it_has_title()
    {
        $article = factory(Article::class)->create(['title' => 'who are you?']);

        $this->assertEquals('who are you?', $article->title);
    }

    /** @test */
    public function it_has_unique_slug()
    {
        $article = factory(Article::class)->create(['slug' => 'slug-me']);
        $this->assertEquals('slug-me', $article->slug);
        
        $this->expectException('\Illuminate\Database\QueryException');
        $article = factory(Article::class)->create(['slug' => 'slug-me']);
    }

    /** @test */
    public function it_has_image()
    {
        $article = factory(Article::class)->create(['image' => 'image-me.com']);

        $this->assertEquals('image-me.com', $article->image);
    }

    /** @test */
    public function it_has_body()
    {
        $article = factory(Article::class)->create(['body' => 'bla bla bla']);

        $this->assertEquals('bla bla bla', $article->body);
    }

    /** @test */
    public function it_has_excerpt_taken_from_its_body()
    {
        $article = factory(Article::class)->create(['body' => 'bla bla blo']);

        $this->assertEquals('bla bla blo...', $article->excerpt);
    }

    /** @test */
    public function it_has_publish_date()
    {
        $article = factory(Article::class)->create();

        $this->assertNotNull($article->publish_date);
    }

    /** @test */
    public function it_is_not_published_by_default()
    {
        $article = factory(Article::class)->create();

        $this->assertFalse($article->published);
    }

    /** @test */
    public function it_is_not_featured_by_default()
    {
        $article = factory(Article::class)->create();

        $this->assertFalse($article->featured);
    }

    /** @test */
    public function it_can_be_published()
    {
        $article = factory(Article::class)->create();

        $article->publish();

        $this->assertTrue($article->published);
    }

    /** @test */
    public function it_can_be_featured()
    {
        $article = factory(Article::class)->create();

        $article->feature();

        $this->assertTrue($article->featured);
    }

    /** @test */
    public function it_can_get_scheduled()
    {
        $this->assertCount(0, Article::scheduled()->get());

        factory(Article::class)->create([
            'publish_date' => now()->subMinute(),
            'published'    => false,
        ]);
        $this->assertCount(1, Article::scheduled()->get());

        factory(Article::class)->create([
            'publish_date' => now()->subMinute(),
            'published'    => true,
        ]);
        $this->assertCount(1, Article::scheduled()->get());

        factory(Article::class)->create([
            'publish_date' => now()->addMinute(),
            'published'    => false,
        ]);
        $this->assertCount(2, Article::scheduled()->get());

        factory(Article::class)->create([
            'publish_date' => null,
            'published'    => false,
        ]);
        $this->assertCount(2, Article::scheduled()->get());
    }

    /** @test */
    public function it_has_uri_path()
    {
        $article = factory(Article::class)->create(['slug' => 'how-to-cook-laravel-application']);

        $this->assertEquals(route('blogged.show', $article->slug), $article->path());
    }

    /** @test */
    public function it_parse_its_body_with_parsedBody_attribute()
    {
        $article = factory(Article::class)->create(['body' => '#hello']);

        $this->assertEquals('<h1>hello</h1>', $article->parsedBody);
    }
}
