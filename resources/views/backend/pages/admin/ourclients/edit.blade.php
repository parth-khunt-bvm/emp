@extends('backend.layout.layout')
@section('section')

<!--begin::Entry-->
<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container-fluid">
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
                <form class="form" id="add-client-form" method="POST">@csrf
                    <div class="card-body">
                        <div class="form-group ">
                            <img src="{{ asset('public/upload/ourclients/'.$details[0]->image) }}"  alt="Logo" style="height: 30px; width: 180px">
                            <br>
                            <label class="col-form-label ">Client Logo ( Size : 600px * 300px without background)
                            <span class="text-danger">*</span></label>
                            <input type="file" accept="image/*" class="form-control" id="logo" name="logo" />
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
