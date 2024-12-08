<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(5)->create([
            'role' => 'admin',
        ]);

        User::factory(100)->create([
            'role' => 'user',
        ]);

        User::factory(50)->create([
            'role' => 'moderator',
        ]);

        User::factory()->create([
            'name' => 'Admin Dummy',
            'email' => 'admin@admin.com',
            'role' => 'admin',
            'is_banned' => false,
        ]);

        User::factory()->create([
            'name' => 'User Dummy',
            'email' => 'user@user.com',
            'role' => 'user',
            'is_banned' => false,
        ]);

        User::factory()->create([
            'name' => 'Moderator Dummy',
            'email' => 'moderator@moderator.com',
            'role' => 'moderator',
            'is_banned' => false,
        ]);
    }
}
