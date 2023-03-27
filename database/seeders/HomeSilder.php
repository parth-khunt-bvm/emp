<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class HomeSilder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('silder')->insert([
            'image' => 'slider4.jpg',
            'title'=>'WE CLEAN A LOT.',
            'description'=>'BECAUSE QUALITY IS NECESSARY',
            'is_deleted' => "No",
            'created_at' => date("Y-m-d h:i:s"),
            'updated_at' => date("Y-m-d h:i:s"),
        ]);
    }
}
