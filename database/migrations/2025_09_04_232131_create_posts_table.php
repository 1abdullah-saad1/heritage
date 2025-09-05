<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $t) {
            $t->id();
            $t->foreignId('user_id')->constrained()->cascadeOnDelete();
            $t->text('body')->nullable();
            $t->string('status', 32)->default('draft')->index();                 // draft|submitted|under_review|changes_requested|approved|rejected
            $t->string('verification_state', 32)->default('none')->index();      // none|endorsed_partial|accepted
            $t->unsignedBigInteger('endorse_count')->default(0);
            $t->foreignId('category_id')->nullable()->constrained()->nullOnDelete();
            $t->foreignId('location_id')->nullable()->constrained()->nullOnDelete();
            $t->string('license', 32)->nullable();                               // cc_by|cc_by_sa|custom|null
            $t->json('meta')->nullable();                                        // source_link, artifact_date, etc.
            $t->timestamp('approved_at')->nullable();
            $t->text('rejected_reason')->nullable();
            $t->timestamps();
            $t->index(['user_id', 'created_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
