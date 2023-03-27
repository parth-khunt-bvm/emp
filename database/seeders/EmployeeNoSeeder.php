<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class EmployeeNoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employee_no')->insert([
            'no' => 1,
            'created_at' => date("Y-m-d h:i:s"),
            'updated_at' => date("Y-m-d h:i:s"),
        ]);
    }
}
