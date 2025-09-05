<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;

class PostPolicy
{
    public function view(?User $user, Post $post): bool
    {
        if ($post->status === 'approved') {
            return true;
        }
        if (! $user) {
            return false;
        }

        return $user->id === $post->user_id || $user->hasAnyRole(['admin', 'expert']);
    }

    public function create(User $user): bool
    {
        return $user->hasAnyRole(['member', 'expert', 'admin']);
    }

    public function update(User $user, Post $post): bool
    {
        return $user->id === $post->user_id || $user->hasAnyRole(['admin']);
    }

    public function review(User $user, Post $post): bool
    {
        return $user->hasAnyRole(['admin']);
    }
}
