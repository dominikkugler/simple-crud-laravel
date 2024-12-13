<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\MealController;
use App\Http\Controllers\DietController;

// Strona główna
Route::get('/', function () {
    return view('welcome'); // Możesz zmienić to na własny widok
});

Route::resource('foods', FoodController::class);

// Wyświetlanie listy posiłków
Route::resource('meals', MealController::class);

Route::resource('diets', DietController::class);