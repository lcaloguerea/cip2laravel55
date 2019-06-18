<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMaidActivityFk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('maid_activity', function (Blueprint $table) {
            $table  ->foreign('responsible_id','maid_activity_responsible_id_foreign')
                    ->references('id')
                    ->on('users')
                    ->onDelete('NO ACTION')
                    ->onUpdate('NO ACTION');
            $table  ->foreign('maintenance_id','maid_activity_maintenance_id_foreign')
                    ->references('id')
                    ->on('maintenance')
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
        Schema::table('maid_activity', function (Blueprint $table) {
            $table->dropForeign('maid_activity_responsible_id_foreign');
            $table->dropForeign('maid_activity_maintenance_id_foreign');
        });
    }
}
