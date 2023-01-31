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
        Schema::create('extras_transfers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transfer_id')->references('id')->on('transfers')->cascadeOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('extras_transfers');
    }
};
