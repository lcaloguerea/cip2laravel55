<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hres', function (Blueprint $table) {
            $table->increments('id');
            $table->date('check_in');
            $table->date('check_out');
            $table->integer('nights');
            $table->string('guests');
            $table->string('sponsor');
            $table->string('department');
            $table->integer('rprice')->nullable();
            $table->integer('rtotal')->nullable();
            $table->string('payment_m');
            $table->string('code');
            $table->string('email');
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
        Schema::dropIfExists('hres');
    }
}
