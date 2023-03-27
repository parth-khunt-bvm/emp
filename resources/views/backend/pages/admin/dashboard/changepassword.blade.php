@extends('backend.layout.layout')
@section('section')

@php
if (!empty(Auth()->guard('admin')->user())) {
   $data = Auth()->guard('admin')->user();
}
@endphp
<!--begin::Entry-->
<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container">
        <!--begin::Dashboard-->
        <!--begin::Row-->
        <div class="row">
            <div class="col-12">
            <div class="card card-custom gutter-b example example-compact">
                <div class="card-header">
                    <h3 class="card-title">{{$header['title']}}</h3>
                </div>
                <div id="alertDiv">

                </div>
                <!--begin::Form-->
                <form class="form" id="change-password" method="POST">@csrf
                    <div class="card-body">

                        <input type="hidden" class="form-control" id="editId" name="editId" value="{{  $data['id'] }}"/>

                        <div class="form-group ">
                            <label class="col-form-label ">Old Passsword
                            <span class="text-danger">*</span></label>
                            <input type="password" class="form-control" id="oldpassword" name="oldpassword"  placeholder="Please enter your old password"/>
                        </div>

                        <div class="form-group ">
                            <label class="col-form-label ">New Passsword
                                <span class="text-danger">*</span></label>
                            <input type="password" class="form-control" id="newpasssword" name="newpasssword"  placeholder="Please enter your new password"/>
                        </div>

                        <div class="form-group ">
                            <label class="col-form-label ">Confirm Passsword
                                <span class="text-danger">*</span></label>
                            <input type="password" class="form-control" id="confirmpasssword" name="confirmpasssword"  placeholder="Please enter your confirm password"/>
                        </div>

                    </div>

                    <div class="card-footer">
                        <div class="row">
                            <div class="col-lg-12 ml-lg-auto">
                                <button type="submit" class="btn btn-primary font-weight-bold mr-2">Submit</button>
                                <button type="reset" class="btn btn-light-primary font-weight-bold">Reset</button>
                            </div>
                        </div>
                    </div>

                </form>
                <!--end::Form-->
            </div>
            </div>
        </div>
        <!--end::Row-->

        <!--end::Dashboard-->
    </div>
    <!--end::Container-->
</div>
<!--end::Entry-->

@endsection
