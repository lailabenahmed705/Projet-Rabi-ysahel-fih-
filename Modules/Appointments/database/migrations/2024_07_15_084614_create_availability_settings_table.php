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
        Schema::create('availability_settings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('medical_team_id')->constrained('medical_team')->onDelete('cascade');           
            $table->time('start_shift');
            $table->time('end_shift');
            $table->time('break_start')->nullable();
            $table->time('break_end')->nullable();
            $table->integer('consultation_duration'); // in minutes
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('availability_settings');
    }
};
