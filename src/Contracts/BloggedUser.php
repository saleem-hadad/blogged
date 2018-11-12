<?php

namespace BinaryTorch\Blogged\Contracts;

interface BloggedUser
{
    /**
     * Get the avatar link for this user.
     *
     * @return string
     */
    public function getAvatarAttribute($value);
}