<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('type',['Boleta','Factura','CR','NCI','BCIP']);
            $table->integer('charge');
            $table->enum('IVA',['yes','no']);
            $table->integer('discount')->nullable();
            $table->integer('total');
            $table->integer('IC')->nullable(); // Internal Code fillable when is NCI
            $table->string('r_type');            
            $table->enum('status',['payed','pending']);
            $table->string('pdf');            
            $table->timestamps();

            //only reservation fk, it contains all data needed when navigate in frontend
            $table->integer('rsrv_id');            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoice');
    }
}
