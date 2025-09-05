<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    public function run(): void
    {
        // 1) إنشاء الأدوار (idempotent)
        foreach (['admin', 'expert', 'member'] as $r) {
            Role::firstOrCreate(['name' => $r], ['guard_name' => 'web']);
        }

        // 2) إنشاء مستخدمين افتراضيين (إن لم يكونوا موجودين)
        $admin = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin User',
                'username' => 'admin',
                'email_verified_at' => now(),
                'password' => Hash::make('password'), // غيّرها في الإنتاج
                'remember_token' => Str::random(10),
            ]
        );
        $admin->assignRole('admin');

        $expert = User::firstOrCreate(
            ['email' => 'expert@example.com'],
            [
                'name' => 'Expert User',
                'username' => 'expert',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
            ]
        );
        $expert->assignRole('expert');

        $member = User::firstOrCreate(
            ['email' => 'member@example.com'],
            [
                'name' => 'Member User',
                'username' => 'member',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
            ]
        );
        $member->assignRole('member');

        // 3) لو عندك أول مستخدم (أنشأه Breeze مثلاً) وتريد تعيينه Admin:
        $first = User::orderBy('id')->first();
        if ($first && ! $first->hasAnyRole(['admin', 'expert', 'member'])) {
            $first->assignRole('admin');
        }
    }
}
