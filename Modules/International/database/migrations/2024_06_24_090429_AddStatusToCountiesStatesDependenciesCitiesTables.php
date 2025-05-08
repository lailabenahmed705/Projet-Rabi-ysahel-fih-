<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToCountiesStatesDependenciesCitiesTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('countries', function (Blueprint $table) {
            $table->string('status')->default('inactive');
        });

        Schema::table('states', function (Blueprint $table) {
            $table->string('status')->default('inactive');
        });

        Schema::table('dependencies', function (Blueprint $table) {
            $table->string('status')->default('inactive');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('counties', function (Blueprint $table) {
            $table->dropColumn('status');
        });

        Schema::table('states', function (Blueprint $table) {
            $table->dropColumn('status');
        });

        Schema::table('dependencies', function (Blueprint $table) {
            $table->dropColumn('status');
        });

        Schema::table('cities', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
}
