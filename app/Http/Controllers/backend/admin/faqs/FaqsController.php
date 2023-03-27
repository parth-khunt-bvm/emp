<?php

namespace App\Http\Controllers\backend\admin\faqs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Config;
use App\Models\Faqs;
class FaqsController extends Controller
{
    function __construct()
    {

    }

    public function list(Request $request){
        $data['title'] = Config::get( 'constants.PROJECT_NAME' ) . ' || FAQS List';
        $data['description'] = Config::get( 'constants.PROJECT_NAME' ) . ' || FAQS List';
        $data['keywords'] = Config::get( 'constants.PROJECT_NAME' ) . ' || FAQS List';
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
            'faqs.js'
        );
        $data['funinit'] = array(
            'Faqs.list()'
        );
        $data['header'] = array(
            'title' => 'FAQS List',
            'breadcrumb' => array(
                'Dashboard' => route('admin-dashboard'),
                'FAQS List' => 'FAQS List',
            )
        );
        return view('backend.pages.admin.faqs.list', $data);
    }

    public function add(Request $request){

        if ($request->isMethod('post')) {

            $objFaqs = new Faqs();
            $result = $objFaqs->addDetail($request);
            if($result){
                $return['status'] = 'success';
                $return['message'] = 'FAQS successfully added';
                $return['redirect'] = route('admin-faqs');
            }else{
                $return['status'] = 'error';
                $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
                $return['message'] = 'Something goes to wrong.Please try again';
            }
            return json_encode($return);
                exit();
        }

        $data['title'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Add FAQS List';
        $data['description'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Add FAQS List';
        $data['keywords'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Add FAQS List';
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
            'faqs.js'
        );
        $data['funinit'] = array(
            'Faqs.add()'
        );
        $data['header'] = array(
            'title' => 'Add FAQS List',
            'breadcrumb' => array(
                'Dashboard' => route('admin-dashboard'),
                'FAQS List' => route('admin-faqs'),
                'Add FAQS List' => 'Add FAQS List',
            )
        );
        return view('backend.pages.admin.faqs.add', $data);
    }

    public function edit(Request $request,$id){

        if ($request->isMethod('post')) {

            $objFaqs = new Faqs();
            $result = $objFaqs->editDetail($request);
            if($result){
                $return['status'] = 'success';
                $return['message'] = 'FAQS successfully edited';
                $return['redirect'] = route('admin-faqs');
            }else{
                $return['status'] = 'error';
                $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
                $return['message'] = 'Something goes to wrong.Please try again';
            }
            return json_encode($return);
                exit();
        }

        $objFaqs = new Faqs();
        $data['details']  = $objFaqs->getDetail($id);

        $data['title'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Edit FAQS List';
        $data['description'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Edit FAQS List';
        $data['keywords'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Edit FAQS List';
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
            'faqs.js'
        );
        $data['funinit'] = array(
            'Faqs.add()'
        );
        $data['header'] = array(
            'title' => 'Edit FAQS List',
            'breadcrumb' => array(
                'Dashboard' => route('admin-dashboard'),
                'FAQS List' => route('admin-faqs'),
                'Edit FAQS List' => 'Edit FAQS List',
            )
        );
        return view('backend.pages.admin.faqs.edit', $data);
    }

    public function ajaxAction(Request $request) {
        $action = $request->input('action');
        $session = session()->all();
        switch ($action) {
            case 'getdatatable':
                $objFaqs = new Faqs();
                $list = $objFaqs->getdatatable();

                echo json_encode($list);
                break;

            case 'deleteFaqs':
                // echo $request->input('data');
                $obj = new Faqs();
                $result = $obj->deleteFaqs($request->input('data'));
                if ($result) {
                    $return['status'] = 'success';
                    $return['message'] = 'FAQS successfully deleted';
                    $return['redirect'] = route('admin-faqs');
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
