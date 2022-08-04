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
            $table->string('type', 191)->default('video');
            $table->string('video', 191)->nullable();
            $table->string('banner', 191)->nullable();
            $table->text('description')->nullable();
            $table->string('description_inside', 191)->nullable();
            $table->text('terms_of_participation');
            $table->timestamp('start_at')->nullable();
            $table->timestamp('end_at')->nullable();
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
