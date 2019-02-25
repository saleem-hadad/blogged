<?php

namespace App\Policies;

use App\User;
use BinaryTorch\Blogged\Models\Category;
use Illuminate\Auth\Access\HandlesAuthorization;

/*
 * This Policy is registered in BloggedServiceProvider
 */
class BloggedCategoryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can create categories.
     *
     * @param    \App\User  $user
     * @return  mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the category.
     *
     * @param    \App\User  $user
     * @param    Category  $category
     * @return  mixed
     */
    public function update(User $user, Category $category)
    {
        return true;
    }

    /**
     * Determine whether the user can delete the category.
     *
     * @param    \App\User  $user
     * @param    Category  $category
     * @return  mixed
     */
    public function delete(User $user, Category $category)
    {
        return true;
    }
}
