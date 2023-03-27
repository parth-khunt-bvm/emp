<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class CareerDepartment extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('department')->insert([
            'phoneno' => 1234567890,
            'email' => 'maxthon@gmail.com',
            'line1' => "WE HAVE A RANGE OF AMAZING OPPORTUNITIES AVAILABLE",
            'line2' => "Join Our Team",
           'created_at' => date("Y-m-d h:i:s"),
            'updated_at' => date("Y-m-d h:i:s"),
        ]);
    }
}
