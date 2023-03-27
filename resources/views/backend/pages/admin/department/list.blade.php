@extends('backend.layout.layout')
@section('section')

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
                <form class="form" id="add-department-form" method="POST">@csrf

                    <div class="card-body">
                        <div class="form-group ">
                            <label class="col-form-label ">Line 1
                            <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="line1" name="line1"  value="{{ $details[0]->line1 }}"/>
                        </div>
                        <div class="form-group ">
                            <label class="col-form-label ">Line 2
                            <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="line2" name="line2"  value="{{ $details[0]->line2 }}"/>
                        </div>
                        <div class="form-group ">
                            <label class="col-form-label ">Email
                            <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="email" name="email"  value="{{ $details[0]->email }}"/>
                        </div>
                        <div class="form-group ">
                            <label class="col-form-label ">Phone Number
                            <span class="text-danger">*</span></label>
                            <input type="text" class="form-control onlyNumber" id="phoneno" name="phoneno"  value="{{ $details[0]->phoneno }}"/>
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
