<?php

namespace App\Http\Controllers\backend\admin\testimonials;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonials;
use Config;
class TestimonialsController extends Controller
{
    function __construct()
    {

    }

    public function list(Request $request){
        $data['title'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Testimonials List';
        $data['description'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Testimonials List';
        $data['keywords'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Testimonials List';
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
            'testimonials.js'
        );
        $data['funinit'] = array(
            'Testimonials.list()'
        );
        $data['header'] = array(
            'title' => 'Testimonials List',
            'breadcrumb' => array(
                'Dashboard' => route('admin-dashboard'),
                'Testimonials List' => 'Testimonials List',
            )
        );
        return view('backend.pages.admin.testimonials.list', $data);
    }

    public function add(Request $request){

        if ($request->isMethod('post')) {

            $objTestimonials = new Testimonials();
            $result = $objTestimonials->addDetail($request);
            if($result){
                $return['status'] = 'success';
                $return['message'] = 'Testimonials successfully added';
                $return['redirect'] = route('admin-testimonials');
            }else{
                $return['status'] = 'error';
                $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
                $return['message'] = 'Something goes to wrong.Please try again';
            }
            return json_encode($return);
                exit();
        }

        $data['title'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Add Testimonials List';
        $data['description'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Add Testimonials List';
        $data['keywords'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Add Testimonials List';
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
            'testimonials.js'
        );
        $data['funinit'] = array(
            'Testimonials.add()'
        );
        $data['header'] = array(
            'title' => 'Add Testimonials List',
            'breadcrumb' => array(
                'Dashboard' => route('admin-dashboard'),
                'Testimonials List' => route('admin-testimonials'),
                'Add Testimonials List' => 'Add Testimonials List',
            )
        );
        return view('backend.pages.admin.testimonials.add', $data);
    }

    public function edit(Request $request,$id){

        if ($request->isMethod('post')) {

            $objTestimonials = new Testimonials();
            $result = $objTestimonials->editDetail($request);
            if($result){
                $return['status'] = 'success';
                $return['message'] = 'Testimonials successfully edited';
                $return['redirect'] = route('admin-testimonials');
            }else{
                $return['status'] = 'error';
                $return['jscode'] = '$(".submitbtn:visible").removeAttr("disabled");$("#loader").hide();';
                $return['message'] = 'Something goes to wrong.Please try again';
            }
            return json_encode($return);
                exit();
        }

        $objTestimonials = new Testimonials();
        $data['details']  = $objTestimonials->getDetail($id);

        $data['title'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Edit Testimonials List';
        $data['description'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Edit Testimonials List';
        $data['keywords'] = Config::get( 'constants.PROJECT_NAME' ) . ' || Edit Testimonials List';
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
            'testimonials.js'
        );
        $data['funinit'] = array(
            'Testimonials.edit()'
        );
        $data['header'] = array(
            'title' => 'Edit Testimonials List',
            'breadcrumb' => array(
                'Dashboard' => route('admin-dashboard'),
                'Testimonials List' => route('admin-testimonials'),
                'Edit Testimonials List' => 'Edit Testimonials List',
            )
        );
        return view('backend.pages.admin.testimonials.edit', $data);
    }

    public function ajaxAction(Request $request) {
        $action = $request->input('action');
        $session = session()->all();
        switch ($action) {
            case 'getdatatable':
                $objTestimonials = new Testimonials();
                $list = $objTestimonials->getdatatable();

                echo json_encode($list);
                break;

            case 'deleteTestimonials':
                // echo $request->input('data');
                $obj = new Testimonials();
                $result = $obj->deleteTestimonials($request->input('data'));
                if ($result) {
                    $return['status'] = 'success';
                    $return['message'] = 'Testimonials successfully deleted';
                    $return['redirect'] = route('admin-testimonials');
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
