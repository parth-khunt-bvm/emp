<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class StatisticalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statistical')->insert([
            'image' => 'cleaning-equipmen.jpg',
            'icon1'=>'happy.png',
            'count1'=>'300',
            'icon2'=>'counter-house-cleaning.png',
            'count2'=>'300',
            'icon3'=>'counter-award.png',
            'count3'=>'300',
            'icon4'=>'service-glass-cleaning.png',
            'count4'=>'300',
            'created_at' => date("Y-m-d h:i:s"),
            'updated_at' => date("Y-m-d h:i:s"),
        ]);
    }
}
