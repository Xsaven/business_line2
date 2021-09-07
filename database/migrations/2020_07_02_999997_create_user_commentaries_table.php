<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

/**
 * CreateUserCommentariesTable Class.
 */
class CreateUserCommentariesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('user_commentaries', function (Blueprint $table) {
            $table->foreignId('fun_id')->constrained('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('commentary_id')->constrained('commentaries')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('user_commentaries');
    }
}
