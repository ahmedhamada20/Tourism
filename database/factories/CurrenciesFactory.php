<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Currencies>
 */
class CurrenciesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => ['en' => $this->faker->name, 'ar' => $this->faker->name],
            'symbol' => $this->faker->randomElement(['abc', 'bcv', 'aed', 'aet', 'qwe']),
            'rate' => $this->faker->randomElement([100.00, 200.00, 300.00, 400.200]),
        ];
    }
}
