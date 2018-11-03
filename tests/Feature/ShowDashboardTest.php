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
}
