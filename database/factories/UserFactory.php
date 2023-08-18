<?php

namespace Database\Factories;

use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'email' => fake()->unique()->safeEmail(),
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'user_name' => fake()->unique()->userName(),
            'phone_number' => fake()->numberBetween(9000000000,9999999999),
            'role_id' => Role::factory(),
            'age' => fake()->numberBetween(18, 50),
            'gender' => fake()->randomElement(['male', 'female', 'other']),
            'education' => fake()->randomElement(['high_school', 'bachelor', 'master', 'doctorate']),
            'occupation' => fake()->jobTitle(),
            'interests' => fake()->realText(10),
            'hobbies' => fake()->realTextBetween(50, 100),
            'bio' => fake()->realTextBetween(50, 100),
            'postal_code' => fake()->numberBetween(1000000000, 9999999999),
            'address' => fake()->address(),
            'password' => fake()->password(),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
