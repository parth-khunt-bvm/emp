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
                <form class="form" id="edit-home-service-form" method="POST">@csrf

                    <div class="card-body">
                        <input type="hidden" class="form-control" id="editId" name="editId"  value="{{  $details[0]->id }}" />
                        <div class="form-group ">
                            <label class="col-form-label ">Title (Max  : 30 Characters)
                                <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Please enter title"  value="{{  $details[0]->title }}" />
                        </div>

                        <div class="form-group ">
                            <label class="col-form-label ">Description (Max  : 120 Characters)
                            <span class="text-danger">*</span></label>
                            <textarea class="form-control" id="description" name="description" placeholder="Please enter description">{{  $details[0]->description }}</textarea>
                        </div>

                        <div class="form-group ">
                            <label class="col-form-label ">Image (Size : 50px * 50px)
                                <span class="text-danger">*</span></label>
                                <br>
                                    <img class="bg-blue" src="{{ asset('public/upload/homeservice/'.$details[0]->image) }}" alt="Silder Image" style="width: 50px ;height: 50px ">
                                <br><br>
                            <input type="file" accept="image/*" class="form-control" id="image" name="image" />
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
