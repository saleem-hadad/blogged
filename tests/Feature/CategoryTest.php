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

    /** @test */
    public function authorized_users_can_create_categories()
    {
        $this->authenticate();

        $this->json('POST', 'blogged-api/categories', ['title' => 'bla', 'slug' => 'blo'])
            ->assertJsonStructure(['data' => ['id', 'title', 'slug']])
            ->assertStatus(201);

        // test unique slug
        $this->json('POST', 'blogged-api/categories', ['title' => 'bla', 'slug' => 'blo'])
            ->assertStatus(422);

        $this->assertDatabaseHas('blogged_categories', ['title' => 'bla']);
    }

    /** @test */
    public function authorized_users_can_update_categories()
    {
        $this->authenticate();

        $this->json('POST', 'blogged-api/categories', ['title' => 'bla', 'slug' => 'blo']);

        $this->json('PUT', 'blogged-api/categories/1', ['title' => 'newTitle', 'slug' => 'newSlug'])
            ->assertStatus(204);

        $this->assertDatabaseHas('blogged_categories', ['title' => 'newTitle', 'slug' => 'newSlug']);
    }

    /** @test */
    public function authorized_users_can_delete_categories()
    {
        $this->authenticate();

        $this->json('POST', 'blogged-api/categories', ['title' => 'bla', 'slug' => 'blo']);

        $this->json('DELETE', 'blogged-api/categories/1')
            ->assertStatus(204);

        $this->assertDatabaseMissing('blogged_categories', ['title' => 'bla']);
    }
}
