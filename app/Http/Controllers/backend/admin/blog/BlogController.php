<?php

namespace App\Http\Controllers\backend\admin\blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\BlogCategory;
use Config;
class BlogController extends Controller
{
    function __construct(){

    }

    public function list (Request $request){
        $data['title'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Blog';
        $data['description'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Blog';
        $data['keywords'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Blog';
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
            'blog.js'
        );
        $data['funinit'] = array(
            'Blog.list()'
        );
        $data['header'] = array(
            'title' => 'Blog',
            'breadcrumb' => array(
                'Dashboard'=> route('admin-dashboard'),
                'Blog'=> 'Blog',
            )
        );
        return view('backend.pages.admin.blog.list', $data);

    }

    public function add (Request $request){
        $obj = new BlogCategory();
        $data['menu']  = $obj->getAllDetails();
         if ($request->isMethod('post')) {
            $obj = new Blog();
            $result  = $obj->addBlog($request);
            if ($result == "true") {
                $return['status'] = 'success';
                $return['message'] = 'Blog add succesfully !!';
                $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
                $return['redirect'] = route('admin-blog');
            } else {
                if ($result == "wrong") {
                    $return['status'] = 'error';
                    $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
                    $return['message'] = 'Something goes to wrong.Please try agian later';
                } else {
                    if ($result == "exits") {
                        $return['status'] = 'error';
                        $return['message'] = 'The Blog is already there.';
                        $return['redirect'] = route('admin-blog');
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

        $data['title'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Add Blog';
        $data['description'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Add Blog';
        $data['keywords'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Add Blog';
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
            'blog.js'
        );
        $data['funinit'] = array(
            'Blog.add()'
        );
        $data['header'] = array(
            'title' => 'Add Blog',
            'breadcrumb' => array(
                'Dashboard'=> route('admin-dashboard'),
                'Blog' => route('admin-blog'),
                'Add Blog'=> 'Add Blog',
            )
        );
        return view('backend.pages.admin.blog.add', $data);

    }
    public function edit(Request $request,$id){
        $obj = new BlogCategory();
        $data['menu']  = $obj->getAllDetails();
        if ($request->isMethod('post')) {

            $obj = new Blog();
            $result = $obj->editDetail($request);

            if ($result == "true") {
                $return['status'] = 'success';
                $return['message'] = 'Blog successfully edited!';
                $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
                $return['redirect'] = route('admin-blog');
            } else {
                if ($result == "wrong") {
                    $return['status'] = 'error';
                    $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
                    $return['message'] = 'Something goes to wrong.Please try agian later';
                } else {
                    if ($result == "exits") {
                        $return['status'] = 'error';
                        $return['message'] = 'The Blog is already there.';
                        $return['redirect'] = route('admin-blog');
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

        $obj = new Blog();
        $data['details']  = $obj->getDetail($id);

        $data['title'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Edit Blog';
        $data['description'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Edit Blog';
        $data['keywords'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Edit Blog';
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
            'blog.js'
        );
        $data['funinit'] = array(
            'Blog.edit()'
        );
        $data['header'] = array(
            'title' => 'Edit Blog',
            'breadcrumb' => array(
                'Dashboard' => route('admin-dashboard'),
                'Blog' => route('admin-blog'),
                'Edit Blog' => 'Edit Blog',
            )
        );
        return view('backend.pages.admin.blog.edit', $data);
    }
    public function ajaxAction(Request $request) {
        $action = $request->input('action');
        $session = session()->all();
        switch ($action) {
            case 'getdatatable':
                $obj = new Blog();
                $list = $obj->getdatatable();

                echo json_encode($list);
                break;

            case 'deleteBlog':
                $obj = new Blog();
                $result = $obj->deleteBlog($request->input('data'));
                if ($result) {
                    $return['status'] = 'success';
                    $return['message'] = 'Blog successfully deleted';
                    $return['redirect'] = route('admin-blog');
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
