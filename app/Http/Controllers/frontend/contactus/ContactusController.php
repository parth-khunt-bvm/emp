<?php

namespace App\Http\Controllers\frontend\contactus;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Config;
use App\Models\Contactusdetails;
use App\Models\RequestList;
class ContactusController extends Controller
{
    function __construct(){

    }

    public function contactus(Request $request){

        if ($request->isMethod('post')) {

            $objRequestList = new RequestList();
            $res = $objRequestList->saveDetails($request);
            if($res){
                $return['status'] = 'success';
                $return['message'] = 'Your details successfully received.We will contact you soon.';
                $return['redirect'] = route('contact-us');
            }else{
                $return['status'] = 'error';
                $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
                $return['message'] = 'Something goes to wrong.Please try again';
            }
            return json_encode($return);
            exit();
        }

        $objContactusdetails = new Contactusdetails();
        $data['details'] = $objContactusdetails->getDetails();

        $data['title'] = Config::get( 'constants.PROJECT_NAME' ) . ' || '. Config::get( 'title.CONTACT_US_PAGE' ) ;
        $data['description'] = Config::get( 'constants.PROJECT_NAME' ) . ' || '. Config::get( 'description.CONTACT_US_PAGE' ) ;
        $data['keywords'] = Config::get( 'constants.PROJECT_NAME' ) . ' || '. Config::get( 'keywords.CONTACT_US_PAGE' ) ;
        $data['css'] = array(
        );
        $data['plugincss'] = array(
        );
        $data['pluginjs'] = array(
            'toastr/toastr.min.js',
            'plugins/validate/jquery.validate.min.js',
        );
        $data['js'] = array(
            'comman_function.js',
            'ajaxfileupload.js',
            'jquery.form.min.js',
            'contactus.min.js'
        );
        $data['funinit'] = array(
            'Contactus.init()'
        );
        $data['header'] = array(
            'title' => 'Contact Us',
            'breadcrumb' => array()
        );
        return view('frontend.pages.contactus.contactus', $data);
    }
}
