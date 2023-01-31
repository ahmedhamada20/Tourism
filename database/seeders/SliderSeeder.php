<?php

namespace Database\Seeders;

use App\Models\Photo;
use App\Models\Slider;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        Schema::disableForeignKeyConstraints();
        DB::table('sliders')->truncate();
     

        for ($i = 0; $i <= 5; $i++) {
            Slider::create([
                "name" => ['ar' => $faker->name, 'en' => $faker->name],
                "notes" => ['ar' => $faker->name, 'en' => $faker->name],
                "image" => $faker->randomElement(['1655826244YF5sBZ.webp','1656330299cta.jpg','1656331832add.jpg','16580712820_sharm-el-sheikh_c99d0f74.jpg']),
            ]);
        }


        // for ($i = 1; $i <= 10 ; $i++) {
        //     Photo::insert([
        //         'Filename'     => rand(1,6) . ".png",
        //         'photoable_id' => $i,
        //         'photoable_type' => 'App\Models\Slider'
        //     ]);
        // }
        Schema::enableForeignKeyConstraints();
    }
}
