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
        Schema::create('diet_meal', function (Blueprint $table) {
            $table->id();
            $table->foreignId('diets_id')->constrained('diets')->onDelete('cascade'); // powiązanie z tabelą diets
            $table->foreignId('meals_id')->constrained('meals')->onDelete('cascade'); // powiązanie z tabelą meals
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diet_meal');
    }
};
