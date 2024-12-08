<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Report>
 */
class ReportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        if ($this->faker->boolean) {
            return [
                'content' => $this->faker->text,
                'status' => $this->faker->randomElement(['opened', 'closed']),
                'comment_id' => \App\Models\Comment::inRandomOrder()->first()->id,
                'post_id' => null,
                'user_id' => \App\Models\User::inRandomOrder()->first()->id,
            ];
        } else {
            return [
                'content' => $this->faker->text,
                'status' => $this->faker->randomElement(['opened', 'closed']),
                'comment_id' => null,
                'post_id' => \App\Models\Post::inRandomOrder()->first()->id,
                'user_id' => \App\Models\User::inRandomOrder()->first()->id,
            ];
        }
    }
}
