<?php

namespace Database\Factories;

use Faker\Provider\ar_SA\Payment;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Provider\Base;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tnx' => $this->faker->bankAccountNumber(),
            'description' => $this->faker->sentence(),
            'invest_amount' => $this->faker->numberBetween(1000, 10000),
            'type' => fake()->randomElement(['Invest', 'Withdraw']),
            'method' => fake()->randomElement(['Gcash', 'Paypal', 'BPI']),
        ];
    }
}
