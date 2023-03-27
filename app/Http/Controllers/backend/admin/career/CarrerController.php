<?php

namespace App\Http\Controllers\backend\admin\career;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Carrer;

use App\Models\Skills;
use App\Models\CareerDetail;


use Config;
class CarrerController extends Controller
{
    function __construct(){

    }

    public function list (Request $request){
        $data['title'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Carrer';
        $data['description'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Carrer';
        $data['keywords'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Carrer';
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
            'carrer.js'
        );
        $data['funinit'] = array(
            'Carrer.list()'
        );
        $data['header'] = array(
            'title' => 'Carrer',
            'breadcrumb' => array(
                'Dashboard'=> route('admin-dashboard'),
                'Carrer'=> 'Carrer',
            )
        );
        return view('backend.pages.admin.carrer.list', $data);

    }
    public function add (Request $request){
        // $objDetails = new Department();
        // $data['menu'] = $objDetails->getAllDetails();
         if ($request->isMethod('post')) {
            $obj = new Carrer();
            $result  = $obj->addCarrer($request);
            if ($result == "true") {
                $return['status'] = 'success';
                $return['message'] = 'Carrer add succesfully !!';
                $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
                $return['redirect'] = route('admin-carrer');
            } else {
                if ($result == "wrong") {
                    $return['status'] = 'error';
                    $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
                    $return['message'] = 'Something goes to wrong.Please try agian later';
                } else {
                    if ($result == "exits") {
                        $return['status'] = 'error';
                        $return['message'] = 'The Carrer is already there.';
                        $return['redirect'] = route('admin-carrer');
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

        $data['title'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Add Carrer';
        $data['description'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Add Carrer';
        $data['keywords'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Add Carrer';
        $data['css'] = array(
            'toastr/toastr.min.css'
        );
        $data['plugincss'] = array(

        );

        $data['pluginjs'] = array(
            'toastr/toastr.min.js',
            'plugins/validate/jquery.validate.min.js',
            'pages/crud/file-upload/image-inputd1cf.js',
            'plugins/custom/ckeditor/ckeditor-classic.bundled1cf.js',
            'pages/crud/forms/editors/ckeditor-classicd1cf.js'
        );

        $data['js'] = array(
            'comman_function.js',
            'ajaxfileupload.js',
            'jquery.form.min.js',
            'carrer.js'
        );
        $data['funinit'] = array(
            'Carrer.add()'
        );
        $data['header'] = array(
            'title' => 'Add Carrer',
            'breadcrumb' => array(
                'Dashboard'=> route('admin-dashboard'),
                'Carrer' => route('admin-carrer'),
                'Add Carrer'=> 'Add Carrer',
            )
        );
        return view('backend.pages.admin.carrer.add', $data);

    }
    public function edit(Request $request,$id){
        // $objDetails = new Department();
        // $data['menu'] = $objDetails->getAllDetails();
        $obj = new Carrer();
        $result['details'] = $obj->getDetail($id);
        // echo '<pre>';
        // print_r( $result['details']);
        // die;
        if ($request->isMethod('post')) {
           $obj = new Carrer();
           $result = $obj->editDetail($request);
           if ($result == "true") {
                $return['status'] = 'success';
                $return['message'] = 'Carrer successfully edited!';
                $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
                $return['redirect'] = route('admin-carrer');
            } else {
                if ($result == "wrong") {
                    $return['status'] = 'error';
                    $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
                    $return['message'] = 'Something goes to wrong.Please try agian later';
                } else {
                    if ($result == "exits") {
                        $return['status'] = 'error';
                        $return['message'] = 'The Carrer is already there.';
                        $return['redirect'] = route('admin-carrer');
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

        $obj = new Carrer();
        $data['details']  = $obj->getDetail($id);

        $data['title'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Edit Carrer';
        $data['description'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Edit Carrer';
        $data['keywords'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Edit Carrer';
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
            'carrer.js'
        );
        $data['funinit'] = array(
            'Carrer.edit()'
        );
        $data['header'] = array(
            'title' => 'Edit Carrer',
            'breadcrumb' => array(
                'Dashboard' => route('admin-dashboard'),
                'Carrer' => route('admin-carrer'),
                'Edit Carrer' => 'Edit Carrer',
            )
        );
        return view('backend.pages.admin.carrer.edit', $data);
    }
    public function ajaxAction(Request $request) {
        $action = $request->input('action');
        $session = session()->all();
        switch ($action) {
            case 'getdatatable':
                $obj = new Carrer();
                $list = $obj->getdatatable();

                echo json_encode($list);
                break;

            case 'getdatatablelist':
                    $obj = new CareerDetail();
                    $list = $obj->getdatatable();
                    echo json_encode($list);
                    break;
            case 'deleteCareerDetail':
                    $obj = new CareerDetail();
                    $result = $obj->deleteList($request->input('data'));
                    if ($result) {
                        $return['status'] = 'success';
                        $return['message'] = 'Carrer successfully deleted';
                        $return['redirect'] = route('admin-carrer-list');
                    } else {
                        $return['status'] = 'error';
                        $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
                        $return['message'] = 'Something goes to wrong.';
                    }
                    echo json_encode($return);
                    exit;
            case 'deleteCarrer':
                $obj = new Carrer();
                $result = $obj->deleteCarrer($request->input('data'));
                if ($result) {
                    $return['status'] = 'success';
                    $return['message'] = 'Carrer successfully deleted';
                    $return['redirect'] = route('admin-carrer');
                } else {
                        $return['status'] = 'error';
                        $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
                        $return['message'] = 'Something goes to wrong.';
                }
                echo json_encode($return);
                exit;
                case 'deleteSkills':
                    $obj = new Skills();
                    $result = $obj->deleteSkills($request->input('data'));
                    if ($result) {
                        $return['status'] = 'success';
                        $return['message'] = 'Skills successfully deleted';
                        $return['redirect'] = route('admin-carrer') ;
                    } else {
                            $return['status'] = 'error';
                            $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
                            $return['message'] = 'Something goes to wrong.';
                    }
                    echo json_encode($return);
                    exit;
        }
    }

    public function careerList(Request $request){
        $data['title'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Career Request List';
        $data['description'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Career Request List';
        $data['keywords'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Career Request List';
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
            'carrer.js'
        );
        $data['funinit'] = array(
            'Carrer.careerList()'
        );
        $data['header'] = array(
            'title' => 'Career Request List',
            'breadcrumb' => array(
                'Dashboard' => route('admin-dashboard'),
                'Career Request List' => 'Career Request List',
            )
        );
        return view('backend.pages.admin.carrer.carrerlist', $data);
    }
}
