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
        Schema::table('appointments', function (Blueprint $table) {
            $table->unsignedBigInteger('service_id')->nullable()->after('medical_team_id');
            $table->date('availability_date')->nullable()->after('ordonnance');
            $table->string('availability_time')->nullable()->after('availability_date');
        
            $table->foreign('service_id')->references('id')->on('services')->onDelete('set null');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('appointments', function (Blueprint $table) {
            
        });
    }
};
