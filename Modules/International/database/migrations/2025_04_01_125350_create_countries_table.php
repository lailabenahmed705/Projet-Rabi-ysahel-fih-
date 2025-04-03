<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
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
      $table->enum('status', ['active', 'inactive'])->default('active');
      $table->timestamp('created_at')->nullable();
      $table->timestamp('updated_at')->nullable();
    });
  }

  public function down()
  {
    Schema::dropIfExists('countries');
  }
};
