<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class FoodMeal extends Pivot
{
    use HasFactory;

    protected $table = 'food_meal'; // Nazwa tabeli pośredniej

    // Kolumny, które mogą być masowo wypełniane
    protected $fillable = ['foods_id', 'meals_id', 'quantity'];

    /**
     * Relacja z modelem `Food` (produkt).
     */
    public function food()
    {
        return $this->belongsTo(Food::class);
    }

    /**
     * Relacja z modelem `Meal` (posiłek).
     */
    public function meal()
    {
        return $this->belongsTo(Meal::class);
    }
}

