<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;


class AdminsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $Admin=Admin::create(["first_name"=>"Super","last_name"=>"Admin","email"=>"admin@admin.com","password"=>Hash::make("password")]);

        $Admin->assignRole('super admin');;
    }

}
