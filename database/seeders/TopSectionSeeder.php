<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class TopSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('top_section')->insert([
            'image' => 'slider4.jpg',
            'icon' => 'happy.png',
            'title'=>'WE CLEAN A LOT.',
            'short_description'=>'OUR VALUES World’s leading non-asset- based supply chain management companies.',
            'description'=>'<p><strong>Customized advice to smallholder couriera with radical efficiency and scalability logistic.</strong></p><p>Washla customers has a tremendous opportunity to answer the call of logistic needs across the globe. Has 26 affiliated state soybean associations representing 30 soybean-producing state.</p>',
            'created_at' => date("Y-m-d h:i:s"),
            'updated_at' => date("Y-m-d h:i:s"),
        ]);
    }
}
