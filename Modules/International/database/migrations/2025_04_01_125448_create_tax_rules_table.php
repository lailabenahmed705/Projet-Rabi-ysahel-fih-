<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
  /**
   * Run the migrations.
   */
  public function up()
  {
    Schema::create('tax_rules', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('country_id');
      $table->unsignedBigInteger('tax_id');
      $table->timestamps();

      // Clés étrangères
      $table
        ->foreign('country_id')
        ->references('id')
        ->on('countries')
        ->onDelete('cascade');
      $table
        ->foreign('tax_id')
        ->references('id')
        ->on('taxes')
        ->onDelete('cascade');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down()
  {
    Schema::dropIfExists('tax_rules');
  }
};
