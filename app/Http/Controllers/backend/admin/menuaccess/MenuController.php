<?php

namespace App\Http\Controllers\backend\admin\menuaccess;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Config;
use App\Models\Menuaccess;

class MenuController extends Controller
{
    function __construct()
    {

    }

    public function list(Request $request){

        $objMenuaccess = new Menuaccess();
        $data['menuList'] = $objMenuaccess->getList();

        if ($request->isMethod('post')) {
            $objMenuaccess = new Menuaccess();
            $result = $objMenuaccess->editList($request);

            if($result){
                $return['status'] = 'success';
                $return['message'] = 'Your profile successfully updated';
                $return['redirect'] = route('admin-menu-access');
            }else{
                $return['status'] = 'error';
                $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
                $return['message'] = 'Something goes to wrong.Please try again';
            }
            return json_encode($return);
            exit();
        }

        $data['title'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Menu access';
        $data['description'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Menu access';
        $data['keywords'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Menu access';
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
            'menuaccess.js'
        );
        $data['funinit'] = array(
            'Menuaccess.init()'
        );
        $data['header'] = array(
            'title' => 'Menu access',
            'breadcrumb' => array(
                'Dashboard' => route('admin-dashboard'),
                'Menu access' => 'menu access'
            )
        );
        return view('backend.pages.admin.menuaccess.list', $data);
    }
}
