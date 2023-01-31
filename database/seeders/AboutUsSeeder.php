<?php

namespace Database\Seeders;

use App\Models\AboutUs;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AboutUsSeeder extends Seeder
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
        DB::table('about_us')->truncate();
        $new = new AboutUs();
        $new->name = ['en' => $faker->name, 'ar' => $faker->name];
        $new->notes = ['en' => $faker->paragraph, 'ar' => $faker->paragraph];
        $new->icon_1 = '<i class="fa-solid fa-hexagon-image"></i>';
        $new->title_1 = ['en' => $faker->name, 'ar' => $faker->name];
        $new->icon_2 = '<i class="fa-solid fa-hexagon-image"></i>';
        $new->title_2 = ['en' => $faker->name, 'ar' => $faker->name];
        $new->icon_3 = '<i class="fa-solid fa-hexagon-image"></i>';
        $new->title_3 = ['en' => $faker->name, 'ar' => $faker->name];
        $new->icon_4 = '<i class="fa-solid fa-hexagon-image"></i>';
        $new->title_4 = ['en' => $faker->name, 'ar' => $faker->name];
        $new->icon_5 = '<i class="fa-solid fa-hexagon-image"></i>';
        $new->title_5 = ['en' => $faker->name, 'ar' => $faker->name];
        $new->icon_6 = '<i class="fa-solid fa-hexagon-image"></i>';
        $new->title_6 = ['en' => $faker->name, 'ar' => $faker->name];
        $new->name_chooseUs =  ['en' => $faker->name, 'ar' => $faker->name];
        $new->notes_chooseUs =  ['en' => $faker->paragraph, 'ar' => $faker->paragraph];
        $new->video = $faker->url;
        $new->save();
        
        Schema::enableForeignKeyConstraints();
    }
}
