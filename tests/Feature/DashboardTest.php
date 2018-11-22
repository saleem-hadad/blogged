<?php

namespace BinaryTorch\Blogged\Tests\Feature;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use BinaryTorch\Blogged\Tests\TestCase;
use BinaryTorch\Blogged\Models\Article;
use BinaryTorch\Blogged\Models\Category;

class DashboardTest extends TestCase
{
    /** @test */
    public function a_guest_may_not_visit_dashboard()
    {
        $this->get('/blog/dashboard')
            ->assertRedirect('/login');
    }

    /** @test */
    public function authenticated_users_can_view_dashboard()
    {
        $this->authenticate();

        $this->get('/blog/dashboard')
            ->assertStatus(200);
    }

    /** @test */
    public function authorized_users_can_fetch_all_articles_with_pagination_and_statistics()
    {
        $this->authenticate();

        factory(Article::class, 2)->create()->each->publish();

        $this->get('/blogged-api/articles')
            ->assertJsonCount(2, 'data')
            ->assertJsonStructure([
                'data' => [
                    ['title', 'slug', 'image', 'published']
                ],
                'links',
                'statistics'
            ])
            ->assertStatus(200);
    }

    /** @test */
    public function authorized_users_can_fetch_any_article()
    {
        $this->authenticate();

        factory(Article::class)->create(['slug' => 'how-to-sleep-8h-in-4h']);

        $this->get('/blogged-api/articles/how-to-sleep-8h-in-4h')
            ->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    'id', 
                    'title',
                    'slug',
                ]
            ]);
    }

    /** @test */
    public function authorized_users_can_create_new_article()
    {
        $this->authenticate();

        factory(Category::class)->create(['slug' => 'category-one']);

        $newData = [
            'title'       => 'How are you?',
            'slug'        => 'how-are-you',
            'body'        => '> you are cool',
            'excerpt'     => 'you are not cool',
            'category_id' => 1,
            'image'       => 'image.png',
            'featured'    => true,
            'published'   => true,
        ];
        
        $this->json('POST', '/blogged-api/articles', $newData)->assertStatus(201);

        $this->assertDatabaseHas('blogged_articles', $newData);
    }

    /** @test */
    public function authorized_users_can_update_existing_article()
    {
        $this->authenticate();

        factory(Article::class)->create(['slug' => 'old-article']);

        $newData = [
            'title'       => 'How are you?',
            'slug'        => 'how-are-you',
            'body'        => 'you are cool',
            'excerpt'     => 'you are not cool',
            'image'       => 'newImage.png',
            'featured'    => true,
            'published'   => true,
        ];

        $this->json('PUT', '/blogged-api/articles/old-article', $newData)->assertStatus(204);

        $this->assertDatabaseHas('blogged_articles', $newData);
    }

    /** @test */
    public function authorized_users_can_delete_existing_article()
    {
        $this->authenticate();

        factory(Article::class)->create(['slug' => 'old-article']);

        $this->json('DELETE', '/blogged-api/articles/old-article')->assertStatus(204);

        $this->assertDatabaseMissing('blogged_articles', ['slug' => 'old-article']);
    }
}
