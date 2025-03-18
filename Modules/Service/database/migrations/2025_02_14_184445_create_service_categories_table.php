<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('service_categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('medical_type_id'); // Ensure this is unsigned
            $table->string('name');
            $table->timestamps();

            // Define foreign key constraint
            $table->foreign('medical_type_id')
                ->references('id')
                ->on('medical_types')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('service_categories');
    }
}
