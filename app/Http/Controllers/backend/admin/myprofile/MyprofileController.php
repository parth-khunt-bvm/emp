<?php

namespace App\Http\Controllers\backend\admin\myprofile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Config;
use App\Models\Users;

class MyprofileController extends Controller
{
    //
    function __construct()
    {

    }

    public function myprofile(Request $request){
        if ($request->isMethod('post')) {
            $objUsers = new Users();
            $result = $objUsers->changeprofile($request);

            if($result){
                $return['status'] = 'success';
                $return['message'] = 'Your profile successfully updated';
                $return['redirect'] = route('admin-my-profile');
            }else{
                $return['status'] = 'error';
                $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
                $return['message'] = 'Something goes to wrong.Please try again';
            }
            return json_encode($return);
            exit();
        }

        $data['title'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Edit My Profile';
        $data['description'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Edit My Profile';
        $data['keywords'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Edit My Profile';
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
            'profile.js'
        );
        $data['funinit'] = array(
            'Profile.init()'
        );
        $data['header'] = array(
            'title' => 'Edit My Profile',
            'breadcrumb' => array(
                'Dashboard' => route('admin-dashboard'),
                'Edit My Profile' => 'Edit My Profile'
            )
        );
        return view('backend.pages.admin.dashboard.profile', $data);
    }
    public function changepassword(Request $request){
        if ($request->isMethod('post')) {
            $objUsers = new Users();
            $result = $objUsers->changepassword($request);

            if($result == 'notMatch'){
                $return['status'] = 'warning';
                $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
                $return['message'] = 'Your old passsword not match.';
            }else{
                if($result == 'true'){
                    $return['status'] = 'success';
                    $return['message'] = 'Your password successfully changed';
                    $return['redirect'] = route('admin-change-password');
                }else{
                    $return['status'] = 'error';
                    $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
                    $return['message'] = 'Something goes to wrong.Please try again';
                }
            }
            return json_encode($return);
            exit();
        }


        $data['title'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Change Password';
        $data['description'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Change Password';
        $data['keywords'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Change Password';

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
            'profile.js'
        );
        $data['funinit'] = array(
            'Profile.change()'
        );
        $data['header'] = array(
            'title' => 'Change Password',
            'breadcrumb' => array(
                'Dashboard' => route('admin-dashboard'),
                'Change Password' => 'Change Password'
            )
        );
        return view('backend.pages.admin.dashboard.changepassword', $data);
    }
}
