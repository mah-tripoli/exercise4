<?php

namespace Database\Factories;

use App\Models\Genre;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(3),
            'author' => fake()->name(),
            'isbn' => fake()->isbn13(),
            'publish_year' => fake()->year(),
            'genre_id' => Genre::inRandomOrder()->first()->id,
            'available_quantity' => fake()->numberBetween(1, 10),
            'description' => fake()->paragraph(),
        ];
    }
}
