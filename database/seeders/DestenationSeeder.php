<?php

namespace Database\Seeders;

use App\Models\Destenation;
use App\Models\Photo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class DestenationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('destenations')->truncate();

        Destenation::factory()->count(10)->create();
        
        for ($i = 1; $i <= 20 ; $i++) {
            Photo::insert([
                'Filename'     => rand(1,5) . ".jpg",
                'photoable_id' => rand(1,6),
                'photoable_type' => 'App\Models\Destenation'
            ]);
        }

        Schema::enableForeignKeyConstraints();
    }
}
