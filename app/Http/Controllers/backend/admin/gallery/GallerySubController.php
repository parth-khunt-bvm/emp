<?php

namespace App\Http\Controllers\backend\admin\gallery;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GallerySubmenu;
use Config;


class GallerySubController extends Controller
{
    function __construct(){

    }

    public function list (Request $request){
        $data['title'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Portfolio Category';
        $data['description'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Portfolio Category';
        $data['keywords'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Portfolio Category';
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
            'gallery.js'
        );
        $data['funinit'] = array(
            'Gallery.list()'
        );
        $data['header'] = array(
            'title' => 'Portfolio Category',
            'breadcrumb' => array(
                'Dashboard'=> route('admin-dashboard'),
                'Portfolio Category'=> 'Portfolio Category',
            )
        );
        return view('backend.pages.admin.gallery.list', $data);

    }
    public function add (Request $request){
         if ($request->isMethod('post')) {
            $obj = new GallerySubmenu();
            $result  = $obj->addSubmenu($request->post('name'));
            if ($result == "true") {
                $return['status'] = 'success';
                $return['message'] = 'Portfolio Category add succesfully !!';
                $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
                $return['redirect'] = route('admin-portfolio-category');
            } else {
                if ($result == "wrong") {
                    $return['status'] = 'error';
                    $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
                    $return['message'] = 'Something goes to wrong.Please try agian later';
                } else {
                    if ($result == "exits") {
                        $return['status'] = 'error';
                        $return['message'] = 'The Portfolio Category is already there.';
                        $return['redirect'] = route('admin-portfolio-category');
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

        $data['title'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Add Portfolio Category';
        $data['description'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Add Portfolio Category';
        $data['keywords'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Add Portfolio Category';
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
            'gallery.js'
        );
        $data['funinit'] = array(
            'Gallery.add()'
        );
        $data['header'] = array(
            'title' => 'Add Portfolio Category',
            'breadcrumb' => array(
                'Dashboard'=> route('admin-dashboard'),
                'Portfolio Category' => route('admin-portfolio-category'),
                'Add Portfolio Category'=> 'Add Portfolio Category',
            )
        );
        return view('backend.pages.admin.gallery.add', $data);

    }
    public function edit(Request $request,$id){

        if ($request->isMethod('post')) {

            $obj = new GallerySubmenu();
            $result = $obj->editDetail($request);

            if ($result == "true") {
                $return['status'] = 'success';
                $return['message'] = 'Portfolio Category successfully edited!';
                $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
                $return['redirect'] = route('admin-portfolio-category');
            } else {
                if ($result == "wrong") {
                    $return['status'] = 'error';
                    $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
                    $return['message'] = 'Something goes to wrong.Please try agian later';
                } else {
                    if ($result == "exits") {
                        $return['status'] = 'error';
                        $return['message'] = 'The Portfolio Category is already there.';
                        $return['redirect'] = route('admin-portfolio-category');
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

        $obj = new GallerySubmenu();
        $data['details']  = $obj->getDetail($id);

        $data['title'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Edit Portfolio Category';
        $data['description'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Edit Portfolio Category';
        $data['keywords'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Edit Portfolio Category';
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
            'gallery.js'
        );
        $data['funinit'] = array(
            'Gallery.add()'
        );
        $data['header'] = array(
            'title' => 'Edit Portfolio Category',
            'breadcrumb' => array(
                'Dashboard' => route('admin-dashboard'),
                'Portfolio Category' => route('admin-portfolio-category'),
                'Edit Portfolio Category' => 'Edit Portfolio Category',
            )
        );
        return view('backend.pages.admin.gallery.edit', $data);
    }
    public function ajaxAction(Request $request) {
        $action = $request->input('action');
        $session = session()->all();
        switch ($action) {
            case 'getdatatable':
                $obj = new GallerySubmenu();
                $list = $obj->getdatatable();

                echo json_encode($list);
                break;

            case 'deleteGallerySubmenu':
                $obj = new GallerySubmenu();
                $result = $obj->deleteGallerySubmenu($request->input('data'));
                if ($result) {
                    $return['status'] = 'success';
                    $return['message'] = 'Portfolio Category successfully deleted';
                    $return['redirect'] = route('admin-portfolio-category');
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

