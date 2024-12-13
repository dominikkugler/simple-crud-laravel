<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('food_meal', function (Blueprint $table) {
            $table->id();
            $table->foreignId('foods_id')->constrained('foods')->onDelete('cascade'); // powiązanie z tabelą foods
            $table->foreignId('meals_id')->constrained('meals')->onDelete('cascade'); // powiązanie z tabelą meals
            $table->integer('quantity'); // ilość produktu w danej jednostce
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('food_meal');
    }
};
