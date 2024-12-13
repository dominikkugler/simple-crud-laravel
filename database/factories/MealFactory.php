<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Meal>
 */
class MealFactory extends Factory
{
    protected $model = \App\Models\Meal::class;

    public function definition()
    {
        return [
            'name' => $this->faker->randomElement(['Śniadanie', 'Obiad', 'Kolacja', 'Przekąska']), // Nazwa posiłku
            'description' => $this->faker->sentence(), // Opis posiłku
        ];
    }
}

