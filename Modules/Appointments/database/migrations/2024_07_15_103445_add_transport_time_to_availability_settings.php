<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('availability_settings', function (Blueprint $table) {
            $table->integer('transport_time')->default(0); // Transport time in minutes
        });
    }

    public function down()
    {
        Schema::table('availability_settings', function (Blueprint $table) {
            $table->dropColumn('transport_time');
        });
    }
};
