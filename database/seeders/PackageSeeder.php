<?php

namespace Database\Seeders;

use App\Models\Dates;
use App\Models\Extra;
use App\Models\Package;
use App\Models\Photo;
use App\Models\Transfer;
use App\Models\Trips;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('packages')->truncate();
        Package::factory()->count(10)->create();
        $extras = Extra::all();
        $dates = Dates::all();
        $trips = Trips::all();
        $transfers = Transfer::all();
        Package::all()->each(function ($Package) use ($extras,$dates,$trips,$transfers) {
            $Package->extras()->attach($extras->random(rand(1, 4))->pluck('id')->toArray());
            $Package->dates()->attach($dates->random(rand(1, 4))->pluck('id')->toArray());
            $Package->trips()->attach($trips->random(rand(1, 4))->pluck('id')->toArray());
            $Package->transfers()->attach($transfers->random(rand(1, 4))->pluck('id')->toArray());
        });

        for ($i = 1; $i <= 50 ; $i++) {
            Photo::insert([
                'Filename'     => rand(1,5) . ".jpg",
                'photoable_id' => rand(1,5),
                'photoable_type' => 'App\Models\Package'
            ]);
        }
        Schema::enableForeignKeyConstraints();
    }
}
