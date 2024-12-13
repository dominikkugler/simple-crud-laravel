<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    public function foods()
    {
        return $this->belongsToMany(Food::class, 'food_meal', 'meals_id', 'foods_id')
                    ->withPivot('quantity')  // Dodajemy pole quantity z tabeli food_meal
                    ->withTimestamps();
    }



    public function diets()
    {
        return $this->belongsToMany(Diet::class, 'diet_meal', 'meals_id', 'diets_id')
            ->using(DietMeal::class)
            ->withTimestamps();
    }

}

