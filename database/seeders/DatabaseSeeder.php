<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Food;
use App\Models\Meal;
use App\Models\Diet;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Tworzenie produktów
        Food::factory(10)->create();

        // Tworzenie posiłków
        Meal::factory(5)->create();

        // Tworzenie dni diety
        Diet::factory(3)->create();
    }
}
