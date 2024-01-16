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
        $created = fake()->dateTimeBetween();
        $updated = $created;
        if(!rand(0,9)){
            $updated = fake()->dateTimeBetween($created);
        }



        return [
            'title' => fake()->sentence(),
            'body' => fake()->paragraphs(3, true),
            'created_at' => $created,
            'updated_at' => $updated,
        ];
    }
}
