<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePassengersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('passengers', function (Blueprint $table) {
            $table->increments('id_passenger')->unique();
            $table->string('name_1');
            $table->string('lName_1');
            $table->string('lName_2');
            $table->string('nationality');
            $table->string('pAvatar')->default('/img/icons/icon-user.png');
            $table->string('email')->unique(); //Requerido para la encuesta de satisfacción
            $table->string('phone'); //Requerido para la encuesta de satisfacción
            $table->timestamps();

            //fk countries
            $table->integer('country_o')->unsigned(); //country of origin
            $table->integer('country_r')->unsigned(); //country of residence
            
            $table->string('university');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('passengers');
    }
}
