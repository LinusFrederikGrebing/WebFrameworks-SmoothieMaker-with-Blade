<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class IngredienteInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingredient_infos', function (Blueprint $table) {
            $table->id();
            $table->string('info');
            $table->string('energie');
            $table->string('fett');
            $table->string('fattyacids');
            $table->string('carbohydrates');
            $table->string('fruitscarbohydrates');
            $table->string('protein');
            $table->string('salt');
            $table->unsignedBigInteger('ingrediente_id')->nullable();

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
