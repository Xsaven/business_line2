<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

/**
 * CreateQuizAnswersTable Class.
 */
class CreateQuizAnswersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('quiz_answers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('answer', 191);
            $table->foreignId('quiz_question_id')->constrained('quiz_questions')->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('quiz_answers');
    }
}
