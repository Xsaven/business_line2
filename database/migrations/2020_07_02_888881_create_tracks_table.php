<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

/**
 * CreateTracksTable Class.
 */
class CreateTracksTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('tracks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 191);
            $table->string('video', 191)->nullable();
            $table->string('arbitrator_name', 191);
            $table->string('arbitrator_photo', 191);
            $table->string('arbitrator_position', 191);
            $table->text('short_description')->nullable();
            $table->text('terms_of_participation');
            $table->foreignId('direction_id')->constrained('directions')->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('tracks');
    }
}
