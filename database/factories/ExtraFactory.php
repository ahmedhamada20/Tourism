<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Extra>
 */
class ExtraFactory extends Factory
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
            'price_person_eg' => $this->faker->randomElement([50, 100, 150]),
            'price_person_en' => $this->faker->randomElement([50, 100, 150]),
            'number_group' => $this->faker->randomElement([2, 4, 6]),
            'price_group_eg' => $this->faker->randomElement([150, 250, 350]),
            'price_group_en' => $this->faker->randomElement([150, 250, 350]),
        ];
    }
}
