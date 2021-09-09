<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

/**
 * CreateQuizAnswerStarsTable Class.
 */
class CreateQuizAnswerStarsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('quiz_answer_stars', function (Blueprint $table) {
            $table->foreignId('quiz_answer_id')->constrained('quiz_answers')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('star_id')->constrained('stars')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('quiz_answer_stars');
    }
}
