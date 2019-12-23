<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddQuestionsFk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::table('questions', function (Blueprint $table) {
            $table  ->foreign('ansBy','question_ansBy_foreign')
                    ->references('id')
                    ->on('users')
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
        Schema::table('questions', function (Blueprint $table) {
            $table->dropForeign('question_ansBy_foreign');
        });
    }
}
