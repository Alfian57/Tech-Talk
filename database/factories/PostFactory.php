<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'content' => $this->faker->paragraph,
            'is_pinned' => $this->faker->boolean,
            'is_closed' => $this->faker->boolean,
            'user_id' => \App\Models\User::inRandomOrder()->first()->id,
            'category_id' => \App\Models\Category::inRandomOrder()->first()->id,
        ];
    }

    public function configure(): PostFactory
    {
        return $this->afterCreating(function (\App\Models\Post $post) {
            $post->comments()->saveMany(\App\Models\Comment::factory()->count(rand(0, 5))->make());
            $post->reactions()->saveMany(\App\Models\Reaction::factory()->count(rand(5, 75))->make());

            if (rand(1, 3) === 1) {
                $post->reports()->saveMany(\App\Models\Report::factory()->count(rand(1, 3))->make());
            }
        });
    }
}
