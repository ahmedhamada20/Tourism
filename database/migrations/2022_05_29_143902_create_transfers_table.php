<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transfers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('destenation_id')->references('id')->on('destenations')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('price_EG')->default(0);
            $table->string('price_EN')->default(0);
            $table->string('price_EG_go')->default(0);
            $table->string('price_EG_go_back')->default(0);
            $table->string('price_EN_go')->default(0);
            $table->string('price_EN_go_back')->default(0);
            $table->boolean('type')->default(1);
            $table->longText('notes')->nullable();
            $table->date('start_date');
            $table->date('end_date');
            $table->string('route_form');
            $table->string('route_to');
            $table->string('rate');
            $table->string('car_name');
            $table->string('car_type');
            $table->string('car_model');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transfers');
    }
};
