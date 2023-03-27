<?php

namespace App\Http\Controllers\backend\admin\contactus;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contactusdetails;
use App\Models\RequestList;
use Config;
class ContactusController extends Controller
{
    //
    function __construct()
    {

    }

    public function details(Request $request){
        $objContactusdetails = new Contactusdetails();
        $data['details'] = $objContactusdetails->getDetails();
        if ($request->isMethod('post')) {

            $objContactusdetails = new Contactusdetails();
            $result = $objContactusdetails->editDetail($request);
            if($result){
                $return['status'] = 'success';
                $return['message'] = 'Details successfully updated';
                $return['redirect'] = route('admin-contactus-details');
            }else{
                $return['status'] = 'error';
                $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
                $return['message'] = 'Something goes to wrong.Please try again';
            }
            return json_encode($return);
                exit();
        }
        $data['title'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Contact-us Details';
        $data['description'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Contact-us Details';
        $data['keywords'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Contact-us Details';
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
            'contactus.js'
        );
        $data['funinit'] = array(
            'Contactus.init()'
        );
        $data['header'] = array(
            'title' => 'Contact-us Details',
            'breadcrumb' => array(
                'Dashboard' => route('admin-dashboard'),
                'Contact-us Details' => 'Contact-us Details',
            )
        );
        return view('backend.pages.admin.contactus.details', $data);
    }

    public function list(Request $request){
        $data['title'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Contact-us Request List';
        $data['description'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Contact-us Request List';
        $data['keywords'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Contact-us Request List';
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
            'contactus.js'
        );
        $data['funinit'] = array(
            'Contactus.list()'
        );
        $data['header'] = array(
            'title' => 'Contact-us Request List',
            'breadcrumb' => array(
                'Dashboard' => route('admin-dashboard'),
                'Contact-us Request List' => 'Contact-us Request List',
            )
        );
        return view('backend.pages.admin.contactus.list', $data);
    }




    public function ajaxAction(Request $request) {
        $action = $request->input('action');
        $session = session()->all();
        switch ($action) {
            case 'getdatatable':
                $objRequestList = new RequestList();
                $list = $objRequestList->getdatatable();

                echo json_encode($list);
                break;

            case 'deleteRequestList':

                $objRequestList = new RequestList();
                $result = $objRequestList->deleteRequestList($request->input('data'));
                if ($result) {
                    $return['status'] = 'success';
                    $return['message'] = 'User request successfully deletd';
                    $return['redirect'] = route('admin-contactus-list');
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
