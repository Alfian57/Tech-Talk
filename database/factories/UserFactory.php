<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'password' => 'password',
            'profile_picture' => 'images/profile-pic/'.$this->faker->file('storage/app/seeder/profile-pic', 'public/storage/images/profile-pic', false),
            'bio' => fake()->optional()->paragraph(),
            'role' => fake()->randomElement(['admin', 'user', 'moderator']),
            'is_banned' => fake()->boolean(),
        ];
    }
}
