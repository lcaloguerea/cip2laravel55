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
                'rsrv_created',         //ok
                'rsrv_cancelled',       //ok
                'rsrv_invoice',         //ok
                'rsrv_pay',             //ok
                'checkin',              //ok
                'checkout',             //ok
                'testimonial_created',  //ok
                'rsrv_confirmed',       //ok
                //room
                'room_locked',          //ok
                'room_unlocked',        //ok
                'room_cleaned',         //ok
                //maid
                'alert_all_supplies',   //ok
                'alert_some_supplies',  //ok
                'resupply_all',         //ok
                'resupply_some',        //ok
                'alert_bread',          //ok
                'resupply_bread',       //ok
                'maintenance_expired',  //ok
                'maintenance_done',     //ok
                //adminToUser
                'access_denied',        //ok
                'access_granted',       //ok
                'change_type'           //ok
                ]);
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
