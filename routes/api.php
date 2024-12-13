<?php 

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FoodController;
use App\Http\Controllers\MealController;
use App\Http\Controllers\DietController;

// API Routes for Food
Route::apiResource('foods', FoodController::class);

// API Routes for Meal
Route::apiResource('meals', MealController::class);

// API Routes for Diet
Route::apiResource('diets', DietController::class);
