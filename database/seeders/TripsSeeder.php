<?php

namespace Database\Seeders;

use App\Models\Dates;
use App\Models\Day;
use App\Models\Extra;
use App\Models\Photo;
use App\Models\Trips;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class TripsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('trips')->truncate();
        Trips::factory()->count(10)->create();


        $extras = Extra::all();
        Trips::all()->each(function ($trips) use ($extras) {
            $trips->extras()->attach($extras->random(rand(1, 4))->pluck('id')->toArray());
        });

        $day = Day::all();

        Trips::all()->each(function ($trips) use ($day) {
            $trips->days()->attach($day->random(rand(1, 4))->pluck('id')->toArray());
        });


        for ($i = 1; $i <= 50 ; $i++) {
            Photo::insert([
                'Filename'     => rand(1,5) . ".jpg",
                'photoable_id' => rand(1,5),
                'photoable_type' => 'App\Models\Trips'
            ]);
        }

        Schema::enableForeignKeyConstraints();
    }
}
