<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

/**
 * CreateUserTaskReportsTable Class
 */
class CreateUserTaskReportsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('user_task_reports', function (Blueprint $table) {
            $table->foreignId('fun_id')->constrained('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('task_report_id')->constrained('task_reports')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('user_task_reports');
    }

}
