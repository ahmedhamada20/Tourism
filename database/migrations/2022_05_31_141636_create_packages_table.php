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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('rate');
            $table->longText('notes')->nullable();
            $table->string('price');
            $table->string('before_price');
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
        Schema::dropIfExists('packages');
    }
};
