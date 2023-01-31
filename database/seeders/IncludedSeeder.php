<?php

namespace Database\Seeders;

use App\Models\Included;
use App\Models\Package;
use App\Models\Trips;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class IncludedSeeder extends Seeder
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
        DB::table('excludeds')->truncate();
     

        for ($i = 0; $i <= 10; $i++) {
            Included::create([
                "name" => ['ar' => $faker->name, 'en' => $faker->name],
                "trip_id" => Trips::all()->random()->id,
                "packages_id" => Package::all()->random()->id,
            
            ]);
        }


        Schema::enableForeignKeyConstraints();
    }
}
