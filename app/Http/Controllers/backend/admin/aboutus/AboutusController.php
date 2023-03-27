<?php

namespace App\Http\Controllers\backend\admin\aboutus;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Config;
use App\Models\Aboutus_section_one;
use App\Models\Aboutus_section_two;
use App\Models\Statistical;

class AboutusController extends Controller
{
    //
    function __construct()
    {

    }

    public function sectionone(Request $request){

        $objDetails = new Aboutus_section_one();
        $data['details'] = $objDetails->getDetails();
        if ($request->isMethod('post')) {

            $objDetails = new Aboutus_section_one();
            $result = $objDetails->editDetail($request);
            if($result){
                $return['status'] = 'success';
                $return['message'] = 'Details successfully updated';
                $return['redirect'] = route('admin-aboutus-section-one');
            }else{
                $return['status'] = 'error';
                $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
                $return['message'] = 'Something goes to wrong.Please try again';
            }
            return json_encode($return);
                exit();
        }
        $data['title'] = Config::get( 'constants.PROJECT_NAME' ) . ' || About Us Section';
        $data['description'] = Config::get( 'constants.PROJECT_NAME' ) . ' || About Us Section';
        $data['keywords'] = Config::get( 'constants.PROJECT_NAME' ) . ' || About Us Section';
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
            'aboutus.js'
        );
        $data['funinit'] = array(
            'Aboutus.one()'
        );
        $data['header'] = array(
            'title' => 'About Us Section',
            'breadcrumb' => array(
                'Dashboard' => route('admin-dashboard'),
                'About Us Section' => 'About Us Section',
            )
        );
        return view('backend.pages.admin.aboutus.sectionone', $data);
    }
    public function sectiontwo(Request $request){

        $objDetails = new Aboutus_section_two();
        $data['details'] = $objDetails->getDetails();
        if ($request->isMethod('post')) {

            $objDetails = new Aboutus_section_two();
            $result = $objDetails->editDetail($request);
            if($result){
                $return['status'] = 'success';
                $return['message'] = 'Details successfully updated';
                $return['redirect'] = route('admin-aboutus-section-two');
            }else{
                $return['status'] = 'error';
                $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
                $return['message'] = 'Something goes to wrong.Please try again';
            }
            return json_encode($return);
                exit();
        }
        $data['title'] = Config::get( 'constants.PROJECT_NAME' ) . ' || About Us Section';
        $data['description'] = Config::get( 'constants.PROJECT_NAME' ) . ' || About Us Section';
        $data['keywords'] = Config::get( 'constants.PROJECT_NAME' ) . ' || About Us Section';
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
            'aboutus.js'
        );
        $data['funinit'] = array(
            'Aboutus.two()'
        );
        $data['header'] = array(
            'title' => 'About Us Section',
            'breadcrumb' => array(
                'Dashboard' => route('admin-dashboard'),
                'About Us Section' => 'About Us Section',
            )
        );
        return view('backend.pages.admin.aboutus.sectiontwo', $data);
    }

    public function statistical(Request $request){
   
        $objDetails = new Statistical();
        $data['details'] = $objDetails->getDetails();
     
        if ($request->isMethod('post')) {
            $objDetails = new Statistical();
            $result = $objDetails->editDetail($request);
            if($result){
                $return['status'] = 'success';
                $return['message'] = 'Details successfully updated';
                $return['redirect'] = route('admin-aboutus-statistical');
            }else{
                $return['status'] = 'error';
                $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
                $return['message'] = 'Something goes to wrong.Please try again';
            }
            return json_encode($return);
                exit();
        }
        $data['title'] = Config::get( 'constants.PROJECT_NAME' ) . ' || About Us Section';
        $data['description'] = Config::get( 'constants.PROJECT_NAME' ) . ' || About Us Section';
        $data['keywords'] = Config::get( 'constants.PROJECT_NAME' ) . ' || About Us Section';
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
            'aboutus.js'
        );
        $data['funinit'] = array(
            'Aboutus.statistical()'
        );
        $data['header'] = array(
            'title' => 'About Us Section',
            'breadcrumb' => array(
                'Dashboard' => route('admin-dashboard'),
                'About Us Section' => 'About Us Section',
            )
        );
        return view('backend.pages.admin.aboutus.statistical', $data);
    }
}
