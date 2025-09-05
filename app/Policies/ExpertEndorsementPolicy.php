<?php

namespace App\Policies;

use App\Models\ExpertEndorsement;
use App\Models\Post;
use App\Models\User;

class ExpertEndorsementPolicy
{
    public function create(User $user, Post $post): bool
    {
        return $user->hasRole('expert') && $post->status === 'approved';
    }

    public function revoke(User $user, ExpertEndorsement $endorsement): bool
    {
        return $user->hasRole('expert') && $endorsement->expert_id === $user->id;
    }
}
