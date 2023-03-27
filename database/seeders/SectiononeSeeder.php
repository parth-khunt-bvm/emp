<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class SectiononeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('about_us_section_one')->insert([
            'title' => 'Expert House Cleaning Service you Can Trust',
            'details' => 'Customized advice to smallholder couriera  with radical efficiency and scalability logistic.Washla cleaning service. We are a company dedicated to giving our customers back the time they deserve to enjoy the things they love. We put The Extra In Your Ordinary, restoring balance to your life by taking care of your home.',
            'image' => '16108610151.jpg',
            'image_headline' => 'Cleaning Your Worries Away',
            'signuture' => '16108606012.jpg',
            'contact_no' => '0525401332',
            'created_at' => date("Y-m-d h:i:s"),
            'updated_at' => date("Y-m-d h:i:s"),
        ]);
    }
}
