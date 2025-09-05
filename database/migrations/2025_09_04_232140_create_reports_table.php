<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reports', function (Blueprint $t) {
            $t->id();
            $t->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $t->morphs('target'); // target_id, target_type
            $t->string('reason')->nullable();
            $t->string('severity', 16)->default('low');      // low|med|high
            $t->string('status', 16)->default('open');       // open|closed|dismissed
            $t->text('moderator_note')->nullable();
            $t->timestamps();
            $t->index(['severity', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
