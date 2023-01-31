<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trips_days', function (Blueprint $table) {
            $table->id();
            $table->foreignId('day_id')->references('id')->on('days')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('trips_id')->references('id')->on('trips')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trips_days');
    }
};
