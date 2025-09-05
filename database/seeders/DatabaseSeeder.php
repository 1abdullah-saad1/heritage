<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {// مثال Breeze الافتراضي:
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'username' => 'testuser', // ⬅️ أضِف هذا
        //     'email' => 'test@example.com',
        // ]);
        $this->call(RolesSeeder::class);
    }
}
