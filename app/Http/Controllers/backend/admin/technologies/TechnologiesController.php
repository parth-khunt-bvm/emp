<?php

namespace App\Http\Controllers\backend\admin\technologies;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Technologiescategory;
use App\Models\Technology;
use Config;
class TechnologiesController extends Controller
{
    //
    function __construct()
    {

    }

    public function list(Request $request){

        $data['title'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Technology List';
        $data['description'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Technology List';
        $data['keywords'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Technology List';
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
            'technology.js'
        );
        $data['funinit'] = array(
            'Technology.list()'
        );
        $data['header'] = array(
            'title' => 'Technology List',
            'breadcrumb' => array(
                'Dashboard' => route('admin-dashboard'),
                'Technology  List' => 'Technology List',
            )
        );
        return view('backend.pages.admin.technologies.list', $data);
    }


    public function add(Request $request){

        if ($request->isMethod('post')) {
            $objTechnology = new Technology();
            $result = $objTechnology->addCategory($request);
            if($result){
                $return['status'] = 'success';
                $return['message'] = 'Technology successfully added';
                $return['redirect'] = route('admin-technologies');
            }else{
                $return['status'] = 'error';
                $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
                $return['message'] = 'Something goes to wrong.Please try again';
            }
            return json_encode($return);
                exit();
        }

        $objTechnologiescategory = new Technologiescategory();
        $data['categroy'] = $objTechnologiescategory->getCategroy();

        $data['title'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Add Technology';
        $data['description'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Add Technology';
        $data['keywords'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Add Technology';
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
            'technology.js'
        );
        $data['funinit'] = array(
            'Technology.add()'
        );
        $data['header'] = array(
            'title' => 'Add Technology',
            'breadcrumb' => array(
                'Dashboard' => route('admin-dashboard'),
                'Technology List' => route('admin-technologies-add'),
                'Add Technology' => 'Add Technology',
            )
        );
        return view('backend.pages.admin.technologies.add', $data);
    }


    public function edit(Request $request,$id){
        if ($request->isMethod('post')) {
            $objTechnology = new Technology();
            $result = $objTechnology->editCategory($request);
            if($result){
                $return['status'] = 'success';
                $return['message'] = 'Technology successfully updated';
                $return['redirect'] = route('admin-technologies');
            }else{
                $return['status'] = 'error';
                $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
                $return['message'] = 'Something goes to wrong.Please try again';
            }
            return json_encode($return);
                exit();
        }

        $objTechnologiescategory = new Technologiescategory();
        $data['categroy'] = $objTechnologiescategory->getCategroy();

        $objTechnology = new Technology();
        $data['details']  = $objTechnology->getDetail($id);

        // print_r($data['details']);
        // die();
        $data['title'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Edit Technology';
        $data['description'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Edit Technology';
        $data['keywords'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Edit Technology';
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
            'technology.js'
        );
        $data['funinit'] = array(
            'Technology.edit()'
        );
        $data['header'] = array(
            'title' => 'Edit Technology',
            'breadcrumb' => array(
                'Dashboard' => route('admin-dashboard'),
                'Technology List' => route('admin-technologies-add'),
                'Edit Technology' => 'Edit Technology',
            )
        );
        return view('backend.pages.admin.technologies.edit', $data);

    }

    public function ajaxAction(Request $request){
        $action = $request->input('action');
        $session = session()->all();
        switch ($action) {
            case 'getdatatable':
                $objTechnology = new Technology();
                $list = $objTechnology->getdatatable();

                echo json_encode($list);
                break;

            case 'deleteTechnologies':

                $objTechnology = new Technology();
                $result = $objTechnology->deleteTechnologies($request->input('data'));
                if ($result) {
                    $return['status'] = 'success';
                    $return['message'] = 'Technology successfully deleted';
                    $return['redirect'] = route('admin-technologies');
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
