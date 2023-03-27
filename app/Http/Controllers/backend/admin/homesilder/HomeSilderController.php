<?php

namespace App\Http\Controllers\backend\admin\homesilder;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeSilder;
use Config;
class HomeSilderController extends Controller
{
    function __construct()
    {

    }

    public function list(Request $request){
        $data['title'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Home Silder List';
        $data['description'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Home Silder List';
        $data['keywords'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Home Silder List';
        $data['css'] = array(
            'toastr/toastr.min.css'
        );
        $data['plugincss'] = array(
            'plugins/custom/datatables/datatables.bundled1cf.css'
        );
        $data['pluginjs'] = array(
            'toastr/toastr.min.js',
            'plugins/validate/jquery.validate.min.js',
            'plugins/custom/datatables/datatables.bundled1cf.js',
            'pages/crud/datatables/data-sources/htmld1cf.js'
        );
        $data['js'] = array(
            'comman_function.js',
            'ajaxfileupload.js',
            'jquery.form.min.js',
            'homesilder.js'
        );
        $data['funinit'] = array(
            'Homesilder.list()'
        );
        $data['header'] = array(
            'title' => 'Home Silder List',
            'breadcrumb' => array(
                'Dashboard' => route('admin-dashboard'),
                'Home Silder List' => 'Home Silder List',
            )
        );
        return view('backend.pages.admin.homesilder.list', $data);
    }

    public function add(Request $request){

        if ($request->isMethod('post')) {

            $objHomeSilder = new HomeSilder();
            $result = $objHomeSilder->addDetail($request);
            if($result){
                $return['status'] = 'success';
                $return['message'] = 'Home silder successfully added';
                $return['redirect'] = route('admin-home-silder');
            }else{
                $return['status'] = 'error';
                $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
                $return['message'] = 'Something goes to wrong.Please try again';
            }
            return json_encode($return);
                exit();
        }

        $data['title'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Add Home Silder List';
        $data['description'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Add Home Silder List';
        $data['keywords'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Add Home Silder List';
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
            'homesilder.js'
        );
        $data['funinit'] = array(
            'Homesilder.add()'
        );
        $data['header'] = array(
            'title' => 'Add Home Silder List',
            'breadcrumb' => array(
                'Dashboard' => route('admin-dashboard'),
                'Home Silder List' => route('admin-home-silder'),
                'Add Home Silder List' => 'Add Home Silder List',
            )
        );
        return view('backend.pages.admin.homesilder.add', $data);
    }

    public function edit(Request $request,$id){

        if ($request->isMethod('post')) {

            $objHomeSilder = new HomeSilder();
            $result = $objHomeSilder->editDetail($request);
            if($result){
                $return['status'] = 'success';
                $return['message'] = 'Home silder successfully edited';
                $return['redirect'] = route('admin-home-silder');
            }else{
                $return['status'] = 'error';
                $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
                $return['message'] = 'Something goes to wrong.Please try again';
            }
            return json_encode($return);
                exit();
        }

        $objHomeSilder = new HomeSilder();
        $data['details']  = $objHomeSilder->getDetail($id);

        $data['title'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Edit Home Silder List';
        $data['description'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Edit Home Silder List';
        $data['keywords'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Edit Home Silder List';
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
            'homesilder.js'
        );
        $data['funinit'] = array(
            'Homesilder.edit()'
        );
        $data['header'] = array(
            'title' => 'Edit Home Silder List',
            'breadcrumb' => array(
                'Dashboard' => route('admin-dashboard'),
                'Home Silder List' => route('admin-home-silder'),
                'Edit Home Silder List' => 'Edit Home Silder List',
            )
        );
        return view('backend.pages.admin.homesilder.edit', $data);
    }

    public function ajaxAction(Request $request) {
        $action = $request->input('action');
        $session = session()->all();
        switch ($action) {
            case 'getdatatable':
                $objHomeSilder = new HomeSilder();
                $list = $objHomeSilder->getdatatable();

                echo json_encode($list);
                break;

            case 'deleteHomeSilder':
                // echo $request->input('data');
                $obj = new HomeSilder();
                $result = $obj->deleteHomeSilder($request->input('data'));
                if ($result) {
                    $return['status'] = 'success';
                    $return['message'] = 'Home silder successfully deleted';
                    $return['redirect'] = route('admin-home-silder');
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
