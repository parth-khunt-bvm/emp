<?php

namespace App\Http\Controllers\backend\admin\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Config;
class DashboardController extends Controller
{
    function __construct(){

    }

    public function dashboard (Request $request){

        $data['title'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Admin Dashboard';
        $data['description'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Admin Dashboard';
        $data['keywords'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Admin Dashboard';
        $data['css'] = array(
            'toastr/toastr.min.css'
        );
        $data['plugincss'] = array(
            
        );
        $data['pluginjs'] = array(
            'toastr/toastr.min.js',
        );
        $data['js'] = array(
            'comman_function.js',
            'ajaxfileupload.js',
            'jquery.form.min.js',
            'dashboard.js'
        );
        $data['funinit'] = array(
            'Dashboard.init()'
        );
        $data['header'] = array(
            'title' => 'Admin dashboard',
            'breadcrumb' => array()
        );
        return view('backend.pages.admin.dashboard.dashboard', $data);

    }
}
