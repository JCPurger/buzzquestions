<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionValueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_value', function (Blueprint $table) {
            $table->increments('id');
            $table->string('content');
            $table->unsignedInteger('question_id');

            $table->foreign('question_id')->references('id')->on('question')->onDelete('cascade');
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
        Schema::table('question_value', function (Blueprint $table) {
            $table->dropForeign('question_value_question_id_foreign');
        });
        Schema::dropIfExists('question_value');
    }
}
