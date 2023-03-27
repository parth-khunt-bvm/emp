<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class DetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('details')->insert([
            'phoneno' => 1234567890,
            'email' => 'maxthon@gmail.com',
            'facebook' => "https://www.facebook.com/",
            'twitter' =>"https://twitter.com/",
            'linkedin' => "https://linkedin.com/",
            'instagram' => "https://instagram.com/",
            'github' => "https://github.com/",
            'logo' => "logo.png",
            'favicon' => "favicon.png",
            'address_line1' => "226, Silverstone arcade, Causeway Rd",
            'address_line2' => "near D'mart, Katargam, Surat, Gujarat 395004",
            'aboutus' => "Maxthon Technologies is a software design and development company that provides end-to-end development service for web and mobile development.",
            'map' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3719.339621376438!2d72.80720581424869!3d21.218377086655355!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be04f1ea763694b%3A0x88876be9064466f8!2sMaxthon%20Technologies!5e0!3m2!1sen!2sin!4v1610420456510!5m2!1sen!2sin" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>',
            'created_at' => date("Y-m-d h:i:s"),
            'updated_at' => date("Y-m-d h:i:s"),
        ]);
    }
}
