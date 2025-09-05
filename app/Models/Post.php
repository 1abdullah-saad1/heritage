<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['user_id', 'body', 'status', 'verification_state', 'category_id', 'location_id', 'license', 'meta', 'approved_at', 'rejected_reason', 'endorse_count'];

    protected $casts = ['meta' => 'array', 'approved_at' => 'datetime'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function media()
    {
        return $this->hasMany(PostMedia::class)->orderBy('order');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }

    public function hashtags()
    {
        return $this->belongsToMany(Hashtag::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function endorsements()
    {
        return $this->hasMany(ExpertEndorsement::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function reports()
    {
        return $this->morphMany(Report::class, 'target');
    }
}
