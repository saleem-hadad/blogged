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

        $this->json('POST', '/blogged-api/articles', [
            'title'       => 'How are you?',
            'slug'        => 'how-are-you',
            'body'        => 'you are cool',
            'excerpt'     => 'you are not cool',
            'category_id' => 1,
            'image'       => 'image.png',
            'featured'    => true,
            'published'   => true,
        ])->assertStatus(201);
    }

    /** @test */
    public function authorized_users_can_upload_images()
    {
        Storage::fake(config('blogged.settings.storage'));

        $this->authenticate();

        $image = UploadedFile::fake()->image('image.jpg');
        $this->json('POST', 'blogged-api/images', [
            'image' => $image,
        ])->assertJsonStructure(['url'])->assertStatus(200);

        Storage::disk(config('blogged.settings.storage'))->assertExists('/public/blogged/images', $image->hashName());
    }

    /** @test */
    public function authorized_users_can_delete_images()
    {
        Storage::fake(config('blogged.settings.storage'));

        // upload an image
        $this->authenticate();
        $image = UploadedFile::fake()->image('image.jpg');
        $response = $this->json('POST', 'blogged-api/images', ['image' => $image]);

        // delete the image
        $path = $response->json()['path'];
        $this->json('DELETE', '/blogged-api/images', [
            'path' => $path
        ])->assertStatus(204);

        Storage::disk(config('blogged.settings.storage'))->assertMissing($path);
    }

    /** @test */
    public function authorized_users_may_not_delete_images_if_linked_with_articles()
    {
        Storage::fake(config('blogged.settings.storage'));

        // upload an image
        $this->authenticate();
        $image = UploadedFile::fake()->image('image.jpg');
        $response = $this->json('POST', 'blogged-api/images', ['image' => $image]);
        $path = $response->json()['path'];

        // link with article
        factory(Article::class)->create(['image' => $path]);
        
        // delete the image
        $this->json('DELETE', '/blogged-api/images', [
            'path' => $path
        ])->assertStatus(403);

        Storage::disk(config('blogged.settings.storage'))->assertExists($path);
    }
}
