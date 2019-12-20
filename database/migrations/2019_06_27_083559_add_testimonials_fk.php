<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTestimonialsFk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('testimonials', function (Blueprint $table) {
            $table  ->foreign('reservation_id','testimonials_reservation_id_foreign')
                    ->references('id_res')
                    ->on('reservations')
                    ->onDelete('NO ACTION')
                    ->onUpdate('NO ACTION');
            $table  ->foreign('passenger_id','testimonials_passenger_id_foreign')
                    ->references('id_passenger')
                    ->on('passengers')
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
        Schema::table('testimonials', function (Blueprint $table) {
            $table->dropForeign('testimonials_reservation_id_foreign');
            $table->dropForeign('testimonials_passenger_id_foreign');
        });
    }
}
