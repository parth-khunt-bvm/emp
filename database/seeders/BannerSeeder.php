<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pageHeader = ['Services','Portfolio','Blog','Blogdetail','About us','Career','Career Detail','Contact Us','Faqs','Our Team'];

        for ($i=0; $i < count($pageHeader) ; $i++) {
            DB::table('banner')->insert([
                'page_name' => $pageHeader[$i],
                'image'=>'header.png',
                'created_at' => date("Y-m-d h:i:s"),
                'updated_at' => date("Y-m-d h:i:s"),
            ]);
        }
    }
}
