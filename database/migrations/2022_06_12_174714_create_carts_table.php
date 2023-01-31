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
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
              $table->string('adulte')->nullable();
            $table->string('chiled')->nullable();
            $table->string('date')->nullable();
            $table->string('time')->nullable();

            $table->string('user_airline')->nullable();
            $table->string('user_number')->nullable();
            $table->string('user_form')->nullable();
            $table->string('user_point')->nullable();
            $table->string('user_notes')->nullable();
            $table->string('name_user')->nullable();
            $table->string('name_email')->nullable();
            $table->string('name_phone')->nullable();
            $table->string('user_date')->nullable();
            $table->string('user_time')->nullable();
            $table->foreignId('user_id')->nullable()->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('trip_id')->nullable()->constrained('trips')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('package_id')->nullable()->constrained('packages')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('transfer_id')->nullable()->constrained('transfers')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('adult_price')->nullable();
            $table->string('child_price')->nullable();
            $table->string('total')->nullable();
            $table->string('adult_number')->nullable();
            $table->string('child_number')->nullable();
            $table->foreignId('date_id')->nullable()->constrained('dates')->cascadeOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('carts');
    }
};
