<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('hashtag_post', function (Blueprint $t) {
            $t->id();
            $t->foreignId('hashtag_id')->constrained('hashtags')->cascadeOnDelete();
            $t->foreignId('post_id')->constrained('posts')->cascadeOnDelete();
            $t->unique(['hashtag_id', 'post_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hashtag_post');
    }
};
