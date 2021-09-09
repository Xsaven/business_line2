<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

/**
 * CreateDirectionPrizesTable Class
 */
class CreateDirectionPrizesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('direction_prizes', function (Blueprint $table) {
            $table->foreignId('direction_id')->constrained('directions')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('prize_id')->constrained('prizes')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('direction_prizes');
    }

}
