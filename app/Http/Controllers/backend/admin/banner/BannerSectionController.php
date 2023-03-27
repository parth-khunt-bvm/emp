<?php

namespace App\Http\Controllers\backend\admin\banner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BannerSection;
use Config;

class BannerSectionController extends Controller
{
    function __construct(){

    }

    public function details  (Request $request){
        $objDetails = new BannerSection();
        $data['details'] = $objDetails->getDetails();
        if ($request->isMethod('post')) {

            $objDetails = new BannerSection();
            $result = $objDetails->editDetail($request);
            if($result){
                $return['status'] = 'success';
                $return['message'] = 'Banner Section successfully updated';
                $return['redirect'] = route('admin-banner-section');
            }else{
                $return['status'] = 'error';
                $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
                $return['message'] = 'Something goes to wrong.Please try again';
            }
            return json_encode($return);
                exit();
        }
        $data['title'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Banner Section';
        $data['description'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Banner Section';
        $data['keywords'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Banner Section';
        $data['css'] = array(
            'toastr/toastr.min.css'
        );
        $data['plugincss'] = array(
        );
        $data['pluginjs'] = array(
            'toastr/toastr.min.js',
            'plugins/validate/jquery.validate.min.js',
            'plugins/custom/ckeditor/ckeditor-classic.bundled1cf.js',
            'pages/crud/forms/editors/ckeditor-classicd1cf.js'
        );
        $data['js'] = array(
            'comman_function.js',
            'ajaxfileupload.js',
            'jquery.form.min.js',
            'banner.js'
        );
        $data['funinit'] = array(
            'Banner.list()'
        );
        $data['header'] = array(
            'title' => 'Banner Section',
            'breadcrumb' => array(
                'Dashboard' => route('admin-dashboard'),
                'Banner Section' => 'Banner Section',
            )
        );
        return view('backend.pages.admin.banner.list', $data);
    }
}
