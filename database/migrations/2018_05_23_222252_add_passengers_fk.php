<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPassengersFk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('passengers', function (Blueprint $table) {
            $table  ->foreign('country_o','passengers_country_o_foreign')
                    ->references('id_country')
                    ->on('countries')
                    ->onDelete('NO ACTION')
                    ->onUpdate('NO ACTION');
            $table  ->foreign('country_r','passengers_country_r_foreign')
                    ->references('id_country')
                    ->on('countries')
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
        Schema::table('passengers', function (Blueprint $table) {
            $table->dropForeign('passengers_country_o_foreign');
            $table->dropForeign('passengers_country_r_foreign');
        });
    }
}
