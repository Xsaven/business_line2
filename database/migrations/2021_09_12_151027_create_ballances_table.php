<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBallancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ballances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->nullable()->constrained('users');
            $table->foreignId('task_id')
                ->nullable()->constrained('tasks');
            $table->string('message')->nullable();
            $table->bigInteger('cost');
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
        Schema::dropIfExists('ballances');
    }
}
