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
        Schema::create('trips', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('rate');
            $table->longText('notes')->nullable();
            $table->foreignId('trips_type_id')->references('id')->on('trips_types')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('destination_id')->references('id')->on('destenations')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('transfer_id')->nullable()->references('id')->on('transfers')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('price_adult_EG')->default(0);
            $table->string('price_adult_EN')->default(0);
            $table->string('price_child_EG')->default(0);
            $table->string('price_child_EN')->default(0);
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
        Schema::dropIfExists('trips');
    }
};
