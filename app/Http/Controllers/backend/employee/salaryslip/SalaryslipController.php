<?php

namespace App\Http\Controllers\backend\employee\salaryslip;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Config;
use App\Models\employee\Department;
use App\Models\employee\Designation;
use App\Models\Employeeno;
use App\Models\Salaryslip;
use App\Models\Sendmail;
use App\Models\employee\Employee;
use PDF;

class SalaryslipController extends Controller
{
    //
    function __construct()
    {

    }

    public function list (Request $request){
        $data['title'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Salary Slip List';
        $data['description'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Salary Slip List';
        $data['keywords'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Salary Slip List';
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
            'salaryslip.js'
        );
        $data['funinit'] = array(
            'Salaryslip.list()'
        );
        $data['header'] = array(
            'title' => 'Salary Slip List',
            'breadcrumb' => array(
                'Dashboard'=> route('employee-dashboard'),
                'Salary Slip List'=> 'Salary Slip List',
            )
        );
        return view('backend.employee.pages.salaryslip.list', $data);
    }

    public function add (Request $request){
        $obj = new Department();
        $data['menu']  = $obj->getAllDetails();

         if ($request->isMethod('post')) {
            $objSalaryslip = new Salaryslip();
            $result  = $objSalaryslip->addSalaryslip($request);
            if ($result == "true") {
                $return['status'] = 'success';
                $return['message'] = 'Salaryslip created succesfully.';
                $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
                $return['redirect'] = route('employee-salaryslip');
            } else {
                if ($result == "wrong") {
                    $return['status'] = 'error';
                    $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
                    $return['message'] = 'Something goes to wrong.Please try agian later';
                } else {
                    if ($result == "exits") {
                        $return['status'] = 'error';
                        $return['message'] = 'Salaryslip is already creted.';
                        $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
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

        $data['title'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Add Salary Slip';
        $data['description'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Add Salary Slip';
        $data['keywords'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Add Salary Slip';
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
            'salaryslip.js'
        );
        $data['funinit'] = array(
            'Salaryslip.add()'
        );
        $data['header'] = array(
            'title' => 'Add Salary Slip',
            'breadcrumb' => array(
                'Dashboard'=> route('employee-dashboard'),
                'Salary Slip' => route('employee-salaryslip'),
                'Add Salary Slip'=> 'Add Salary Slip',
            )
        );
        return view('backend.employee.pages.salaryslip.add', $data);

    }

    public function edit (Request $request,$id){

        $objSalaryslip = new Salaryslip();
        $data['salarySlipDetails'] = $objSalaryslip->getSalaryslipDetails($id);

        $objobjDesignation = new Designation();
        $data['designationList'] = $objobjDesignation->getDesignation($data['salarySlipDetails'][0]->empDepartment);

        $objEmployee = new Employee();
        $data['employeeList'] = $objEmployee->getEmployeeList( $data['salarySlipDetails'][0]->empDepartment , $data['salarySlipDetails'][0]->empDesignation);

        $obj = new Department();
        $data['menu']  = $obj->getAllDetails();

         if ($request->isMethod('post')) {
            $objSalaryslip = new Salaryslip();
            $result  = $objSalaryslip->editSalaryslip($request);
            if ($result == "true") {
                $return['status'] = 'success';
                $return['message'] = 'Salaryslip upadted succesfully.';
                $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
                $return['redirect'] = route('employee-salaryslip');
            } else {
                if ($result == "wrong") {
                    $return['status'] = 'error';
                    $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
                    $return['message'] = 'Something goes to wrong.Please try agian later';
                } else {
                    if ($result == "exits") {
                        $return['status'] = 'error';
                        $return['message'] = 'Salaryslip is already creted.';
                        $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
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

        $data['title'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Add Salary Slip';
        $data['description'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Add Salary Slip';
        $data['keywords'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Add Salary Slip';
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
            'salaryslip.js'
        );
        $data['funinit'] = array(
            'Salaryslip.edit()'
        );
        $data['header'] = array(
            'title' => 'Edit Salary Slip',
            'breadcrumb' => array(
                'Dashboard'=> route('employee-dashboard'),
                'Salary Slip' => route('employee-salaryslip'),
                'Edit Salary Slip'=> 'Edit Salary Slip',
            )
        );
        return view('backend.employee.pages.salaryslip.edit', $data);

    }

    public function download(Request $request,$id){
        $month= ["","January","February","March","April","May","June","July","August","September","October","November","December"];
        $objSalaryslip = new Salaryslip();
        $data['salaryslipDetails']  = $objSalaryslip->getSalaryslipDetails($id);
        $salarySlipDetails = $data['salaryslipDetails'][0] ;

        $pdf = PDF::loadView('backend.employee.pages.salaryslip.download', $data);
        return $pdf->download($salarySlipDetails->firstname.' '.$salarySlipDetails->lastname.' - '. $month[$salarySlipDetails->month] . ' , ' .$salarySlipDetails->year.'.pdf');
    }


    public function view($id){
        $objSalaryslip = new Salaryslip();

        $data['salaryslipDetails']  = $objSalaryslip->getSalaryslipDetails($id);


        $data['title'] = Config::get( 'constants.PROJECT_NAME' ) . ' || View Salary Slip';
        $data['description'] = Config::get( 'constants.PROJECT_NAME' ) . ' || View Salary Slip';
        $data['keywords'] = Config::get( 'constants.PROJECT_NAME' ) . ' || View Salary Slip';
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
            'salaryslip.js'
        );
        $data['funinit'] = array(
            'Salaryslip.add()'
        );
        $data['header'] = array(
            'title' => 'View Salary Slip',
            'breadcrumb' => array(
                'Dashboard'=> route('employee-dashboard'),
                'Salary Slip' => route('employee-salaryslip'),
                'View Salary Slip'=> 'View Salary Slip',
            )
        );
        return view('backend.employee.pages.salaryslip.view', $data);
    }
    public function ajaxAction(Request $request) {
        $action = $request->input('action');
        $session = session()->all();
        switch ($action) {
            case 'getdatatable':
                $objSalaryslip = new Salaryslip();
                $list = $objSalaryslip->getdatatable();
                echo json_encode($list);
                break;



            case 'deleteSalarySlip':
                $objSalaryslip = new Salaryslip();
                $result = $objSalaryslip->deleteSalarySlip($request->input('data'));
                if ($result) {
                    $return['status'] = 'success';
                    $return['message'] = 'Salaryslip successfully deleted';
                    $return['redirect'] = route('employee-salaryslip');
                } else {
                        $return['status'] = 'error';
                        $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
                        $return['message'] = 'Something goes to wrong.';
                }
                echo json_encode($return);
                exit;

            case 'sendMail' :

                $objSendmail = new Sendmail();
                $result = $objSendmail->send_salary_slip_via_mail($request->input('data'));

                if ($result) {
                    $return['status'] = 'success';
                    $return['message'] = 'Salaryslip successfully send via gmail to employee.';
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
