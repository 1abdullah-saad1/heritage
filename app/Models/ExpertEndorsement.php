<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExpertEndorsement extends Model
{
    protected $fillable = ['post_id', 'expert_id', 'decision', 'note', 'evidence_path'];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function expert()
    {
        return $this->belongsTo(User::class, 'expert_id');
    }
}
