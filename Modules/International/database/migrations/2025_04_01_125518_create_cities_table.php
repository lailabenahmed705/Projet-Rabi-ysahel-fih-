<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
  public function up()
  {
    Schema::create('cities', function (Blueprint $table) {
      $table->id();
      $table->string('name');
      $table->string('postal_code');
      $table
        ->foreignId('state_id')
        ->constrained('states')
        ->onDelete('cascade');
      $table->enum('status', ['active', 'inactive']);
      $table->timestamp('created_at')->nullable();
      $table->timestamp('updated_at')->nullable();
    });
  }

  public function down()
  {
    Schema::dropIfExists('cities');
  }
};
