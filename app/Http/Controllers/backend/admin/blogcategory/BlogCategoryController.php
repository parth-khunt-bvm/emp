<?php

namespace App\Http\Controllers\backend\admin\blogcategory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogCategory;
use Config;
class BlogCategoryController extends Controller
{
    function __construct(){

    }

    public function list (Request $request){
        $data['title'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Blog Category';
        $data['description'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Blog Category';
        $data['keywords'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Blog Category';
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
            'blogCategory.js'
        );
        $data['funinit'] = array(
            'BlogCategory.list()'
        );
        $data['header'] = array(
            'title' => 'Blog Category',
            'breadcrumb' => array(
                'Dashboard'=> route('admin-dashboard'),
                'Blog Category'=> 'Blog Category',
            )
        );
        return view('backend.pages.admin.blogcategory.list', $data);

    }
    public function add (Request $request){
         if ($request->isMethod('post')) {
            $obj = new BlogCategory();
            $result  = $obj->addSubmenu($request->post('name'));
            if ($result == "true") {
                $return['status'] = 'success';
                $return['message'] = 'Blog Category add succesfully !!';
                $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
                $return['redirect'] = route('admin-blog-category');
            } else {
                if ($result == "wrong") {
                    $return['status'] = 'error';
                    $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
                    $return['message'] = 'Something goes to wrong.Please try agian later';
                } else {
                    if ($result == "exits") {
                        $return['status'] = 'error';
                        $return['message'] = 'The Blog Category is already there.';
                        $return['redirect'] = route('admin-blog-category');
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

        $data['title'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Add Blog Category';
        $data['description'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Add Blog Category';
        $data['keywords'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Add Blog Category';
        $data['css'] = array(
            'toastr/toastr.min.css'
        );
        $data['plugincss'] = array(

        );

        $data['pluginjs'] = array(
            'toastr/toastr.min.js',
            'plugins/validate/jquery.validate.min.js',
            'pages/crud/file-upload/image-inputd1cf.js'
        );

        $data['js'] = array(
            'comman_function.js',
            'ajaxfileupload.js',
            'jquery.form.min.js',
            'blogCategory.js'
        );
        $data['funinit'] = array(
            'BlogCategory.add()'
        );
        $data['header'] = array(
            'title' => 'Add Blog Category',
            'breadcrumb' => array(
                'Dashboard'=> route('admin-dashboard'),
                'Blog Category' => route('admin-blog-category'),
                'Add Blog Category'=> 'Add Blog Category',
            )
        );
        return view('backend.pages.admin.blogcategory.add', $data);

    }
    public function edit(Request $request,$id){

        if ($request->isMethod('post')) {

            $obj = new BlogCategory();
            $result = $obj->editDetail($request);

            if ($result == "true") {
                $return['status'] = 'success';
                $return['message'] = 'Blog Category successfully edited!';
                $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
                $return['redirect'] = route('admin-blog-category');
            } else {
                if ($result == "wrong") {
                    $return['status'] = 'error';
                    $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
                    $return['message'] = 'Something goes to wrong.Please try agian later';
                } else {
                    if ($result == "exits") {
                        $return['status'] = 'error';
                        $return['message'] = 'The Blog Category is already there.';
                        $return['redirect'] = route('admin-blog-category');
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

        $obj = new BlogCategory();
        $data['details']  = $obj->getDetail($id);

        $data['title'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Edit Blog Category';
        $data['description'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Edit Blog Category';
        $data['keywords'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Edit Blog Category';
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
            'blogCategory.js'
        );
        $data['funinit'] = array(
            'BlogCategory.add()'
        );
        $data['header'] = array(
            'title' => 'Edit Blog Category',
            'breadcrumb' => array(
                'Dashboard' => route('admin-dashboard'),
                'Blog Category' => route('admin-blog-category'),
                'Edit Blog Category' => 'Edit Blog Category',
            )
        );
        return view('backend.pages.admin.blogcategory.edit', $data);
    }
    public function ajaxAction(Request $request) {
        $action = $request->input('action');
        $session = session()->all();
        switch ($action) {
            case 'getdatatable':
                $obj = new BlogCategory();
                $list = $obj->getdatatable();

                echo json_encode($list);
                break;

            case 'deleteBlogCategory':
                $obj = new BlogCategory();
                $result = $obj->deleteBlogCategory($request->input('data'));
                if ($result) {
                    $return['status'] = 'success';
                    $return['message'] = 'Blog Category successfully deleted';
                    $return['redirect'] = route('admin-blog-category');
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
