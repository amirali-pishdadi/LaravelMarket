<?php

namespace Database\Factories;

use Faker\Generator as Faker;


use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'        => fake()->word,
            'description' => fake()->paragraph,
            'category_id' => fake()->numberBetween(1, 10),
            'price'       => fake()->randomFloat(2, 10, 1000),
            'quantity'    => fake()->numberBetween(1, 100),
            'user_id'     => fake()->numberBetween(1, 10),
            'product_image' => fake()->imageUrl(1080, 800),
            'brand'       => fake()->company,
            'discount'    => fake()->numberBetween(1, 100),
        ];
    }
}
