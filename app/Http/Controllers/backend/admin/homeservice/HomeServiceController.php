<?php

namespace App\Http\Controllers\backend\admin\homeservice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeService;
use Config;

class HomeServiceController extends Controller
{
    function __construct()
    {

    }

    public function list(Request $request){
        $data['title'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Home Service List';
        $data['description'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Home Service List';
        $data['keywords'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Home Service List';
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
            'homeservice.js'
        );
        $data['funinit'] = array(
            'HomeService.list()'
        );
        $data['header'] = array(
            'title' => 'Home Service List',
            'breadcrumb' => array(
                'Dashboard' => route('admin-dashboard'),
                'Home Service List' => 'Home Service List',
            )
        );
        return view('backend.pages.admin.homeservice.list', $data);
    }

    public function add(Request $request){

        if ($request->isMethod('post')) {

            $objHomeService = new HomeService();
            $result = $objHomeService->addDetail($request);
            if($result){
                $return['status'] = 'success';
                $return['message'] = 'Home Service successfully added';
                $return['redirect'] = route('admin-home-service');
            }else{
                $return['status'] = 'error';
                $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
                $return['message'] = 'Something goes to wrong.Please try again';
            }
            return json_encode($return);
                exit();
        }

        $data['title'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Add Home Service List';
        $data['description'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Add Home Service List';
        $data['keywords'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Add Home Service List';
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
            'homeservice.js'
        );
        $data['funinit'] = array(
            'HomeService.add()'
        );
        $data['header'] = array(
            'title' => 'Add Home Service List',
            'breadcrumb' => array(
                'Dashboard' => route('admin-dashboard'),
                'Home Service List' => route('admin-home-service'),
                'Add Home Service List' => 'Add Home Service List',
            )
        );
        return view('backend.pages.admin.homeservice.add', $data);
    }

    public function edit(Request $request,$id){

        if ($request->isMethod('post')) {

            $objHomeService = new HomeService();
            $result = $objHomeService->editDetail($request);
            if($result){
                $return['status'] = 'success';
                $return['message'] = 'Home Service successfully edited';
                $return['redirect'] = route('admin-home-service');
            }else{
                $return['status'] = 'error';
                $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
                $return['message'] = 'Something goes to wrong.Please try again';
            }
            return json_encode($return);
                exit();
        }

        $objHomeService = new HomeService();
        $data['details']  = $objHomeService->getDetail($id);

        $data['title'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Edit Home Service List';
        $data['description'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Edit Home Service List';
        $data['keywords'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Edit Home Service List';
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
            'homeservice.js'
        );
        $data['funinit'] = array(
            'HomeService.edit()'
        );
        $data['header'] = array(
            'title' => 'Edit Home Service List',
            'breadcrumb' => array(
                'Dashboard' => route('admin-dashboard'),
                'Home Service List' => route('admin-home-service'),
                'Edit Home Service List' => 'Edit Home Service List',
            )
        );
        return view('backend.pages.admin.homeservice.edit', $data);
    }

    public function ajaxAction(Request $request) {
        $action = $request->input('action');
        $session = session()->all();
        switch ($action) {
            case 'getdatatable':
                $objHomeService = new HomeService();
                $list = $objHomeService->getdatatable();

                echo json_encode($list);
                break;

            case 'deleteHomeService':
                // echo $request->input('data');
                $obj = new HomeService();
                $result = $obj->deleteHomeService($request->input('data'));
                if ($result) {
                    $return['status'] = 'success';
                    $return['message'] = 'Home Service successfully deleted';
                    $return['redirect'] = route('admin-home-service');
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
