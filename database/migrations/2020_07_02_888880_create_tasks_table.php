<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

/**
 * CreateTasksTable Class.
 */
class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 191);
            $table->mediumText('short_description')->nullable();
            $table->string('event_type', 191)->default('instant');
            $table->string('report_type', 191)->default('text');
            $table->string('action_type', 191)->default('manually');
            $table->text('action_configs')->nullable();
            $table->integer('cost')->default(0);
            $table->string('prize_src', 191)->nullable();
            $table->text('terms_of_participation');
            $table->timestamp('start_at')->nullable();
            $table->timestamp('finish_at')->nullable();
            $table->foreignId('direction_id')->constrained('directions')->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}