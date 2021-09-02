<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

/**
 * CreateQuizQuestionsTable Class.
 */
class CreateQuizQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('quiz_questions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('question', 191);
            $table->integer('cost')->default(1);
            $table->foreignId('task_id')->constrained('tasks')->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('quiz_questions');
    }
}
