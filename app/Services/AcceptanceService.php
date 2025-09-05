<?php

namespace App\Services;

use App\Models\Post;

class AcceptanceService
{
    public int $min = 2; // غيّرها من لوحة الإعدادات لاحقاً

    public function refresh(Post $post): void
    {
        if ($post->status !== 'approved') {
            $post->update(['verification_state' => 'none', 'endorse_count' => 0]);

            return;
        }

        $count = $post->endorsements()->where('decision', 'approve')->count();
        $hasCriticalReports = $post->reports()
            ->where('severity', 'high')
            ->where('status', 'open')
            ->exists();

        $state = 'none';
        if ($count >= 1) {
            $state = 'endorsed_partial';
        }
        if ($count >= $this->min && ! $hasCriticalReports) {
            $state = 'accepted';
        }

        $post->update(['verification_state' => $state, 'endorse_count' => $count]);
    }
}
