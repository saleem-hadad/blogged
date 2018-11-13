<?php

namespace BinaryTorch\Blogged\Tests\Feature;

use BinaryTorch\Blogged\Tests\TestCase;
use BinaryTorch\Blogged\Models\Category;

class CategoryTest extends TestCase
{
    /** @test */
    public function authorized_users_can_fetch_categories()
    {
        $this->authenticate();

        factory(Category::class, 2)->create();

        $this->json('GET', 'blogged-api/categories')
            ->assertJsonCount(2, 'data')
            ->assertJsonStructure(['data'])
            ->assertStatus(200);
    }
}
