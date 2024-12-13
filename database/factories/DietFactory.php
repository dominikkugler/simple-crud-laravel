<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Diet>
 */
class DietFactory extends Factory
{
    protected $model = \App\Models\Diet::class;

    public function definition()
    {
        return [
            'name' => 'Dzień ' . $this->faker->numberBetween(1, 7), // Nazwa dnia diety
            'description' => $this->faker->paragraph(), // Opcjonalny opis diety
        ];
    }
}

