<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Photo;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        Schema::disableForeignKeyConstraints();
        DB::table('blogs')->truncate();
     

        for ($i = 0; $i <= 10; $i++) {
            Blog::create([
                "name" => ['ar' => $faker->name, 'en' => $faker->name],
                "notes" => ['ar' => $faker->name, 'en' => $faker->name],
            
            ]);
        }


        for ($i = 1; $i <= 10 ; $i++) {
            Photo::insert([
                'Filename'     => rand(1,6) . ".jpg",
                'photoable_id' => rand(1,6),
                'photoable_type' => 'App\Models\Blog'
            ]);
        }
        Schema::enableForeignKeyConstraints();
    }
}
