<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pageHeader = ['Services','About us','Career','Portfolio','Blog','Contact us','Team','FAQS'];

        for ($i=0; $i < count($pageHeader) ; $i++) {
            DB::table('menu_access')->insert([
                'menu' => $pageHeader[$i],
                'is_active'=>'Yes',
                'created_at' => date("Y-m-d h:i:s"),
                'updated_at' => date("Y-m-d h:i:s"),
            ]);
        }
    }
}
