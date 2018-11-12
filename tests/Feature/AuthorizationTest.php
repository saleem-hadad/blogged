<?php

namespace BinaryTorch\Blogged\Tests\Feature;

use Illuminate\Support\Facades\Gate;
use BinaryTorch\Blogged\Tests\TestCase;
use BinaryTorch\Blogged\Models\Article;
use BinaryTorch\Blogged\Tests\Fixture\ArticlePolicy;

class AuthorizationTest extends TestCase
{
    /** @test */
    public function a_model_with_policy_all_its_actions_will_follow_it()
    {
        $this->assertFalse(Article::hasAuthorizationGate());

        Gate::policy(Article::class, ArticlePolicy::class);

        $this->assertTrue(Article::hasAuthorizationGate());
    }
}
