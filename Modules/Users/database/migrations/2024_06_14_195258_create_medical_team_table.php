<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicalTeamTable extends Migration
{
    public function up()
    {
        Schema::create('medical_team', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('medical_type_id')->unsigned()->nullable();
            $table->bigInteger('medical_address_id')->unsigned()->nullable();
            $table->bigInteger('medical_service_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('medical_type_id')->references('id')->on('medical_types');
            $table->foreign('medical_address_id')->references('id')->on('addresses');
            $table->foreign('medical_service_id')->references('id')->on('medical_service');
        });
    }

    public function down()
    {
        Schema::dropIfExists('medical_team');
    }
}
