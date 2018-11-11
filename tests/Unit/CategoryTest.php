<?php

namespace BinaryTorch\Blogged\Tests\Unit;

use BinaryTorch\Blogged\Tests\TestCase;
use BinaryTorch\Blogged\Models\Article;
use BinaryTorch\Blogged\Models\Category;

class CategoryTest extends TestCase
{
    /** @test */
    public function it_has_title()
    {
        $category = factory(Category::class)->create(['title' => 'education']);

        $this->assertEquals('education', $category->title);
    }

    /** @test */
    public function it_has_unique_slug()
    {
        $category = factory(Category::class)->create(['slug' => 'education']);
        $this->assertEquals('education', $category->slug);
        
        $this->expectException('\Illuminate\Database\QueryException');
        $category = factory(Category::class)->create(['slug' => 'education']);
    }

    /** @test */
    public function it_has_many_articles()
    {
        $category = factory(Category::class)->create();
        
        factory(Article::class)->create(['category_id' => $category->id]);

        $this->assertCount(1, $category->articles);
    }
}
