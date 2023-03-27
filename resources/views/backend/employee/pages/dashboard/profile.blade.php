@extends('backend.employee.layout.layout')
@section('section')

@php
if (!empty(Auth()->guard('employee')->user())) {
   $data = Auth()->guard('employee')->user();
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
                <form class="form" id="my-profile" method="POST">@csrf
                    <div class="card-body">

                        <input type="hidden" class="form-control" id="editId" name="editId" value="{{  $data['id'] }}"/>

                        <div class="form-group ">
                            <label class="col-form-label ">First Name
                            <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="firstname" name="firstname"  value="{{  $data['firstname'] }}" placeholder="Please enter your first name"/>
                        </div>

                        <div class="form-group ">
                            <label class="col-form-label ">Last Name
                                <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="lastname" name="lastname"  value="{{  $data['lastname'] }}" placeholder="Please enter your last name"/>
                        </div>

                        <div class="form-group ">
                            <label class="col-form-label ">Email
                                <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="email" name="email"  value="{{  $data['email'] }}" placeholder="Please enter your email"/>
                        </div>

                        <div class="form-group ">
                            <label class="col-form-label ">User Image</label>
                            <br>
                                <img  src="{{ asset('public/upload/userprofile/'.$data['userimage'] ) }}" alt="Silder Image" style="width: 150px ;height: 150px ">
                            <br><br>
                            <input type="file" class="form-control" id="userImage" name="userImage"  />
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
