<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatesTable extends Migration
{
  public function up()
  {
      Schema::create('states', function (Blueprint $table) {
          $table->id();
          $table->foreignId('country_id')->constrained()->onDelete('cascade');
          $table->string('name');
          $table->string('state_code')->nullable();
          $table->timestamp('created_at')->nullable();
          $table->timestamp('updated_at')->nullable();

      });
  }

  public function down()
  {
      Schema::dropIfExists('states');
  }

}
