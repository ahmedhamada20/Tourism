<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Destenation>
 */
class DestenationFactory extends Factory
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
            'note' => ['ar' => $this->faker->paragraph, 'en' => $this->faker->paragraph],
        ];
    }
}
