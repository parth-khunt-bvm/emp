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
                <form class="form" id="edit-banner-form" method="POST">@csrf
                    <input type="hidden" class="form-control" id="editId" name="editId"  value="{{  $details[0]->id }}" />
                    <div class="card-body">

                        <div class="form-group ">
                            <label class="col-form-label ">Page Name (Max  : 30 Characters)</label>
                            <input type="text" class="form-control" id="title" name="title"  value="{{  $details[0]->page_name }}" disabled placeholder="Please enter title"  />
                        </div>

                      <div class="form-group ">
                            <label class="col-form-label ">Image (Size : 1920px * 600px)</label>
                                <br>
                                    <img src="{{ asset('public/upload/banner_image/'.$details[0]->image) }}" alt="image" style="width: 320px ;height: 225px ">
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
