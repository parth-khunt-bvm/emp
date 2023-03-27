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
                <form class="form" id="add-team-form" method="POST">@csrf

                    <div class="card-body">

                        <div class="form-group ">
                            <label class="col-form-label ">Member Name
                            <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="name" name="name"  />
                        </div>

                        <div class="form-group ">
                            <label class="col-form-label ">Member Designation
                            <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="designation" name="designation"  />
                        </div>

                        <div class="form-group ">
                            <label class="col-form-label ">Member Image (Size : 480px * 520px)
                            <span class="text-danger">*</span></label>
                            <input type="file" accept="image/*" class="form-control" id="image" name="image" />
                        </div>

                        <div class="form-group ">
                            <label class="col-form-label ">Facebook link (optional)</label>
                            <input type="text" class="form-control" id="facebook" name="facebook" />
                        </div>

                        <div class="form-group ">
                            <label class="col-form-label ">Twitter link (optional)</label>
                            <input type="text" class="form-control" id="twitter" name="twitter" />
                        </div>

                        <div class="form-group ">
                            <label class="col-form-label ">Linkedin (optional) </label>
                            <input type="text" class="form-control" id="linkedin" name="linkedin" />
                        </div>

                        <div class="form-group ">
                            <label class="col-form-label ">Instagram (optional)</label>
                            <input type="text" class="form-control" id="instagram" name="instagram" />
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
