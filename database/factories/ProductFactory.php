<?php

namespace Database\Factories;

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
            'product_name' => fake()->unique()->name('male'),
            'explanation' => fake()->realText(),
            'price' => fake()->numberBetween(0,800) * 10000,
            'amount_available' => fake()->numberBetween(0, 500),
            'amount_sold' => fake()->numberBetween(0, 500),
            'tags' => 'game ,' . 'coding ,' . 'console ,' . 'laptop ,'
        ];
    }
}
