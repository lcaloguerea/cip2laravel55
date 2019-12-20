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
            $table->enum('payment_m',['cash','e_transfer_l','e_transfer_e', 'p_code']);
            //Se identifica el tipo al hacer la reserva. al hacer checkin se cambia en habitacion la reserva
            $table->enum('roomType',['single','shared','matrimonial']);

            //fk rooms se asigna cualquiera disponible, en recepción al validar se cambia dependiendo
            // de las necesidades de la hostal
            $table->integer('room_id')->unsigned()->nullable();

            //fk to invoice generated or uploaded
            $table->integer('invoice_id')->unsigned()->nullable();

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
