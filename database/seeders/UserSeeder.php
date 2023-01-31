<?php

namespace Database\Seeders;

use App\Models\Countries;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('users')->truncate();
        // Creat New Admin
        $admin = new User();
        $admin->name = 'Admin';
        $admin->email = 'admin@admin.com';
        $admin->type = 'admin';
        $admin->countries_id = Countries::all()->random()->id;
        $admin->password = Hash::make('123456789');
        $admin->save();
        //Creat New Customer
        $customer = new User();
        $customer->name = 'customer';
        $customer->email = 'customer@customer.com';
        $customer->type = 'customer';
        $customer->countries_id = Countries::all()->random()->id;
        $customer->password = Hash::make('123456789');
        $customer->save();
        Schema::enableForeignKeyConstraints();
    }
}
