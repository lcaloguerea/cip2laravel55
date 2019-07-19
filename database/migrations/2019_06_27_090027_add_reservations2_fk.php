<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddReservations2Fk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reservations', function (Blueprint $table) {
            $table  ->foreign('testimonial','reservations_testimonial_foreign')
                    ->references('id')
                    ->on('testimonials')
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
            $table->dropForeign('reservations_testimonial_foreign');
        });
    }
}
