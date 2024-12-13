<?php

namespace Database\Factories;

use App\Models\Food;
use App\Models\Meal;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FoodMeal>
 */
class FoodMealFactory extends Factory
{
    protected $model = \App\Models\FoodMeal::class;

    public function definition()
    {
        return [
            'foods_id' => Food::factory(), // Powiązanie z produktem
            'meals_id' => Meal::factory(), // Powiązanie z posiłkiem
            'quantity' => $this->faker->numberBetween(1, 100), // Ilość produktu
        ];
    }
}

