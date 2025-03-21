<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicalServicesTable extends Migration
{
    public function up()
    {
        Schema::create('medical_service', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('language')->nullable();
            $table->integer('experience')->nullable();
            $table->decimal('appointment_fees', 8, 2)->nullable();
            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();
            $table->longText('education')->nullable();
            $table->longText('certificates')->nullable();
            $table->text('professional_bio')->nullable();
            $table->longText('timeslots')->nullable();
            $table->integer('nbre_feedbacks')->nullable()->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('medical_service');
    }
}
