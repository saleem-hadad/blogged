<?php

namespace App\Policies;

use App\User;
use BinaryTorch\Blogged\Models\Article;
use Illuminate\Auth\Access\HandlesAuthorization;

/*
 * This Policy is registered in BloggedServiceProvider
 */
class BloggedArticlePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the article.
     *
     * @param    \App\User  $user
     * @param    Article  $article
     * @return  mixed
     */
    public function view(User $user, Article $article)
    {
        return true;
    }

    /**
     * Determine whether the user can create articles.
     *
     * @param    \App\User  $user
     * @return  mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the article.
     *
     * @param    \App\User  $user
     * @param    Article  $article
     * @return  mixed
     */
    public function update(User $user, Article $article)
    {
        return true;
    }

    /**
     * Determine whether the user can delete the article.
     *
     * @param    \App\User  $user
     * @param    Article  $article
     * @return  mixed
     */
    public function delete(User $user, Article $article)
    {
        return true;
    }
}
