@extends('backend.employee.layout.layout')
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
                <form class="form" id="add-designation-form" method="POST">@csrf

                    <div class="card-body">
                    <div class="form-group">
                            <label for="exampleSelect1">Department <span class="text-danger">*</span></label>
                            <select class="form-control"  id="department_id" name="department_id">
                             <option value="">-- Select -- </option>
                                @foreach($menu as $key => $value)
                                <option value="{{ $value->id }}">{{ $value->department }}</option>
                                @endforeach
                            </select>
                           </div>
                        <div class="form-group ">
                            <label class="col-form-label ">Designation (Ex : Web Design , App Development)
                            <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="designation" name="designation"  placeholder="Please enter designation"/>
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
