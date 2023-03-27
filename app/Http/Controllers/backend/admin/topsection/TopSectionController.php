<?php

namespace App\Http\Controllers\backend\admin\topsection;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TopSection;
use Config;
class TopSectionController extends Controller
{
    function __construct(){

    }

    public function details(Request $request){
        $objDetails = new TopSection();
        $data['details'] = $objDetails->getDetails();
        if ($request->isMethod('post')) {

            $objDetails = new TopSection();
            $result = $objDetails->editDetail($request);
            if($result){
                $return['status'] = 'success';
                $return['message'] = 'Top Section successfully updated';
                $return['redirect'] = route('admin-top-section');
            }else{
                $return['status'] = 'error';
                $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
                $return['message'] = 'Something goes to wrong.Please try again';
            }
            return json_encode($return);
                exit();
        }
        $data['title'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Top Section';
        $data['description'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Top Section';
        $data['keywords'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Top Section';
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
            'topsection.js'
        );
        $data['funinit'] = array(
            'TopSection.list()'
        );
        $data['header'] = array(
            'title' => 'Top Section',
            'breadcrumb' => array(
                'Dashboard' => route('admin-dashboard'),
                'Top Section' => 'Top Section',
            )
        );
        return view('backend.pages.admin.topsection.list', $data);
    }
}
