<?php

namespace App\Http\Controllers\frontend\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Config;
use App\Models\Ourclients;
use App\Models\Statistical;
use App\Models\OurTeam;
use App\Models\HomeSilder;
use App\Models\HomeService;
use App\Models\Section2;
use App\Models\TopSection;
use App\Models\BannerSection;
use App\Models\Technologiescategory;
use App\Models\Technology;

class HomeController extends Controller
{
    //
    function __construct(){

    }

    public function home(Request $request){
        $objDetails = new Statistical();
        $data['statistical'] = $objDetails->getDetails();
        $objDetails = new Ourclients();
        $data['ourClient'] = $objDetails->getAllDetails();
        $objDetails = new OurTeam();
        $data['ourTeam'] = $objDetails->getAllDetails();
        $objDetails = new HomeSilder();
        $data['homeSlider'] = $objDetails->getAllDetails();
        $objHomeService = new HomeService();
        $data['homeService'] = $objHomeService->getAllDetails();
        $objSection2= new Section2();
        $data['section2'] = $objSection2->getDetails();
        $data['section2_extraimages']=explode(",",$data['section2'][0]->image);

        $objTopSection = new TopSection();
        $data['topsection'] = $objTopSection->getDetails();
        $objBannerSection = new BannerSection();
        $data['bannersection'] = $objBannerSection->getDetails();

        $objTechnologiescategory = new Technologiescategory();
        $data['categroy'] = $objTechnologiescategory->getHomeCategroy();

        $objTechnology = new Technology();
        $data['technology'] = $objTechnology->getHomeTechnology();
        // print_r($data['technology']);
        // die();
        $data['title'] = Config::get( 'constants.PROJECT_NAME' ) . ' || '. Config::get( 'title.HOME_PAGE' ) ;
        $data['description'] = Config::get( 'constants.PROJECT_NAME' ) . ' || '. Config::get( 'description.HOME_PAGE' ) ;
        $data['keywords'] = Config::get( 'constants.PROJECT_NAME' ) . ' || '. Config::get( 'keywords.HOME_PAGE' ) ;
        $data['css'] = array(
        );
        $data['plugincss'] = array(
        );
        $data['pluginjs'] = array(
        );
        $data['js'] = array(
            'homepage.min.js'
        );
        $data['funinit'] = array(
            'Homepage.init()'
        );
        $data['header'] = array(
        );
        return view('frontend.pages.home.home', $data);
    }
}
