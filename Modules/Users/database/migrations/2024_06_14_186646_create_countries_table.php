<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountriesTable extends Migration
{
  public function up()
  {
      Schema::create('countries', function (Blueprint $table) {
          $table->id();
          $table->string('name');
          $table->string('iso3')->nullable();
          $table->string('numeric_code')->nullable();
          $table->string('phone_code')->nullable();
          $table->string('currency_name')->nullable();
          $table->string('region')->nullable();
          $table->timestamp('created_at')->nullable();
          $table->timestamp('updated_at')->nullable();

      });
  }

  public function down()
  {
      Schema::dropIfExists('countries');
  }

}
