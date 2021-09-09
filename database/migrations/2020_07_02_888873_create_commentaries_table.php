<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

/**
 * CreateCommentariesTable Class.
 */
class CreateCommentariesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('commentaries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('text');
            $table->boolean('active')->default(0);
            $table->string('commentaryable_type', 191);
            $table->bigInteger('commentaryable_id');
            $table->foreignId('fun_id')->constrained('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('commentaries');
    }
}
