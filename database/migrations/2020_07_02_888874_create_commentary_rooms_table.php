<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

/**
 * CreateCommentaryRoomsTable Class
 */
class CreateCommentaryRoomsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('commentary_rooms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 191);
            $table->string('title', 191);
            $table->string('state', 191);
            $table->string('video_title', 191)->nullable();
            $table->string('video_info', 191)->nullable();
            $table->string('video_data', 191)->nullable();
            $table->string('translation_data', 191)->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('commentary_rooms');
    }

}
