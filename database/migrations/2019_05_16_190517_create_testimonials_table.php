<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestimonialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testimonials', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('rate',[1,2,3,4,5]);
            $table->text('comment');
            $table->string('name');
            $table->string('department');
            $table->string('pAvatar')->default('/img/icons/icon-user.png');
            $table->enum('visibility',['no','yes']);

            $table->integer('reservation_id')->unsigned()->nullable(); //Fk
            $table->integer('passenger_id')->unsigned()->nullable(); //Fk

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
        Schema::dropIfExists('testimonials');
    }
}
