<?php

namespace Database\Factories;

use App\Models\Destenation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transfer>
 */
class TransferFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'car_name' => $this->faker->name,
            'car_type' => $this->faker->name,
            'car_model' => $this->faker->randomElement([2022, 2030, 2005, 2007, 2009]),
            'name' => ['ar' => $this->faker->name, 'en' => $this->faker->name],
            'notes' => ['ar' => $this->faker->paragraph, 'en' => $this->faker->paragraph],
            'type' => $this->faker->randomElement([1, 0]),
            'price_EG' => $this->faker->randomElement([100, 200, 300, 400, 500]),
            'price_EN' => $this->faker->randomElement([100, 200, 300, 400, 500]),
            'price_EG_go' => $this->faker->randomElement([100, 200, 300, 400, 500]),
            'price_EG_go_back' => $this->faker->randomElement([100, 200, 300, 400, 500]),
            'price_EN_go' => $this->faker->randomElement([100, 200, 300, 400, 500]),
            'price_EN_go_back' => $this->faker->randomElement([100, 200, 300, 400, 500]),
            'start_date' => $this->faker->date('Y-m-d'),
            'end_date' => $this->faker->date('Y-m-d'),
            'rate' => $this->faker->randomElement([1, 2, 3, 4]),
            'destenation_id' => Destenation::all()->random()->id,
            'route_form' => ['ar' => $this->faker->randomElement(['tto', 'ass', 'asa', 'qwe']), 'en' => $this->faker->randomElement(['tto', 'ass', 'asa', 'qwe'])],
            'route_to' => ['ar' => $this->faker->randomElement(['tto', 'ass', 'asa', 'qwe']), 'en' => $this->faker->randomElement(['tto', 'ass', 'asa', 'qwe'])],
        ];
    }
}
