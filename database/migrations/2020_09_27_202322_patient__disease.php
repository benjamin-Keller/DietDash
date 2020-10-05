<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PatientDisease extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_disease', function (Blueprint $table) {
            $table->id();
            $table->string('patient_id');

            $table->string('arthritis')->nullable();
            $table->string('renal_failure')->nullable();
            $table->string('dehydration')->nullable();
            $table->string('underweight')->nullable();
            $table->string('diabetes')->nullable();
            $table->string('hiv')->nullable();
            $table->string('mam')->nullable();
            $table->string('wasted')->nullable();
            $table->string('epilepsy')->nullable();
            $table->string('pneumonia')->nullable();
            $table->string('sam')->nullable();
            $table->string('hypertension')->nullable();
            $table->string('tb')->nullable();
            $table->string('stunted')->nullable();

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
        Schema::dropIfExists('patient_disease');
    }
}
