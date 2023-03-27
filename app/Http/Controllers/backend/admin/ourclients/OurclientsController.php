<?php

namespace App\Http\Controllers\backend\admin\ourclients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Config;
use App\Models\Ourclients;
class OurclientsController extends Controller
{

    function __construct()
    {

    }

    public function list(Request $request){
        $data['title'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Our Client List';
        $data['description'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Our Client List';
        $data['keywords'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Our Client List';
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
            'ourclients.js'
        );
        $data['funinit'] = array(
            'Ourclients.list()'
        );
        $data['header'] = array(
            'title' => 'Our Client List',
            'breadcrumb' => array(
                'Dashboard' => route('admin-dashboard'),
                'Our Client List' => 'Our Client List',
            )
        );
        return view('backend.pages.admin.ourclients.list', $data);
    }


    public function add(Request $request){

        if ($request->isMethod('post')) {

            $objOurclientsdetails = new Ourclients();
            $result = $objOurclientsdetails->addDetail($request);
            if($result){
                $return['status'] = 'success';
                $return['message'] = 'image successfully added';
                $return['redirect'] = route('admin-our-clients');
            }else{
                $return['status'] = 'error';
                $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
                $return['message'] = 'Something goes to wrong.Please try again';
            }
            return json_encode($return);
                exit();
        }

        $data['title'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Add Our Client List';
        $data['description'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Add Our Client List';
        $data['keywords'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Add Our Client List';
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
            'ourclients.js'
        );
        $data['funinit'] = array(
            'Ourclients.init()'
        );
        $data['header'] = array(
            'title' => 'Add Our Client List',
            'breadcrumb' => array(
                'Dashboard' => route('admin-dashboard'),
                'Our Client List' => route('admin-our-clients'),
                'Add Our Client List' => 'Add Our Client List',
            )
        );
        return view('backend.pages.admin.ourclients.add', $data);
    }
    public function edit(Request $request,$id){

        $obj = new Ourclients();
        $data['details'] = $obj->getDetails($id);

        if ($request->isMethod('post')) {

            $objOurclientsdetails = new Ourclients();
            $result = $objOurclientsdetails->editDetail($request,$id);
            if($result){
                $return['status'] = 'success';
                $return['message'] = 'image successfully Updated';
                $return['redirect'] = route('admin-our-clients');
            }else{
                $return['status'] = 'error';
                $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
                $return['message'] = 'Something goes to wrong.Please try again';
            }
            return json_encode($return);
                exit();
        }

        $data['title'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Edit Our Client List';
        $data['description'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Edit Our Client List';
        $data['keywords'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Edit Our Client List';
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
            'ourclients.js'
        );
        $data['funinit'] = array(
            'Ourclients.init()'
        );
        $data['header'] = array(
            'title' => 'Add Our Client List',
            'breadcrumb' => array(
                'Dashboard' => route('admin-dashboard'),
                'Our Client List' => route('admin-our-clients'),
                'Edit Our Client List' => 'Edit Our Client List',
            )
        );
        return view('backend.pages.admin.ourclients.edit', $data);
    }

    public function ajaxAction(Request $request) {
        $action = $request->input('action');
        $session = session()->all();
        switch ($action) {
            case 'getdatatable':
                $objOurclients = new Ourclients();
                $list = $objOurclients->getdatatable();

                echo json_encode($list);
                break;

            case 'deleteClients':

                $obj = new Ourclients();
                $result = $obj->deleteOurclients($request->input('data'));
                if ($result) {
                    $return['status'] = 'success';
                    $return['message'] = 'Image successfully deleted';
                    $return['redirect'] = route('admin-our-clients');
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
