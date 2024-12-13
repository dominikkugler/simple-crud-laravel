<?php

namespace Database\Factories;

use App\Models\Diet;
use App\Models\Meal;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DietMeal>
 */
class DietMealFactory extends Factory
{
    protected $model = \App\Models\DietMeal::class;

    public function definition()
    {
        return [
            'diets_id' => Diet::factory(), // Powiązanie z dietą
            'meals_id' => Meal::factory(), // Powiązanie z posiłkiem
        ];
    }
}

