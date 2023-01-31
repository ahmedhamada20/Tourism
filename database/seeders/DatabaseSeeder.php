<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AboutUsSeeder::class);
        $this->call(SliderSeeder::class);
        $this->call(SettingSeeder::class);
        $this->call(BlogSeeder::class);
        $this->call(DaySeeder::class);
        $this->call(CountriesSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(DestenationSeeder::class);
        $this->call(CurrenciesSeeder::class);
        $this->call(ExtraSeeder::class);
        $this->call(TransferSeeder::class);
        $this->call(DatesSeeder::class);
        $this->call(TripsSeeder::class);
        $this->call(PackageSeeder::class);
        $this->call(CallToActionSeeder::class);
        $this->call(AdditionalSeeder::class);
        $this->call(ExcludedSeeder::class);
        $this->call(IncludedSeeder::class);
        $this->call(MoreDetailsSeeder::class);
    }
}
