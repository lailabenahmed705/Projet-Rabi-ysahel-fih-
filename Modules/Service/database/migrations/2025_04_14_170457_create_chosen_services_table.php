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
        Schema::create('chosen_services', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('medical_team_id')->nullable();
            $table->unsignedBigInteger('service_category_id');
            $table->timestamps();

            $table->foreign('medical_team_id')->references('id')->on('medical_team')->onDelete('cascade');
            $table->foreign('service_category_id')->references('id')->on('service_categories')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('chosen_services');
    }
};