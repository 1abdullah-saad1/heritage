<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $t) {
            $t->string('username')->unique()->after('id');
            $t->string('avatar_path')->nullable();
            $t->string('cover_path')->nullable();
            $t->string('bio', 280)->nullable();
            $t->string('location')->nullable();
            $t->json('settings')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $t) {
            $t->dropUnique('users_username_unique');
            $t->dropColumn(['username', 'avatar_path', 'cover_path', 'bio', 'location', 'settings']);

            $t->dropIndex(['username']);
            $t->dropColumn(['username', 'avatar_path', 'cover_path', 'bio', 'location', 'settings']);
        });
    }
};
