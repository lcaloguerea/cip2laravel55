<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddReservationsFk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reservations', function (Blueprint $table) {
            $table  ->foreign('room_id','reservations_room_id_foreign')
                    ->references('id_room')
                    ->on('rooms')
                    ->onDelete('NO ACTION')
                    ->onUpdate('NO ACTION');
            $table  ->foreign('user_id','reservations_user_id_foreign')
                    ->references('id')
                    ->on('users')
                    ->onDelete('NO ACTION')
                    ->onUpdate('NO ACTION');
        });    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reservations', function (Blueprint $table) {
            $table->dropForeign('reservations_room_id_foreign');
            $table->dropForeign('reservations_user_id_foreign');
        });
    }
}
