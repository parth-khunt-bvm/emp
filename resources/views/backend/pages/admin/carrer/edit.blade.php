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
                    <form class="form" id="edit-career-form" method="POST">@csrf
                        <input type="hidden" class="form-control" id="editId" name="editId"
                            value="{{  $details[0]->id }}" />
                        <div class="card-body">
                        <div class="form-group ">
                            <label class="col-form-label ">Department Name (Max  : 30 Characters)
                            <span class="text-danger">*</span></label>
                            <input type="text" class="form-control"  value="{{  $details[0]->department_name }}" id="department_name" name="department_name"  placeholder="Please enter department name"/>
                        </div>

                            <div class="form-group ">
                            <label class="col-form-label ">Icon (Size : 50px * 50px)
                                <span class="text-danger">*</span></label>
                                <br>
                                    <img src="{{ asset('public/upload/services/'.$details[0]->icon) }}" alt="icon" style="width: 50px ;height: 50px ">
                                <br><br>
                            <input type="file" accept="image/*" class="form-control" id="icon" name="icon" />
                        </div>
                        <div class="form-group ">
                                <label class="col-form-label ">Experience
                                    <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="experience" name="experience"
                                    value="{{  $details[0]->experience }}" placeholder="Please enter experience" />
                            </div>

                        <div class="form-group ">
                            <label class="col-form-label ">Description
                            <span class="text-danger">*</span></label>
                            <textarea class="form-control" id="details" name="details" placeholder="Please enter  description">{{  $details[0]->details }}</textarea>
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