<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class DietMeal extends Pivot
{
    use HasFactory;

    protected $table = 'diet_meal'; // Nazwa tabeli pośredniej

    // Kolumny, które mogą być masowo wypełniane
    protected $fillable = ['diets_id', 'meals_id'];

    /**
     * Relacja z modelem `Diet` (dieta/dzień jedzenia).
     */
    public function diet()
    {
        return $this->belongsTo(Diet::class);
    }

    /**
     * Relacja z modelem `Meal` (posiłek).
     */
    public function meal()
    {
        return $this->belongsTo(Meal::class);
    }
}

