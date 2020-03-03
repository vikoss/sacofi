<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accountants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_surname');
            $table->string('second_surname');
            $table->string('rfc');
            $table->string('address_street_number');
            $table->string('address_streat');
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
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accountants');
    }
}
