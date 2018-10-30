<?php

namespace BinaryTorch\Blogged\Tests\Feature;

use BinaryTorch\Blogged\Tests\TestCase;

class ShowBlogTest extends TestCase
{
    /** @test */
    public function a_guest_can_view_the_blog_home_page()
    {
        $this->get('/blog')
            ->assertStatus(200);
    }
}
