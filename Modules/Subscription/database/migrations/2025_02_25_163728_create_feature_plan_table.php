<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feature_plan', function (Blueprint $table) {

          $table->foreignId('plan_id')->constrained('plans')->cascadeOnDelete();
          $table->foreignId('feature_id')->constrained('features')->cascadeOnDelete();

          $table->decimal('charges', 8, 2)->nullable();
            $table->timestamps();

            $table->primary(['plan_id','feature_id' ]);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('feature_plan');
    }
};
