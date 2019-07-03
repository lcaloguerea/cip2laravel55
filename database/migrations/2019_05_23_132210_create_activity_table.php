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
            $table->enum('group',['rsrv','room','maid']);
            $table->enum('event',[
                'rsrv_created',
                'rsrv_cancelled',
                'rsrv_pay',
                'checkin',
                'checkout',
                'testimonial_created',
                'rsrv_confirmed',
                //room
                'room_locked',
                'room_unlocked',
                'room_cleaned',
                //maid
                'alert_all_supplies',
                'alert_some_supplies',
                'resupply_all',
                'resupply_some',
                'alert_bread',
                'resupply_bread',
                'maintenance_expired',
                'maintenance_done']);
            $table->text('motive')->nullable();

            $table->integer('responsible_id')->unsigned(); //Fk
            $table->integer('involved_id')->nullable()->unsigned(); //Fk
            $table->integer('rsrv_id')->nullable()->unsigned(); //Fk
            $table->integer('room_id')->nullable()->unsigned(); //Fk
            $table->integer('maintenance_id')->unsigned()->nullable(); //Fk

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
