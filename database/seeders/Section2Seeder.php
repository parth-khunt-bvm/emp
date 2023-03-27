<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class Section2Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('section2')->insert([
            'image' => '16117694770.jpg,16117694771.jpg',
            'title'=>'WE CLEAN A LOT.',
            'description'=>'<p><strong>Customized advice to smallholder couriera with radical efficiency and scalability logistic.</strong></p><p>Washla customers has a tremendous opportunity to answer the call of logistic needs across the globe. Has 26 affiliated state soybean associations representing 30 soybean-producing state.</p>',
            'is_deleted' => "No",
            'created_at' => date("Y-m-d h:i:s"),
            'updated_at' => date("Y-m-d h:i:s"),
        ]);
    }
}
