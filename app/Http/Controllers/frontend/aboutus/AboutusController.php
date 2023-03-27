<?php

namespace App\Http\Controllers\frontend\aboutus;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Config;
use App\Models\Aboutus_section_one;
use App\Models\Aboutus_section_two;
use App\Models\Statistical;
use App\Models\Ourclients;


class AboutusController extends Controller
{
    function __construct(){

    }

    public function aboutus(Request $request){
        $objAboutussectionone = new Aboutus_section_one();
        $data['aboutus_section_one'] = $objAboutussectionone->getDetails();
        $objAboutussectiontwo = new Aboutus_section_two();
        $data['aboutus_section_two'] = $objAboutussectiontwo->getDetails();
        $objDetails = new Statistical();
        $data['statistical'] = $objDetails->getDetails();
        $objDetails = new Ourclients();
        $data['ourClient'] = $objDetails->getAllDetails();

        $data['title'] = Config::get( 'constants.PROJECT_NAME' ) . ' || '. Config::get( 'title.ABOUT_US_PAGE' ) ;
        $data['description'] = Config::get( 'constants.PROJECT_NAME' ) . ' || '. Config::get( 'description.ABOUT_US_PAGE' ) ;
        $data['keywords'] = Config::get( 'constants.PROJECT_NAME' ) . ' || '. Config::get( 'keywords.ABOUT_US_PAGE' ) ;
        $data['css'] = array(
        );
        $data['plugincss'] = array(
        );
        $data['pluginjs'] = array(
        );
        $data['js'] = array(
        );
        $data['funinit'] = array(
        );
        $data['header'] = array(
            'title' => 'About Us',
            'breadcrumb' => array()
        );
        return view('frontend.pages.aboutus.aboutus', $data);
    }
}
