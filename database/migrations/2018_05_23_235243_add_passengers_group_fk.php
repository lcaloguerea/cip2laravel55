<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPassengersGroupFk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('passengers_group', function (Blueprint $table) {
            $table  ->foreign('reservation_id','passengers_group_reservation_id_foreign')
                    ->references('id_res')
                    ->on('reservations')
                    ->onDelete('CASCADE')
                    ->onUpdate('NO ACTION');
            $table  ->foreign('passenger_id','passengers_group_passenger_id_foreign')
                    ->references('id_passenger')
                    ->on('passengers')
                    ->onDelete('CASCADE')
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
        Schema::table('passengers_group', function (Blueprint $table) {
            $table->dropForeign('passengers_group_reservation_id_foreign');
            $table->dropForeign('passengers_group_passenger_id_foreign');
        });
    }
}
