<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('likes', function (Blueprint $t) {
            $t->id();
            $t->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $t->morphs('likeable'); // likeable_id, likeable_type
            $t->timestamps();
            $t->unique(['user_id', 'likeable_id', 'likeable_type'], 'uniq_user_like_target');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('likes');
    }
};
