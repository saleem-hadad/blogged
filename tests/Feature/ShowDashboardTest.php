<?php

namespace BinaryTorch\Blogged\Tests\Feature;

use BinaryTorch\Blogged\Tests\TestCase;

class ShowDashboardTest extends TestCase
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
    public function authorized_users_can_view_all_()
    {
        $this->authenticate();

        $this->get('/blogged-api/articles')
            ->assertStatus(200);
    }
}
