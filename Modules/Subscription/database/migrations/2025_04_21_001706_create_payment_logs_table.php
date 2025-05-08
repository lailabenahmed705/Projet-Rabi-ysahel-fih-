<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payment_logs', function (Blueprint $table) {
          $table->id();
          $table->unsignedBigInteger('payment_id');
          $table->text('log'); // Détails de la réponse de l'API ou des erreurs
          $table->timestamps();

          $table->foreign('payment_id')->references('id')->on('payments')->onDelete('cascade');
      });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_logs');
    }
};
