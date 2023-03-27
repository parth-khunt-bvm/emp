<?php

namespace App\Http\Controllers\backend\admin\section2;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Config;
use App\Models\Section2;
class Section2Controller extends Controller
{
    function __construct(){

    }

    public function details  (Request $request){
        $objDetails = new Section2();
        $data['details'] = $objDetails->getDetails();
        $data['extraimages']=explode(",",$data['details'][0]->image);
        if ($request->isMethod('post')) {
            $objDetails = new Section2();
            $result = $objDetails->editDetail($request);
            if($result){
                $return['status'] = 'success';
                $return['message'] = 'Section2 successfully updated';
                $return['redirect'] = route('admin-section2');
            }else{
                $return['status'] = 'error';
                $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
                $return['message'] = 'Something goes to wrong.Please try again';
            }
            return json_encode($return);
                exit();
        }
        $data['title'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Section2';
        $data['description'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Section2';
        $data['keywords'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Section2';
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
            'section2.js'
        );
        $data['funinit'] = array(
            'Section2.list()'
        );
        $data['header'] = array(
            'title' => 'Section2',
            'breadcrumb' => array(
                'Dashboard' => route('admin-dashboard'),
                'Section2' => 'Section2',
            )
        );
        return view('backend.pages.admin.section2.list', $data);
    }
    public function ajaxAction(Request $request) {
        $action = $request->input('action');
        switch ($action) {
            case 'deleteSection2':
                // echo $request->input('data');
                $obj = new Section2();
                $result = $obj->deleteImage($request->input('data'));
                if ($result) {
                    $return['status'] = 'success';
                    $return['message'] = 'Image successfully deleted';
                    $return['redirect'] = route('admin-section2');
                } else {
                        $return['status'] = 'error';
                        $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
                        $return['message'] = 'Something goes to wrong.';
                }
                echo json_encode($return);
                exit;
        }
    }
}
