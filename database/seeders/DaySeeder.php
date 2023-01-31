<?php

namespace Database\Seeders;

use App\Models\Day;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('days')->truncate();
        Day::create(['name' => ['ar' => 'الجمعه', 'en' => 'Friday']]);
        Day::create(['name' => ['ar' => 'السبت', 'en' => 'Saturday']]);
        Day::create(['name' => ['ar' => 'الأحد', 'en' => 'Sunday']]);
        Day::create(['name' => ['ar' => 'الاثنين', 'en' => 'Monday']]);
        Day::create(['name' => ['ar' => 'الثلاثاء', 'en' => 'Tuesday']]);
        Day::create(['name' => ['ar' => 'الأربعاء', 'en' => 'Wednesday']]);
        Day::create(['name' => ['ar' => 'الخميس', 'en' => 'Thursday']]);
        Schema::enableForeignKeyConstraints();
    }
}
