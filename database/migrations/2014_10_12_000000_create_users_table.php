<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fullname');
            $table->string('email', 191)->unique();
            $table->string('phone')->nullable();
            $table->string('gender')->nullable();
            $table->string('password');
            $table->string('country')->nullable();
            $table->text('location')->nullable();
            $table->string('address')->nullable();
            $table->boolean('status')->default(false);
            $table->unsignedInteger('image_id')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
