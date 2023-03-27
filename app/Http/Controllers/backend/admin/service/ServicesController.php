<?php

namespace App\Http\Controllers\backend\admin\service;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Services;
use Config;


class ServicesController extends Controller
{
    function __construct()
    {

    }

    public function list(Request $request){
        $data['title'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Services List';
        $data['description'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Services List';
        $data['keywords'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Services List';
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
            'service.js'
        );
        $data['funinit'] = array(
            'Services.list()'
        );
        $data['header'] = array(
            'title' => 'Services List',
            'breadcrumb' => array(
                'Dashboard' => route('admin-dashboard'),
                'Services List' => 'Services List',
            )
        );
        return view('backend.pages.admin.service.list', $data);
    }

    public function add(Request $request){

        if ($request->isMethod('post')) {

            $objServices = new Services();
            $result = $objServices->addDetail($request);
            if($result){
                $return['status'] = 'success';
                $return['message'] = 'Services successfully added';
                $return['redirect'] = route('admin-service');
            }else{
                $return['status'] = 'error';
                $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
                $return['message'] = 'Something goes to wrong.Please try again';
            }
            return json_encode($return);
                exit();
        }

        $data['title'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Add Services List';
        $data['description'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Add Services List';
        $data['keywords'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Add Services List';
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
            'service.js'
        );
        $data['funinit'] = array(
            'Services.add()'
        );
        $data['header'] = array(
            'title' => 'Add Services List',
            'breadcrumb' => array(
                'Dashboard' => route('admin-dashboard'),
                'Services List' => route('admin-service'),
                'Add Services List' => 'Add Services List',
            )
        );
        return view('backend.pages.admin.service.add', $data);
    }

    public function edit(Request $request,$id){

        if ($request->isMethod('post')) {

            $objServices = new Services();
            $result = $objServices->editDetail($request);
            if($result){
                $return['status'] = 'success';
                $return['message'] = 'Services successfully edited';
                $return['redirect'] = route('admin-service');
            }else{
                $return['status'] = 'error';
                $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
                $return['message'] = 'Something goes to wrong.Please try again';
            }
            return json_encode($return);
                exit();
        }

        $objServices = new Services();
        $data['details']  = $objServices->getDetail($id);

        $data['title'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Edit Services List';
        $data['description'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Edit Services List';
        $data['keywords'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Edit Services List';
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
            'service.js'
        );
        $data['funinit'] = array(
            'Services.edit()'
        );
        $data['header'] = array(
            'title' => 'Edit Services List',
            'breadcrumb' => array(
                'Dashboard' => route('admin-dashboard'),
                'Services List' => route('admin-service'),
                'Edit Services List' => 'Edit Services List',
            )
        );
        return view('backend.pages.admin.service.edit', $data);
    }

    public function ajaxAction(Request $request) {
        $action = $request->input('action');
        $session = session()->all();
        switch ($action) {
            case 'getdatatable':
                $objServices = new Services();
                $list = $objServices->getdatatable();

                echo json_encode($list);
                break;

            case 'deleteServices':
                // echo $request->input('data');
                $obj = new Services();
                $result = $obj->deleteServices($request->input('data'));
                if ($result) {
                    $return['status'] = 'success';
                    $return['message'] = 'Services successfully deleted';
                    $return['redirect'] = route('admin-service');
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
