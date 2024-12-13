<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diet extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    public function meals()
    {
        return $this->belongsToMany(Meal::class, 'diet_meal', 'diets_id', 'meals_id')
            ->using(DietMeal::class) // Korzystanie z modelu DietMeal
            ->withTimestamps();
    }
}

