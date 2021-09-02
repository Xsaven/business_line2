<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

/**
 * CreateUsersTable Class.
 */
class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 191);
            $table->string('lastname', 191)->nullable();
            $table->string('login', 191)->nullable();
            $table->integer('balance')->default(0);
            $table->text('about')->nullable();
            $table->string('email', 191)->unique();
            $table->string('number', 191)->unique();
            $table->string('photo', 191)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 191);
            $table->string('remember_token', 191)->nullable();
            $table->string('session', 191)->nullable();
            $table->bigInteger('logins')->default(0);
            $table->bigInteger('seconds')->default(0);
            $table->bigInteger('likes')->default(0);
            $table->bigInteger('stickers')->default(0);
            $table->bigInteger('subscriptions')->default(0);
            $table->bigInteger('complete_tasks')->default(0);
            $table->timestamp('birthday_at')->nullable();
            $table->boolean('active_commentaries')->default(false);
            $table->boolean('active')->default(true);
            $table->foreignId('direction_id')->nullable()->constrained('directions')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('position_id')->nullable()->constrained('positions')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('division_id')->nullable()->constrained('divisions')->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
