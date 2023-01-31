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
        Schema::create('about_us', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('notes');

            $table->string('icon_1');
            $table->string('title_1');

            $table->string('icon_2');
            $table->string('title_2');

            $table->string('icon_3');
            $table->string('title_3');

            $table->string('icon_4');
            $table->string('title_4');

            $table->string('icon_5');
            $table->string('title_5');

            $table->string('icon_6');
            $table->string('title_6');

            $table->string('name_chooseUs');
            $table->longText('notes_chooseUs');
            $table->text('video');
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
        Schema::dropIfExists('about_us');
    }
};
