<?php

namespace App\Http\Controllers\backend\employee\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Config;
use App\Models\employee\Department;
use App\Models\employee\Designation;
use App\Models\employee\Employee;

class DashboardController extends Controller
{
    function __construct(){

    }

    public function dashboard (Request $request){
        $objEmployee = new Employee();
        $data['noOfEmployee'] = $objEmployee->noofemployee();

        $objDepartment = new Department();
        $data['noOfDepartment'] = $objDepartment->noofdepartment();

        $objDesignation = new Designation();
        $data['noofDesignation'] = $objDesignation->noofdesignation();

        $data['title'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Employee Dashboard';
        $data['description'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Employee Dashboard';
        $data['keywords'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Employee Dashboard';

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
            'employeedashboard.js'
        );
        $data['funinit'] = array(
            'Dashboard.init()'
        );
        $data['header'] = array(
            'title' => 'Employee dashboard',
            'breadcrumb' => array()
        );
        return view('backend.employee.pages.dashboard.dashboard', $data);

    }

    public function ajaxaction(Request $request){
        $action = $request->input('action');
        $session = session()->all();
        switch ($action) {
            case 'getdatatable':
                $objDepartment = new Department();
                $list = $objDepartment->getdatatableWithEmployee();

                echo json_encode($list);
                break;
            }
    }
}
