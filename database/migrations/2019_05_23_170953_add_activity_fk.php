<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddActivityFk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('activity', function (Blueprint $table) {
            $table  ->foreign('responsible_id','activity_responsible_id_foreign')
                    ->references('id')
                    ->on('users')
                    ->onDelete('NO ACTION')
                    ->onUpdate('NO ACTION');
            $table  ->foreign('involved_id','activity_involved_id_foreign')
                    ->references('id_passenger')
                    ->on('passengers')
                    ->onDelete('NO ACTION')
                    ->onUpdate('NO ACTION');
            $table  ->foreign('rsrv_id','activity_rsrv_id_foreign')
                    ->references('id_res')
                    ->on('reservations')
                    ->onDelete('NO ACTION')
                    ->onUpdate('NO ACTION');
            $table  ->foreign('room_id','activity_room_id_foreign')
                    ->references('id_room')
                    ->on('rooms')
                    ->onDelete('NO ACTION')
                    ->onUpdate('NO ACTION');
            $table  ->foreign('maintenance_id','activity_maintenance_id_foreign')
                    ->references('id')
                    ->on('maintenance')
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
        Schema::table('activity', function (Blueprint $table) {
            $table->dropForeign('activity_responsible_id_foreign');
            $table->dropForeign('activity_involved_id_foreign');
            $table->dropForeign('activity_rsrv_id_foreign');
            $table->dropForeign('activity_room_id_foreign');
            $table->dropForeign('activity_maintenance_id_foreign');
        });
    }
}
