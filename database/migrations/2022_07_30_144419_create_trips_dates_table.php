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
        Schema::create('trips_dates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dates_id')->references('id')->on('dates')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('trips_id')->references('id')->on('trips')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trips_dates');
    }
};
