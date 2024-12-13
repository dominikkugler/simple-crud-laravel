<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Food>
 */
class FoodFactory extends Factory
{
    protected $model = \App\Models\Food::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word, // Nazwa produktu
            'calories' => $this->faker->numberBetween(50, 500), // Kaloryczność
            'unit' => $this->faker->randomElement(['g', 'szt', 'ml']), // Jednostka
        ];
    }
}
