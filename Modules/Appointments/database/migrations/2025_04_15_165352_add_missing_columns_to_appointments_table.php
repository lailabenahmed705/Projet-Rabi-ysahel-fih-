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
            $table->string('care_type')->nullable()->after('service_id');
            $table->string('appointment_location')->nullable()->after('care_type');
            $table->string('confirm_phone')->nullable()->after('phone');
            $table->unsignedBigInteger('patient_id')->nullable()->after('confirm_phone');
    
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('appointments', function (Blueprint $table) {
            //
        });
    }
};
