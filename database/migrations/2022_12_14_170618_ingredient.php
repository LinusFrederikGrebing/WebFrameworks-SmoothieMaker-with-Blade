<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\IngredientType;

class Ingredient extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingredients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('amount')->nullable();
            $table->string('image');
            $table->float('price');
            $table->enum('type', [IngredientType::FRUITS, IngredientType::VEGETABLES, IngredientType::LIQUID]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ingredient');
    }
}
