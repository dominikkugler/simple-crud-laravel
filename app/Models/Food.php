<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    protected $table = 'foods';

    protected $fillable = ['name', 'calories', 'unit'];

    public function meals()
    {
        return $this->belongsToMany(Meal::class, 'food_meal', 'foods_id', 'meals_id')->withTimestamps();
    }


}
