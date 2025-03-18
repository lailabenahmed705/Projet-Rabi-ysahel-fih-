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
        Schema::table('medical_types', function (Blueprint $table) {
            $table->string('slug')->unique()->after('name'); // Ajoute la colonne après 'name'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('medical_types', function (Blueprint $table) {
            $table->dropColumn('slug'); // Supprime la colonne si on rollback
        });
    }
};
