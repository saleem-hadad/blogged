<?php

namespace BinaryTorch\Blogged\Tests\Feature;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use BinaryTorch\Blogged\Tests\TestCase;
use BinaryTorch\Blogged\Models\Article;

class ImageUploadTest extends TestCase
{
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
