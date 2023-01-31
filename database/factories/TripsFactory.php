<?php

namespace Database\Factories;

use App\Models\Destenation;
use App\Models\Transfer;
use App\Models\TripsType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Trips>
 */
class TripsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        TripsType::create([
            'name' => $this->faker->name,
        ]);

        return [
            'name' => ['en' => $this->faker->name, 'ar' => $this->faker->name],
            'notes' => ['en' => $this->faker->name, 'ar' => $this->faker->name],
            'price_adult_EG' => $this->faker->randomElement([100, 200, 300, 400, 500]),
            'price_adult_EN' => $this->faker->randomElement([100, 200, 300, 400, 500]),
            'price_child_EG' => $this->faker->randomElement([10, 20, 30, 40, 50]),
            'price_child_EN' => $this->faker->randomElement([10, 20, 30, 40, 50]),
            'destination_id' => Destenation::all()->random()->id,
            'transfer_id' => Transfer::all()->random()->id,
            'rate' => $this->faker->randomElement([1, 2, 4, 4, 5]),
            'trips_type_id' => TripsType::all()->random()->id,
        ];
    }
}
