<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->increments('id_room');
            $table->integer('price');
            $table->enum('type',['single','shared','matrimonial']);
            $table->enum('status',['free','occupied','locked']);
            $table->enum('sanitization',['done','required']);
            $table->timestamps();

            //fk active reservation 
            $table->integer('active_reservation_id')->unsigned()->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}
