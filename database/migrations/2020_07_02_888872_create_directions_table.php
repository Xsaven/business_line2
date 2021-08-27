<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

/**
 * CreateDirectionsTable Class.
 */
class CreateDirectionsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('directions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 191);
            $table->string('slug', 191);
            $table->string('video', 191)->nullable();
            $table->string('arbitrator_name', 191)->nullable();
            $table->string('arbitrator_photo', 191)->nullable();
            $table->string('arbitrator_position', 191)->nullable();
            $table->text('description')->nullable();
            $table->text('terms_of_participation');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('directions');
    }
}