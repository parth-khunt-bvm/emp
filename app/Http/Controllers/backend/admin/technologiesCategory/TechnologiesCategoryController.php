<?php

namespace App\Http\Controllers\backend\admin\technologiesCategory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Technologiescategory;
use App\Models\Technology;
use Config;

class TechnologiesCategoryController extends Controller
{
    function __construct()
    {

    }

    public function list(Request $request){
        $data['title'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Technology Category List';
        $data['description'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Technology Category List';
        $data['keywords'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Technology Category List';
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
            'technologiescategory.js'
        );
        $data['funinit'] = array(
            'Technologiescategory.list()'
        );
        $data['header'] = array(
            'title' => 'Technology Category List',
            'breadcrumb' => array(
                'Dashboard' => route('admin-dashboard'),
                'Technology Category  List' => 'Technology Category List',
            )
        );
        return view('backend.pages.admin.technologiescategory.list', $data);
    }

    public function add(Request $request){
        if ($request->isMethod('post')) {
            $objTechnologiescategory = new Technologiescategory();
            $result = $objTechnologiescategory->addCategory($request);
            if($result){
                $return['status'] = 'success';
                $return['message'] = 'Technology Category successfully added';
                $return['redirect'] = route('admin-technologies-category');
            }else{
                $return['status'] = 'error';
                $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
                $return['message'] = 'Something goes to wrong.Please try again';
            }
            return json_encode($return);
                exit();
        }

        $data['title'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Add Technology Category';
        $data['description'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Add Technology Category';
        $data['keywords'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Add Technology Category';
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
            'technologiescategory.js'
        );
        $data['funinit'] = array(
            'Technologiescategory.add()'
        );
        $data['header'] = array(
            'title' => 'Add Technology Category',
            'breadcrumb' => array(
                'Dashboard' => route('admin-dashboard'),
                'Technology Category List' => route('admin-technologies-category-add'),
                'Add Technology Category' => 'Add Technology Category',
            )
        );
        return view('backend.pages.admin.technologiescategory.add', $data);
    }
    public function edit(Request $request,$id){
        if ($request->isMethod('post')) {
            $objTechnologiescategory = new Technologiescategory();
            $result = $objTechnologiescategory->editCategory($request);
            if($result){
                $return['status'] = 'success';
                $return['message'] = 'Technology Category successfully updated';
                $return['redirect'] = route('admin-technologies-category');
            }else{
                $return['status'] = 'error';
                $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
                $return['message'] = 'Something goes to wrong.Please try again';
            }
            return json_encode($return);
                exit();
        }

        $objTechnologiescategory = new Technologiescategory();
        $data['details']  = $objTechnologiescategory->getDetail($id);
        // print_r($data);
        // die();
        $data['title'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Edit Technology Category';
        $data['description'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Edit Technology Category';
        $data['keywords'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Edit Technology Category';
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
            'technologiescategory.js'
        );
        $data['funinit'] = array(
            'Technologiescategory.edit()'
        );
        $data['header'] = array(
            'title' => 'Edit Technology Category',
            'breadcrumb' => array(
                'Dashboard' => route('admin-dashboard'),
                'Technology Category List' => route('admin-technologies-category-add'),
                'Edit Technology Category' => 'Edit Technology Category',
            )
        );
        return view('backend.pages.admin.technologiescategory.edit', $data);

    }
    public function ajaxAction(Request $request){
        $action = $request->input('action');
        $session = session()->all();
        switch ($action) {
            case 'getdatatable':
                $objTechnologiescategory = new Technologiescategory();
                $list = $objTechnologiescategory->getdatatable();

                echo json_encode($list);
                break;

            case 'deleteTechnologies':

                $objTechnologiescategory = new Technologiescategory();
                $result = $objTechnologiescategory->deleteTechnologies($request->input('data'));
                if ($result) {
                    $return['status'] = 'success';
                    $return['message'] = 'Technology successfully deleted';
                    $return['redirect'] = route('admin-technologies-category');
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
