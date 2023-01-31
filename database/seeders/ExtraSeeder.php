<?php

namespace Database\Seeders;

use App\Models\Currencies;
use App\Models\Extra;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ExtraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('extras')->truncate();
        Extra::factory()->count(10)->create();
        Schema::enableForeignKeyConstraints();
    }
}
