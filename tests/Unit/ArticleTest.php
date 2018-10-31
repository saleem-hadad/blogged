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
    public function it_has_body()
    {
        $article = factory(Article::class)->create(['body' => 'bla bla bla']);

        $this->assertEquals('bla bla bla', $article->body);
    }
}
