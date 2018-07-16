<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answer', function (Blueprint $table) {
            $table->increments('id');
            $table->string('content')->nullable();
            $table->unsignedInteger('question_id');
            $table->unsignedInteger('question_value_id')->nullable();

            $table->foreign('question_id')->references('id')->on('question')->onDelete('cascade');
            $table->foreign('question_value_id')->references('id')->on('question_value')->onDelete('cascade');
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
        Schema::table('answer', function (Blueprint $table) {
            $table->dropForeign('answer_question_id_foreign');
            $table->dropForeign('answer_question_value_id_foreign');
        });
        Schema::dropIfExists('answer');
    }
}
