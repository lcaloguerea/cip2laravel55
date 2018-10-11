<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->increments('id_res');
            $table->string('motive', 150);
            $table->string('program');
            //waiting: en espera entre validacion y cancelacion (24hrs) y asignacion de hab al checkin
            $table->enum('status',['waiting','started','cancelled','finished']);
            $table->date('check_in');
            $table->date('check_out');
            $table->enum('payment_m',['cash','credit_card','e_transfer']);
            
            //fk rooms se asigna cualquiera disponible, en recepción al validar se cambia dependiendo
            // de las necesidades de la hostal
            $table->integer('room_id')->unsigned();

            //fk usuario responsable 
            $table->integer('user_id')->unsigned();

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations');
    }
}
