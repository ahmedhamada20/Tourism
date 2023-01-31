<?php

namespace Database\Seeders;

use App\Models\Currencies;
use App\Models\Destenation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CurrenciesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('currencies')->truncate();
        Currencies::factory()->count(10)->create();
        Schema::enableForeignKeyConstraints();
    }
}
