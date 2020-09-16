<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');

            $table->string('FirstName');
            $table->string('LastName');
            $table->string('Gender');
            $table->string('IdNumber')->unique();
            $table->string('PhoneNumber')->nullable();
            $table->string('Email')->nullable();

            $table->string('home_language')->nullable();
            $table->string('household_size')->nullable();
            $table->string('approx_Income')->nullable();

            $table->string('address_ln1')->nullable();
            $table->string('address_ln2')->nullable();
            $table->string('city')->nullable();
            $table->string('province')->nullable();
            $table->string('zip')->nullable();

            $table->boolean('Deleted');
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
        Schema::dropIfExists('patients');
    }
}
