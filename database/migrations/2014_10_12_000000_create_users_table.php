<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('first_surname');
            $table->string('second_surname');
            $table->string('rfc');
            $table->string('address_street_number');
            $table->string('address_street');
            $table->string('address_colony');
            $table->string('address_town');
            $table->string('address_cp');
            $table->string('phone_number');
            $table->string('activity');
            $table->string('birthday');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->unsignedBigInteger('accountant_id')->nullable();
        });

        Schema::table('users', function(Blueprint $table) {
            $table->foreign('accountant_id')->references('id')->on('users')->onDelete('cascade');
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
