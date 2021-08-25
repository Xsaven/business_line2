<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

/**
 * CreateTrackPrizesTable Class.
 */
class CreateTrackPrizesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('track_prizes', function (Blueprint $table) {
            $table->foreignId('track_id')->constrained('tracks')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('prize_id')->constrained('prizes')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('track_prizes');
    }
}
