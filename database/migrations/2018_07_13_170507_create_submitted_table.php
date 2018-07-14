<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubmittedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('submitted', function (Blueprint $table) {
            $table->increments('id');
            $table->string('token',64); //TOKEN DE SEGURANCA
            $table->unsignedInteger('questionnaire_id');

            $table->foreign('questionnaire_id')->references('id')->on('question')->onDelete('cascade');
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
        Schema::table('submitted', function (Blueprint $table) {
            $table->dropForeign('submitted_questionnaire_id_foreign');
        });
        Schema::dropIfExists('submitted');
    }
}
