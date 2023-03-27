<?php

namespace App\Http\Controllers\frontend\faqs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Config;
use App\Models\Faqs;
class FaqsController extends Controller
{
    //
    function __construct(){

    }

    public function faqs(Request $request){
        $objFaqs = new Faqs();
        $data['faqs'] = $objFaqs->getAllDetails();
        $data['title'] = Config::get( 'constants.PROJECT_NAME' ) . ' || '. Config::get( 'title.CONTACT_US_PAGE' ) ;
        $data['description'] = Config::get( 'constants.PROJECT_NAME' ) . ' || '. Config::get( 'description.CONTACT_US_PAGE' ) ;
        $data['keywords'] = Config::get( 'constants.PROJECT_NAME' ) . ' || '. Config::get( 'keywords.CONTACT_US_PAGE' ) ;
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
            'title' => 'FAQS',
            'breadcrumb' => array()
        );
        return view('frontend.pages.faqs.faqs', $data);
    }
}
