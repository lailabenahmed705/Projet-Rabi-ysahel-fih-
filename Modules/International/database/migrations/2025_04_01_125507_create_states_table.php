<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
  public function up()
  {
    Schema::create('states', function (Blueprint $table) {
      $table->id();
      $table
        ->foreignId('country_id')
        ->constrained()
        ->onDelete('cascade');
      $table->string('name');
      $table->string('iso_code')->unique(); // Remplace state_code par iso_code et le rend unique
      $table->enum('status', ['active', 'inactive'])->default('active'); // Ajout du statut
      $table->timestamps(); // Gestion automatique des timestamps
    });
  }

  public function down()
  {
    Schema::dropIfExists('states');
  }
};
