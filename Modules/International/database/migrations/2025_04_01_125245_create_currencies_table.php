<?php


use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
  public function up()
  {
    Schema::create('currencies', function (Blueprint $table) {
      $table->id();
      $table->string('name');
      $table->string('iso_code');
      $table->decimal('exchange_rate', 10, 2);
      $table->integer('decimals');
      $table->enum('status', ['active', 'inactive']);
      $table->string('symbol');
      $table->timestamps();
    });
  }

  public function down()
  {
    Schema::dropIfExists('currencies');
  }
};
