<?php

namespace Database\Seeders;

use App\Models\Currencies;
use App\Models\Dates;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('dates')->truncate();
        Dates::factory()->count(10)->create();
        Schema::enableForeignKeyConstraints();
    }
}
