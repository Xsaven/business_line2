<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTaskReportsCostAdminComment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('task_reports', function (Blueprint $table) {
            $table->string('admin_comment')->nullable()->after('comment');
            $table->bigInteger('cost')->default(0)->after('admin_comment');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('task_reports', function (Blueprint $table) {
            $table->dropColumn(['admin_comment', 'cost']);
        });
    }
}
