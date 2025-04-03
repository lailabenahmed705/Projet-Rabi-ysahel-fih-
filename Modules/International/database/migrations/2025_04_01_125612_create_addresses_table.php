<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
  public function up(): void
  {
    Schema::create('addresses', function (Blueprint $table) {
      $table->id();
      $table->morphs('addressable');
      $table->string('address');
      $table->foreignId('city_id')->constrained('cities')->cascadeOnDelete();
      $table->foreignId('state_id')->nullable()->constrained('states')->cascadeOnDelete();
      $table->foreignId('country_id')->constrained('countries')->cascadeOnDelete();
      $table->timestamps();
  });
  }

  public function down(): void
  {
    Schema::dropIfExists('addresses');
  }
};
