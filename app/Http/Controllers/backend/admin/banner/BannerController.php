<?php

namespace App\Http\Controllers\backend\admin\banner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use Config;

class BannerController extends Controller
{
    function __construct()
    {

    }

    public function list (Request $request){
        $data['title'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Pages Banner';
        $data['description'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Pages Banner';
        $data['keywords'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Pages Banner';
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
            'pagesbanner.js'
        );
        $data['funinit'] = array(
            'Pagesbanner.list()'
        );
        $data['header'] = array(
            'title' => 'Pages Banner',
            'breadcrumb' => array(
                'Dashboard'=> route('admin-dashboard'),
                'Pages Banner'=> 'Pages Banner',
            )
        );
        return view('backend.pages.admin.pagebanner.list', $data);
    }

    public function edit(Request $request,$id){

        if ($request->isMethod('post')) {

            $objBanner = new Banner();
            $result = $objBanner->editDetail($request);

            if ($result == "true") {
                $return['status'] = 'success';
                $return['message'] = 'Banner successfully edited!';
                $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
                $return['redirect'] = route('admin-banner');
            } else {
                $return['status'] = 'error';
                $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
                $return['message'] = 'Something goes to wrong.Please try agian later';
            }
            return json_encode($return);
                exit();
        }

        $objBanner = new Banner();
        $data['details'] =  $objBanner->getBannerDetails($id);

        $data['title'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Edit Pages Banner';
        $data['description'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Edit Pages Banner';
        $data['keywords'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Edit Pages Banner';
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
            'pagesbanner.js'
        );
        $data['funinit'] = array(
            'Pagesbanner.edit()'
        );
        $data['header'] = array(
            'title' => 'Edit Pages Banner',
            'breadcrumb' => array(
                'Dashboard' => route('admin-dashboard'),
                'Pages Banner' => route('admin-blog'),
                'Edit Pages Banner' => 'Edit Pages Banner',
            )
        );
        return view('backend.pages.admin.pagebanner.edit', $data);
    }

    public function ajaxAction(Request $request) {
        $action = $request->input('action');
        $session = session()->all();
        switch ($action) {
            case 'getdatatable':
                $objBanner = new Banner();
                $list = $objBanner->getdatatable();

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
