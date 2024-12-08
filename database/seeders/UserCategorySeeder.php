<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::all()->each(function (User $user) {
            $categories = Category::inRandomOrder()->limit(rand(1, 3))->get();
            $user->categories()->attach($categories);
        });
    }
}
