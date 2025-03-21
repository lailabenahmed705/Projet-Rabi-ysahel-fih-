<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitiesTable extends Migration
{
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('iso_code');
            $table->foreignId('dependency_id')->constrained('dependencies');
            $table->enum('status', ['active', 'inactive']);
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('cities');
    }
}
