<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  public function up(): void
  {
    Schema::create('geolocations', function (Blueprint $table) {
      $table->id();
      $table->morphs('geolocatable'); // Clé polymorphe
      $table->decimal('latitude', 10, 8);
      $table->decimal('longitude', 11, 8);
      $table->timestamps();
    });
  }

  public function down(): void
  {
    Schema::dropIfExists('geolocations');
  }
};
