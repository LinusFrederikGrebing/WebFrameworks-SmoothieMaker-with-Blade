<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PresetIngredients extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preset_ingredients', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('preset_id');
            $table->unsignedBigInteger('ingrediente_id');
            $table->integer('quantity')->nullable();
    
            $table->foreign('preset_id')->references('id')->on('presets')->onDelete('cascade');
            $table->foreign('ingrediente_id')->references('id')->on('ingredientes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
