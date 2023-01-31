<?php

namespace Database\Seeders;

use App\Models\CallToAction;
use App\Models\Photo;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CallToActionSeeder extends Seeder
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
        DB::table('call_to_actions')->truncate();
        for ($i = 0; $i<= 10; $i++ ) {
            $new = new CallToAction();
            $new->name = ['en' => $faker->name, 'ar' => $faker->name];
            $new->notes = ['en' => $faker->paragraph, 'ar' => $faker->paragraph];
            $new->icon = '<i class="fa fa-add"></i>';
            $new->save();
        }


        for ($i = 1; $i <= 10 ; $i++) {
            Photo::insert([
                'Filename'     => rand(1,6) . ".jpg",
                'photoable_id' => rand(1,5),
                'photoable_type' => 'App\Models\CallToAction'
            ]);
        }
        Schema::enableForeignKeyConstraints();
    }
}
