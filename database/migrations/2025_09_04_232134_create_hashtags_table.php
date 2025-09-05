<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('hashtags', function (Blueprint $t) {
            $t->id();
            $t->string('tag')->unique();
            $t->unsignedBigInteger('uses')->default(0);
            $t->timestamps();
        });

    }

    public function down(): void
    {
        Schema::dropIfExists('hashtags');
    }
};
