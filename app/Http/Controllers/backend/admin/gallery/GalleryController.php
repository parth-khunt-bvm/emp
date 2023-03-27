<?php

namespace App\Http\Controllers\backend\admin\gallery;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\GallerySubmenu;
use Config;

class GalleryController extends Controller
{
       function __construct(){

    }

    public function list (Request $request){
        $data['title'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Portfolio Image';
        $data['description'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Portfolio Image';
        $data['keywords'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Portfolio Image';
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
            'galleryImage.js'
        );
        $data['funinit'] = array(
            'GalleryImage.list()'
        );
        $data['header'] = array(
            'title' => 'Portfolio Image',
            'breadcrumb' => array(
                'Dashboard'=> route('admin-dashboard'),
                'Portfolio Image'=> 'Portfolio Image',
            )
        );
        return view('backend.pages.admin.galleryimage.list', $data);

    }

    public function add (Request $request){
        $obj = new GallerySubmenu();
        $data['submenu']  = $obj->getAllDetails();
         if ($request->isMethod('post')) {
            $obj = new Gallery();
            $result  = $obj->addGalleryImage($request);
            if ($result == "true") {
                $return['status'] = 'success';
                $return['message'] = 'Portfolio Image add succesfully !!';
                $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
                $return['redirect'] = route('admin-portfolio');
            } else {
                if ($result == "wrong") {
                    $return['status'] = 'error';
                    $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
                    $return['message'] = 'Something goes to wrong.Please try agian later';
                } else {
                    if ($result == "exits") {
                        $return['status'] = 'error';
                        $return['message'] = 'The Portfolio Image is already there.';
                        $return['redirect'] = route('admin-portfolio');
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

        $data['title'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Add Portfolio Image';
        $data['description'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Add Portfolio Image';
        $data['keywords'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Add Portfolio Image';
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
            'galleryImage.js'
        );
        $data['funinit'] = array(
            'GalleryImage.add()'
        );
        $data['header'] = array(
            'title' => 'Add Portfolio Image',
            'breadcrumb' => array(
                'Dashboard'=> route('admin-dashboard'),
                'Portfolio Image' => route('admin-portfolio'),
                'Add Portfolio Image'=> 'Add Portfolio Image',
            )
        );
        return view('backend.pages.admin.galleryimage.add', $data);

    }
    public function edit(Request $request,$id){
        $obj = new GallerySubmenu();
        $data['submenu']  = $obj->getAllDetails();
        if ($request->isMethod('post')) {

            $obj = new Gallery();
            $result = $obj->editDetail($request);

            if ($result == "true") {
                $return['status'] = 'success';
                $return['message'] = 'Portfolio Image successfully edited!';
                $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
                $return['redirect'] = route('admin-portfolio');
            } else {
                if ($result == "wrong") {
                    $return['status'] = 'error';
                    $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
                    $return['message'] = 'Something goes to wrong.Please try agian later';
                } else {
                    if ($result == "exits") {
                        $return['status'] = 'error';
                        $return['message'] = 'The Portfolio Image is already there.';
                        $return['redirect'] = route('admin-portfolio');
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

        $obj = new Gallery();
        $data['details']  = $obj->getDetail($id);

        $data['title'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Edit Portfolio Image';
        $data['description'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Edit Portfolio Image';
        $data['keywords'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Edit Portfolio Image';
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
            'galleryImage.js'
        );
        $data['funinit'] = array(
            'GalleryImage.edit()'
        );
        $data['header'] = array(
            'title' => 'Edit Portfolio Image',
            'breadcrumb' => array(
                'Dashboard' => route('admin-dashboard'),
                'Portfolio Image' => route('admin-portfolio'),
                'Edit Portfolio Image' => 'Edit Portfolio Image',
            )
        );
        return view('backend.pages.admin.galleryimage.edit', $data);
    }
    public function ajaxAction(Request $request) {
        $action = $request->input('action');
        $session = session()->all();
        switch ($action) {
            case 'getdatatable':
                $obj = new Gallery();
                $list = $obj->getdatatable();

                echo json_encode($list);
                break;

            case 'deleteGallery':
                $obj = new Gallery();
                $result = $obj->deleteGallery($request->input('data'));
                if ($result) {
                    $return['status'] = 'success';
                    $return['message'] = 'Portfolio Image successfully deleted';
                    $return['redirect'] = route('admin-portfolio');
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
