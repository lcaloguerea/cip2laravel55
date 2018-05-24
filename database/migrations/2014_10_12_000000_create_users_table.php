<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id_user')->unsigned();
            $table->string('rut')->unique();
            $table->enum('type',['admin','user']);
            $table->string('name_1');
            $table->string('name_2');
            $table->string('lName_1');
            $table->string('lName_2');
            $table->enum('confirmed',['yes','no']);
            $table->string('confirmed_code',50)->nullable();
            $table->string('department'); //departamente o facultad
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
