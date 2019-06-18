<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //table for activities that involves responsible and involved
        Schema::create('activity', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('event',[
                'rsrv_created',
                'rsrv_cancelled',
                'rsrv_pay',
                'checkin',
                'checkout',
                'testimonial_created']);

            $table->integer('responsible_id')->unsigned(); //Fk
            $table->integer('involved_id')->unsigned(); //Fk
            $table->integer('rsrv_id')->unsigned(); //Fk

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
        Schema::dropIfExists('activity');
    }
}
