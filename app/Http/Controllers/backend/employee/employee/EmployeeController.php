<?php

namespace App\Http\Controllers\backend\employee\employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\employee\Department;
use App\Models\employee\Designation;
use App\Models\employee\Employee;
use App\Models\State;
use App\Models\Country;
use App\Models\City;
use App\Models\Employeeno;
use Config;
class EmployeeController extends Controller
{
    function __construct(){

    }

    public function list (Request $request){
        $data['title'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Employee';
        $data['description'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Employee';
        $data['keywords'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Employee';
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
            'employeeList.js'
        );
        $data['funinit'] = array(
            'EmployeeList.list()'
        );
        $data['header'] = array(
            'title' => 'Employee',
            'breadcrumb' => array(
                'Dashboard'=> route('employee-dashboard'),
                'Employee'=> 'Employee',
            )
        );
        return view('backend.employee.pages.employee.list', $data);

    }

    public function add (Request $request){

        $objDepartment = new Department();
        $data['departmentList']  = $objDepartment->getAllDetails();

        $objCountry = new Country();
        $data['country'] = $objCountry->countyList();

        $objEmployeeNo = new Employeeno();
        $data['empno'] = $objEmployeeNo->getEmpNo();

        if ($request->isMethod('post')) {
            $obj = new Employee();
            $result  = $obj->addEmployee($request);

            if ($result == "true") {
                $return['status'] = 'success';
                $return['message'] = 'Employee add succesfully !!';
                $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
                $return['redirect'] = route('employee');
            } else {
                if ($result == "wrong") {
                    $return['status'] = 'error';
                    $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
                    $return['message'] = 'Something goes to wrong.Please try agian later';
                } else {
                    if ($result == "exits") {
                        $return['status'] = 'error';
                        $return['message'] = 'Employe email already exits.';
                        $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
                        // $return['redirect'] = route('employee');
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

        $data['title'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Edit employee details';
        $data['description'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Edit employee details';
        $data['keywords'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Edit employee details';
        $data['css'] = array(
            'toastr/toastr.min.css'
        );
        $data['plugincss'] = array(
            'css/pages/wizard/wizard-3d1cf.css'
        );

        $data['pluginjs'] = array(
            'toastr/toastr.min.js',
            'plugins/validate/jquery.validate.min.js',
            'pages/custom/wizard/wizard-3d1cf.js'
        );

        $data['js'] = array(
            'comman_function.js',
            'ajaxfileupload.js',
            'jquery.form.min.js',
            'employeeList.js'
        );
        $data['funinit'] = array(
            'EmployeeList.add()'
        );
        $data['header'] = array(
            'title' => 'Edit employee details',
            'breadcrumb' => array(
                'Dashboard'=> route('employee-dashboard'),
                'Employee' => route('employee'),
                'Edit employee details'=> 'Edit employee details',
            )
        );
        return view('backend.employee.pages.employee.add', $data);

    }

    public function edit(Request $request,$id){
        $objDepartment = new Department();
        $data['departmentList']  = $objDepartment->getAllDetails();

        $objCountry = new Country();
        $data['country'] = $objCountry->countyList();

        $objEmployee = new Employee();
        $data['employeeDetails'] = $objEmployee->getDetail($id);

        $objobjDesignation = new Designation();
        $data['designationList'] = $objobjDesignation->getDesignation($data['employeeDetails'][0]->department);


        $objState = new State();
        $data['statelist'] = $objState->stateList($data['employeeDetails'][0]->country);

        $objCity = new City();
        $data['citylist'] = $objCity->cityList($data['employeeDetails'][0]->state);


        if ($request->isMethod('post')) {
            $obj = new Employee();
            $result = $obj->editDetail($request);
            if ($result == "true") {
                $return['status'] = 'success';
                $return['message'] = 'Employee details succesfully updated.!!';
                $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
                $return['redirect'] = route('employee');
            } else {
                if ($result == "wrong") {
                    $return['status'] = 'error';
                    $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
                    $return['message'] = 'Something goes to wrong.Please try agian later';
                } else {
                    if ($result == "exits") {
                        $return['status'] = 'error';
                        $return['message'] = 'Employe email already exits.';
                        $return['redirect'] = route('employee');
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

        $obj = new Employee();
        $data['details']  = $obj->getDetail($id);

        $data['title'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Add Employee';
        $data['description'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Add Employee';
        $data['keywords'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Add Employee';
        $data['css'] = array(
            'toastr/toastr.min.css'
        );
        $data['plugincss'] = array(
            'css/pages/wizard/wizard-3d1cf.css'
        );

        $data['pluginjs'] = array(
            'toastr/toastr.min.js',
            'plugins/validate/jquery.validate.min.js',
            'pages/custom/wizard/wizard-3d1cfedit.js'
        );

        $data['js'] = array(
            'comman_function.js',
            'ajaxfileupload.js',
            'jquery.form.min.js',
            'employeeList.js'
        );
        $data['funinit'] = array(
            'EmployeeList.add()'
        );
        $data['header'] = array(
            'title' => 'Add Employee',
            'breadcrumb' => array(
                'Dashboard'=> route('employee-dashboard'),
                'Employee' => route('employee'),
                'Add Employee'=> 'Add Employee',
            )
        );
        return view('backend.employee.pages.employee.edit', $data);
    }

    public function view(Request $request,$id){

        $objEmployee = new Employee();
        $data['employeeDetails'] = $objEmployee->viewDetail($id);

        $data['title'] = Config::get( 'constants.PROJECT_NAME' ) . ' || View employee details';
        $data['description'] = Config::get( 'constants.PROJECT_NAME' ) . ' || View employee details';
        $data['keywords'] = Config::get( 'constants.PROJECT_NAME' ) . ' || View employee details';
        $data['css'] = array(
        );
        $data['plugincss'] = array(
        );

        $data['pluginjs'] = array(
        );

        $data['js'] = array(
        );
        $data['funinit'] = array(
        );
        $data['header'] = array(
            'title' => 'View employee details',
            'breadcrumb' => array(
                'Dashboard'=> route('employee-dashboard'),
                'Employee' => route('employee'),
                'View employee details'=> 'View employee details',
            )
        );
        return view('backend.employee.pages.employee.view', $data);
    }
    public function ajaxAction(Request $request) {
        $action = $request->input('action');
        $session = session()->all();
        switch ($action) {
            case 'getdatatable':
                $obj = new Employee();
                $list = $obj->getdatatable();

                echo json_encode($list);
                break;

            case 'changeCountry':

                $objState = new State();
                $list = $objState->stateList(($request->input('data'))['id']);

                echo json_encode($list);
                break;

            case 'changeState':

                $objCity = new City();
                $list = $objCity->cityList(($request->input('data'))['id']);

                echo json_encode($list);
                break;

            case 'changeDepartment':

                $objobjDesignation = new Designation();
                $list = $objobjDesignation->getDesignation(($request->input('data'))['id']);

                echo json_encode($list);
                break;

            case 'changeDesignation':

                $objEmployee = new Employee();
                $list = $objEmployee->getEmployee(($request->input('data')));

                echo json_encode($list);
                break;

            case 'changeEmployee':

                $objEmployee = new Employee();
                $list = $objEmployee->getEmployeeBasicSalary(($request->input('data')));

                echo json_encode($list);
                break;

            case 'deleteEmployee':
                $obj = new Employee();
                $result = $obj->deleteEmployee($request->input('data'));
                if ($result) {
                    $return['status'] = 'success';
                    $return['message'] = 'Employee successfully deleted';
                    $return['redirect'] = route('employee');
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
