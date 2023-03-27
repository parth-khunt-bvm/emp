<?php

namespace App\Http\Controllers\backend\admin\department;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;

use Config;
class DepartmentController extends Controller
{
    function __construct(){

    }
    public function details(Request $request){

        if ($request->isMethod('post')) {

            $obj = new Department();
            $result = $obj->editDetail($request);

            if ($result == "true") {
                $return['status'] = 'success';
                $return['message'] = 'Department successfully edited!';
                $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
                $return['redirect'] = route('admin-department');
            } else {
                    $return['status'] = 'error';
                    $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
                    $return['message'] = 'Something goes to wrong.Please try agian later';
            }
            return json_encode($return);
                exit();
        }

        $obj = new Department();
        $data['details']  = $obj->getDetail();

        $data['title'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Department';
        $data['description'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Department';
        $data['keywords'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Department';
        $data['css'] = array(
            'toastr/toastr.min.css'
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
            'department.js'
        );
        $data['funinit'] = array(
            'Department.add()'
        );
        $data['header'] = array(
            'title' => 'Department',
            'breadcrumb' => array(
                'Dashboard' => route('admin-dashboard'),
                'Department' => 'Department',
            )
        );
        return view('backend.pages.admin.department.list', $data);
    }


}
