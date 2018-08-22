<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRoomsFk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rooms', function (Blueprint $table) {
            $table  ->foreign('active_reservation_id','rooms_active_reservation_id_foreign')
                    ->references('id_res')
                    ->on('reservations')
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
        Schema::table('rooms', function (Blueprint $table) {
            $table->dropForeign('rooms_active_reservation_id_foreign');
        });
    }
}
