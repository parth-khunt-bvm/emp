<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class ContactusDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('contactus_details')->insert([
            'details' => 'World’s leading non-asset- based supply chain management companies, we design and implement industry-leading. We specialise in intelligent & effective search and believes business.',
            'created_at' => date("Y-m-d h:i:s"),
            'updated_at' => date("Y-m-d h:i:s")
        ]);
    }
}
