<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Package>
 */
class PackageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => ['ar' => $this->faker->name, 'en' => $this->faker->name],
            'notes' => ['ar' => $this->faker->name, 'en' => $this->faker->name],
            'price' => $this->faker->randomElement([100, 200, 300, 400]),
            'before_price' => $this->faker->randomElement([100, 200, 300, 400]),
            'rate' => $this->faker->randomElement([1, 2, 3, 4]),

        ];
    }
}
