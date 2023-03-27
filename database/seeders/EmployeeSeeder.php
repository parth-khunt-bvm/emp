<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Illuminate\Support\Facades\Hash;
class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'firstname' => "Employee",
            'lastname' => "Panel",
            'email' => "employee@admin.com",
            'password' => Hash::make('Maxthon_emp@123'),
            'userimage' => 'default.jpg',
            'usertype' => 'U',
            'is_deleted' => "N",
            'email_verified' => "Y",
            'email_verified_at'=> date("Y-m-d h:i:s"),
            'created_at' => date("Y-m-d h:i:s"),
            'updated_at' => date("Y-m-d h:i:s"),
        ]);
    }
}
