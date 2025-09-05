<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('expert_endorsements', function (Blueprint $t) {
            $t->id();
            $t->foreignId('post_id')->constrained('posts')->cascadeOnDelete();
            $t->foreignId('expert_id')->constrained('users')->cascadeOnDelete();
            $t->string('decision', 16); // approve|revoke
            $t->text('note')->nullable();
            $t->string('evidence_path')->nullable();
            $t->timestamps();
            $t->index(['post_id', 'expert_id', 'decision']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('expert_endorsements');
    }
};
