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
        Schema::create('trips_extra', function (Blueprint $table) {
            $table->id();
            $table->foreignId('trips_id')->references('id')->on('trips')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('extra_id')->references('id')->on('extras')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trips_extra');
    }
};
