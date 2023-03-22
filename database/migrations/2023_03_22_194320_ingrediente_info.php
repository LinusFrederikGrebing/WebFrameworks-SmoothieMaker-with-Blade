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
            $table->string('fatty-acids');
            $table->string('carbohydrates');
            $table->string('fruits-carbohydrates');
            $table->string('protein');
            $table->string('salt');
            $table->unsignedBigInteger('ingrediente_id')->nullable();

            $table->foreign('ingrediente_id')->references('id')->on('ingredientes');
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
