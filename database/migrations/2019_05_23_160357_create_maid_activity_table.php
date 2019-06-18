<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaidActivityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maid_activity', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('event',[
                'alert_supplies',
                'alert_some_supplies',
                'resupply_list',
                'resupply_full',
                'alert_bread',
                'resupply_bread',
                'room_locked',
                'room_unlocked',
                'room_maintenance',
                'maintenance_expired',
                'maintenance_done']);

            $table->integer('responsible_id')->unsigned(); //Fk
            $table->text('observation')->nullable();
            $table->integer('maintenance_id')->unsigned()->nullable();

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
        Schema::dropIfExists('maid_activity');
    }
}
