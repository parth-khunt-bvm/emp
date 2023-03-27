<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class SectiontwoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('about_us_section_two')->insert([
            'title' => 'Expert House Cleaning Service you Can Trust',
            'details' => 'Customized advice to smallholder couriera  with radical efficiency and scalability logistic.Washla cleaning service. We are a company dedicated to giving our customers back the time they deserve to enjoy the things they love. We put The Extra In Your Ordinary, restoring balance to your life by taking care of your home.',
            'created_at' => date("Y-m-d h:i:s"),
            'updated_at' => date("Y-m-d h:i:s"),
        ]);
    }
}
