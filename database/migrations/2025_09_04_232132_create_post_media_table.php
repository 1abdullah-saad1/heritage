<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('post_media', function (Blueprint $t) {
            $t->id();
            $t->foreignId('post_id')->constrained('posts')->cascadeOnDelete();
            $t->string('path');
            $t->string('type', 16)->default('image'); // image|video|doc
            $t->unsignedSmallInteger('order')->default(0);
            $t->string('role', 16)->nullable();       // optional: evidence|attachment
            $t->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('post_media');
    }
};
