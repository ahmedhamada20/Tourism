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
        Schema::create('extras', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('notes')->nullable();
            $table->string('price_person_eg')->default(0);
            $table->string('price_person_en')->default(0);
            $table->string('price_group_eg')->default(0);
            $table->string('price_group_en')->default(0);
            $table->string('number_group')->nullable();
            $table->string('icon')->default('<i class="fa fa-car"></i>');
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
        Schema::dropIfExists('extras');
    }
};
