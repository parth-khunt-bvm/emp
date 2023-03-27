<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sendmail;
use Config;
use Auth;
use Session;
use Hash;

class LoginController extends Controller
{
    function __construct(){

    }

    public function admin(Request $request){
        if ($request->isMethod('post')) {


            if (Auth::guard('admin')->attempt(['email' => $request->input('email'), 'password' => $request->input('password'), 'usertype' => 'A' ,'is_deleted'=>'N', 'email_verified'=>'Y'])) {

                    $loginData = array(
                        'firstname' => Auth::guard('admin')->user()->firstname,
                        'lastname' => Auth::guard('admin')->user()->lastname,
                        'email' => Auth::guard('admin')->user()->email,
                        'userimage' => Auth::guard('admin')->user()->userimage,
                        'usertype' => Auth::guard('admin')->user()->usertype,
                        'id' => Auth::guard('admin')->user()->id
                    );

                    Session::push('logindata', $loginData);
                    $return['status'] = 'success';
                    $return['message'] = 'Well Done login Successfully!';
                    $return['redirect'] = route('admin-dashboard');

                } else {
                    if (Auth::guard('employee')->attempt(['email' => $request->input('email'), 'password' => $request->input('password'), 'usertype' => 'U' ,'is_deleted'=>'N', 'email_verified'=>'Y'])) {

                        $loginData = array(
                            'firstname' => Auth::guard('employee')->user()->firstname,
                            'lastname' => Auth::guard('employee')->user()->lastname,
                            'email' => Auth::guard('employee')->user()->email,
                            'userimage' => Auth::guard('employee')->user()->userimage,
                            'usertype' => Auth::guard('employee')->user()->usertype,
                            'id' => Auth::guard('employee')->user()->id
                        );

                        Session::push('logindata', $loginData);
                        $return['status'] = 'success';
                        $return['message'] = 'Well Done login Successfully!';
                        $return['redirect'] = route('employee-dashboard');
                    } else{
                        $return['status'] = 'error';
                        $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
                        $return['message'] = 'Invalid Login Id/Password';
                    }
                }

                return json_encode($return);
                exit();
        }

        $data['title'] = Config::get( 'constants.PROJECT_NAME' ) . " || My Business - Login";
        $data['description'] = Config::get( 'constants.PROJECT_NAME' ) . " || My Business - Login";
        $data['keywords'] = Config::get( 'constants.PROJECT_NAME' ) . " || My Business - Login";
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
            'mybusinesslogin.js',
        );
        $data['funinit'] = array(
            'Mybusinesslogin.init()',
        );
        return view('backend.pages.admin.login.login', $data);
    }


    public function testingmail(Request $request){
        $objSendmail = new Sendmail();
        $Sendmail = $objSendmail->sendMailltesting();
        exit;
    }

    public function logout(Request $request) {
        $this->resetGuard();
        return redirect()->route('admin');
    }

    public function resetGuard() {
        Auth::logout();
        Auth::guard('admin')->logout();
        Auth::guard('employee')->logout();
        Session::forget('logindata');
    }
}
