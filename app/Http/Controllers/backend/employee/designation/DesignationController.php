<?php

namespace App\Http\Controllers\backend\employee\designation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\employee\Department;
use App\Models\employee\Designation;
use Config;
class DesignationController extends Controller
{
    function __construct(){

    }

    public function list (Request $request){
        $data['title'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Designation';
        $data['description'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Designation';
        $data['keywords'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Designation';
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
            'designation.js'
        );
        $data['funinit'] = array(
            'Designation.list()'
        );
        $data['header'] = array(
            'title' => 'Designation',
            'breadcrumb' => array(
                'Dashboard'=> route('employee-dashboard'),
                'Designation'=> 'Designation',
            )
        );
        return view('backend.employee.pages.designation.list', $data);

    }

    public function add (Request $request){
        $obj = new Department();
        $data['menu']  = $obj->getAllDetails();
         if ($request->isMethod('post')) {
            $obj = new Designation();
            $result  = $obj->addDesignation($request);
            if ($result == "true") {
                $return['status'] = 'success';
                $return['message'] = 'Designation add succesfully !!';
                $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
                $return['redirect'] = route('employee-designation');
            } else {
                if ($result == "wrong") {
                    $return['status'] = 'error';
                    $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
                    $return['message'] = 'Something goes to wrong.Please try agian later';
                } else {
                    if ($result == "exits") {
                        $return['status'] = 'error';
                        $return['message'] = 'The Designation is already there.';
                        $return['redirect'] = route('employee-designation');
                    } else {
                        $return['status'] = 'error';
                        $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
                        $return['message'] = 'Something goes to wrong.Please try agian later';

                    }
                }
            }
            echo json_encode($return);
            exit;
        }

        $data['title'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Add Designation';
        $data['description'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Add Designation';
        $data['keywords'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Add Designation';
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
            'designation.js'
        );
        $data['funinit'] = array(
            'Designation.add()'
        );
        $data['header'] = array(
            'title' => 'Add Designation',
            'breadcrumb' => array(
                'Dashboard'=> route('employee-dashboard'),
                'Designation' => route('employee-designation'),
                'Add Designation'=> 'Add Designation',
            )
        );
        return view('backend.employee.pages.designation.add', $data);

    }
    public function edit(Request $request,$id){
        $obj = new Department();
        $data['menu']  = $obj->getAllDetails();
        if ($request->isMethod('post')) {

            $obj = new Designation();
            $result = $obj->editDetail($request);

            if ($result == "true") {
                $return['status'] = 'success';
                $return['message'] = 'Designation successfully edited!';
                $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
                $return['redirect'] = route('employee-designation');
            } else {
                if ($result == "wrong") {
                    $return['status'] = 'error';
                    $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
                    $return['message'] = 'Something goes to wrong.Please try agian later';
                } else {
                    if ($result == "exits") {
                        $return['status'] = 'error';
                        $return['message'] = 'The Designation is already there.';
                        $return['redirect'] = route('employee-designation');
                    } else {
                        $return['status'] = 'error';
                        $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
                        $return['message'] = 'Something goes to wrong.Please try agian later';

                    }
                }
            }
            return json_encode($return);
                exit();
        }

        $obj = new Designation();
        $data['details']  = $obj->getDetail($id);

        $data['title'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Edit Designation';
        $data['description'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Edit Designation';
        $data['keywords'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Edit Designation';
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
            'designation.js'
        );
        $data['funinit'] = array(
            'Designation.edit()'
        );
        $data['header'] = array(
            'title' => 'Edit Designation',
            'breadcrumb' => array(
                'Dashboard' => route('employee-dashboard'),
                'Designation' => route('employee-designation'),
                'Edit Designation' => 'Edit Designation',
            )
        );
        return view('backend.employee.pages.designation.edit', $data);
    }
    public function ajaxAction(Request $request) {
        $action = $request->input('action');
        $session = session()->all();
        switch ($action) {
            case 'getdatatable':
                $obj = new Designation();
                $list = $obj->getdatatable();

                echo json_encode($list);
                break;

            case 'deleteDesignation':
                $obj = new Designation();
                $result = $obj->deleteDesignation($request->input('data'));
                if ($result) {
                    $return['status'] = 'success';
                    $return['message'] = 'Designation successfully deleted';
                    $return['redirect'] = route('employee-designation');
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
