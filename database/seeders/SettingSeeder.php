<?php

namespace Database\Seeders;

use App\Models\Photo;
use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('settings')->truncate();
        $new = new Setting();
        $new->logo = "test";
        $new->name = "test";
        $new->description = "test";
        $new->phone = "0111111111";
        $new->Fax = "0111111111";
        $new->email = "test@test.com";
        $new->notes = "test";
        $new->address = "test";
        $new->facebook = "https://facebook.com/";
        $new->twitter = "https://twitter.com/";
        $new->instagram = "https://www.instagram.com/";
        $new->YouTube = "https://youtube.com/";
        $new->url = "";
        $new->save();

        for ($i = 1; $i <= 2 ; $i++) {
            Photo::insert([
                'Filename'     => rand(1,5) . ".jpg",
                'photoable_id' => 1,
                'photoable_type' => 'App\Models\Setting'
            ]);
        }


        

        Schema::enableForeignKeyConstraints();
    }
}
