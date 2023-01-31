<?php

namespace Database\Seeders;

use App\Models\Currencies;
use App\Models\Extra;
use App\Models\Photo;
use App\Models\Transfer;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class TransferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('transfers')->truncate();
        Transfer::factory()->count(10)->create();


        $extras = Extra::all();
        Transfer::all()->each(function ($transfer) use ($extras) {
            $transfer->extras()->attach($extras->random(rand(1, 4))->pluck('id')->toArray());
        });


        for ($i = 1; $i <= 50 ; $i++) {
            Photo::insert([
                'Filename'     => rand(1,5) . ".jpg",
                'photoable_id' => rand(1,5),
                'photoable_type' => 'App\Models\Transfer'
            ]);
        }
        Schema::enableForeignKeyConstraints();
    }
}
