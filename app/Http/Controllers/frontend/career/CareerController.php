<?php

namespace App\Http\Controllers\frontend\career;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Config;
use App\Models\Department;
use App\Models\Carrer;
use App\Models\CareerDetail;

class CareerController extends Controller
{
    function __construct(){

    }

    public function career(Request $request){
        if ($request->isMethod('post')) {
            $objRequestList = new CareerDetail();
            $res = $objRequestList->saveDetails($request);
            if($res){
                $return['status'] = 'success';
                $return['message'] = 'Your details successfully received.We will contact you soon.';
                $return['redirect'] = route('career');
            }else{
                $return['status'] = 'error';
                $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
                $return['message'] = 'Something goes to wrong.Please try again';
            }
            return json_encode($return);
            exit();
        }
        $objDetails = new Department();
        $data['department'] = $objDetails->getDetail();

        $objDetails = new Carrer();
        $data['carrer'] = $objDetails->getAllDetails();
        $data['title'] = Config::get( 'constants.PROJECT_NAME' ) . ' || '. Config::get( 'title.CAREER_PAGE' ) ;
        $data['description'] = Config::get( 'constants.PROJECT_NAME' ) . ' || '. Config::get( 'description.CAREER_PAGE' ) ;
        $data['keywords'] = Config::get( 'constants.PROJECT_NAME' ) . ' || '. Config::get( 'keywords.CAREER_PAGE' ) ;
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
            'career.min.js'
        );
        $data['funinit'] = array(
            'Career.init()'
        );
        $data['header'] = array(
            'title' => 'Career',
            'breadcrumb' => array()
        );
        return view('frontend.pages.career.career', $data);
    }

    public function careerdetail(Request $request,$id){
        $obj = new Carrer();
        $data['career'] = $obj->getDetail($id);
        $objDetails = new Carrer();
        $data['careers'] = $objDetails->getDetailWithoutId($id);
        $data['title'] = Config::get( 'constants.PROJECT_NAME' ) . ' || '. Config::get( 'title.CAREER_PAGE' ) ;
        $data['description'] = Config::get( 'constants.PROJECT_NAME' ) . ' || '. Config::get( 'description.CAREER_PAGE' ) ;
        $data['keywords'] = Config::get( 'constants.PROJECT_NAME' ) . ' || '. Config::get( 'keywords.CAREER_PAGE' ) ;
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
            'title' => 'CAREER',
            'breadcrumb' => array()
        );
        return view('frontend.pages.career.careerdetail', $data);
    }
}
