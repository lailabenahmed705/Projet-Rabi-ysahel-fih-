<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicalAddressTable extends Migration
{
    public function up()
    {
        Schema::create('medical_address', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('address_complete')->nullable();
            $table->bigInteger('dependency_id')->unsigned()->nullable();
            $table->bigInteger('currency_id')->unsigned()->nullable();
            $table->bigInteger('state_id')->unsigned()->nullable();
            $table->bigInteger('country_id')->unsigned()->nullable();
            $table->bigInteger('city_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('dependency_id')->references('id')->on('dependencies');
            $table->foreign('currency_id')->references('id')->on('currencies');
            $table->foreign('state_id')->references('id')->on('states');
            $table->foreign('country_id')->references('id')->on('countries');
            $table->foreign('city_id')->references('id')->on('cities');
        });
    }

    public function down()
    {
        Schema::dropIfExists('medical_address');
    }
}
