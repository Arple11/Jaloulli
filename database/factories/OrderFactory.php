<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'customer_id' => User::factory(),
            'seller_id' => User::factory(),
            'explanations' => fake()->realTextBetween(30, 50),
            'order_total_price' => fake()->numberBetween(20, 200) * 1000,
            'balance' => -1 * fake()->numberBetween(20, 200) * 1000,
        ];
    }
}
