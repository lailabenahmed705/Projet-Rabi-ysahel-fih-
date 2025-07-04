<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
  public function up()
  {
    Schema::create('taxes', function (Blueprint $table) {
      $table->id();
      $table->string('name');
      $table->decimal('rate', 8, 2);
      $table->string('type');

      $table->timestamps();
    });
  }

  public function down()
  {
    Schema::dropIfExists('taxes');
  }
};
