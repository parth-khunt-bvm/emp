<?php

namespace App\Http\Controllers\frontend\services;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Config;
use App\Models\Testimonials;
use App\Models\Services;
use App\Models\Ourclients;


class ServicesController extends Controller
{
    //
    function __construct(){

    }

    public function services(Request $request){
        $obj = new Testimonials();
        $data['testimonials']  = $obj->getAllDetails();
        $objService = new Services();
        $data['service'] = $objService->getAllDetails();
        $objDetails = new Ourclients();
        $data['ourClient'] = $objDetails->getAllDetails();
        $data['title'] = Config::get( 'constants.PROJECT_NAME' ) . ' || '. Config::get( 'title.SERVICES_PAGE' ) ;
        $data['description'] = Config::get( 'constants.PROJECT_NAME' ) . ' || '. Config::get( 'description.SERVICES_PAGE' ) ;
        $data['keywords'] = Config::get( 'constants.PROJECT_NAME' ) . ' || '. Config::get( 'keywords.SERVICES_PAGE' ) ;
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
            'title' => 'Services',
            'breadcrumb' => array()
        );
        return view('frontend.pages.services.services', $data);
    }
    public function servicedetails($id){
      
        $objService = new Services();
        $data['service'] = $objService->getDetail($id);
        $data['title'] = Config::get( 'constants.PROJECT_NAME' ) . ' || '. Config::get( 'title.SERVICES_PAGE' ) ;
        $data['description'] = Config::get( 'constants.PROJECT_NAME' ) . ' || '. Config::get( 'description.SERVICES_PAGE' ) ;
        $data['keywords'] = Config::get( 'constants.PROJECT_NAME' ) . ' || '. Config::get( 'keywords.SERVICES_PAGE' ) ;
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
            'title' => 'Services',
            'breadcrumb' => array()
        );
        return view('frontend.pages.services.servicesdetails', $data);
    }
}
