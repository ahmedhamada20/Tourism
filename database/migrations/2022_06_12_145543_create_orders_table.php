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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('trip_id')->nullable()->constrained('trips')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('package_id')->nullable()->constrained('packages')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('transfer_id')->nullable()->constrained('transfers')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('adult_price')->nullable();
            $table->string('child_price')->nullable();
            $table->string('total');
            $table->string('adult_number')->nullable();
            $table->string('child_number')->nullable();
            $table->foreignId('date_id')->nullable()->constrained('dates')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('nationalty')->nullable();
            $table->enum('status',['canceled', 'pending', 'confirmed'])->default('pending');
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
        Schema::dropIfExists('orders');
    }
};
