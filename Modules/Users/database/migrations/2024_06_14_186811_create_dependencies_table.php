<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDependenciesTable extends Migration
{
  public function up()
  {
      Schema::create('dependencies', function (Blueprint $table) {
          $table->id();
          $table->foreignId('state_id')->constrained()->onDelete('cascade');
          $table->string('name');
          $table->timestamp('created_at')->nullable();
          $table->timestamp('updated_at')->nullable();


      });
  }

  public function down()
  {
      Schema::dropIfExists('cities');
  }
}
