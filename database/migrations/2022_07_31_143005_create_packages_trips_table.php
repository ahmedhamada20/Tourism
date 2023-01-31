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
        Schema::create('packages_trips', function (Blueprint $table) {
            $table->id();
            $table->foreignId('packages_id')->references('id')->on('packages')->cascadeOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('packages_trips');
    }
};
