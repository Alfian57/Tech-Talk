<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'content' => $this->faker->paragraph,
            'is_best' => $this->faker->boolean,
            'user_id' => \App\Models\User::inRandomOrder()->first()->id,
        ];
    }

    public function configure(): CommentFactory
    {
        return $this->afterCreating(function (\App\Models\Comment $comment) {
            $comment->reactions()->saveMany(\App\Models\Reaction::factory()->count(rand(3, 20))->make());
        });
    }
}
