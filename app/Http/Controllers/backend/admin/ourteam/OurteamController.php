<?php

namespace App\Http\Controllers\backend\admin\ourteam;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OurTeam;
use Config;
class OurteamController extends Controller
{
    function __construct()
    {

    }

    public function list(Request $request){
        $data['title'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Our Team List';
        $data['description'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Our Team List';
        $data['keywords'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Our Team List';
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
            'ourteam.js'
        );
        $data['funinit'] = array(
            'Ourteam.list()'
        );
        $data['header'] = array(
            'title' => 'Our Team List',
            'breadcrumb' => array(
                'Dashboard' => route('admin-dashboard'),
                'Our Team List' => 'Our Team List',
            )
        );
        return view('backend.pages.admin.ourteam.list', $data);
    }

    public function add(Request $request){

        if ($request->isMethod('post')) {

            $objOurTeam = new OurTeam();
            $result = $objOurTeam->addDetail($request);
            if($result){
                $return['status'] = 'success';
                $return['message'] = 'Team member successfully added';
                $return['redirect'] = route('admin-our-team');
            }else{
                $return['status'] = 'error';
                $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
                $return['message'] = 'Something goes to wrong.Please try again';
            }
            return json_encode($return);
                exit();
        }

        $data['title'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Add Our Team List';
        $data['description'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Add Our Team List';
        $data['keywords'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Add Our Team List';
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
            'ourteam.js'
        );
        $data['funinit'] = array(
            'Ourteam.add()'
        );
        $data['header'] = array(
            'title' => 'Add Our Team List',
            'breadcrumb' => array(
                'Dashboard' => route('admin-dashboard'),
                'Our Team List' => route('admin-our-team'),
                'Add Our Team List' => 'Add Our Team List',
            )
        );
        return view('backend.pages.admin.ourteam.add', $data);
    }

    public function edit(Request $request,$id){

        if ($request->isMethod('post')) {

            $objOurTeam = new OurTeam();
            $result = $objOurTeam->editDetail($request);
            if($result){
                $return['status'] = 'success';
                $return['message'] = 'Team member successfully edited';
                $return['redirect'] = route('admin-our-team');
            }else{
                $return['status'] = 'error';
                $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
                $return['message'] = 'Something goes to wrong.Please try again';
            }
            return json_encode($return);
                exit();
        }

        $objOurTeam = new OurTeam();
        $data['memberDetails']  = $objOurTeam->getDetail($id);

        $data['title'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Edit Our Team List';
        $data['description'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Edit Our Team List';
        $data['keywords'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Edit Our Team List';
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
            'ourteam.js'
        );
        $data['funinit'] = array(
            'Ourteam.edit()'
        );
        $data['header'] = array(
            'title' => 'Edit Our Team List',
            'breadcrumb' => array(
                'Dashboard' => route('admin-dashboard'),
                'Our Team List' => route('admin-our-team'),
                'Edit Our Team List' => 'Edit Our Team List',
            )
        );
        return view('backend.pages.admin.ourteam.edit', $data);
    }

    public function ajaxAction(Request $request) {
        $action = $request->input('action');
        $session = session()->all();
        switch ($action) {
            case 'getdatatable':
                $objOurTeam = new OurTeam();
                $list = $objOurTeam->getdatatable();
                echo json_encode($list);
                break;

            case 'deleteTeam':
                $obj = new OurTeam();
                $result = $obj->deleteOurTeam($request->input('data'));
                if ($result) {
                    $return['status'] = 'success';
                    $return['message'] = 'Team member successfully deleted';
                    $return['redirect'] = route('admin-our-team');
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
