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
                <form class="form" id="sectionone-form" method="POST">@csrf
                    <div class="card-body">
                        <div class="form-group ">
                            <label class="col-form-label ">Title
                            <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="title" name="title"  value="{{ $details[0]->title }}"/>
                        </div>

                        <div class="form-group ">
                                <label class="col-form-label ">Details
                                <span class="text-danger">*</span></label>
                                <textarea class="form-control" rows="5" name="details" id="details">{!! $details[0]->details !!}</textarea>
                        </div>

                        <div class="form-group ">
                            <img src="{{ asset('public/upload/aboutus_section/'.$details[0]->image) }}"  alt="Logo" style="height: 200px;width: 300px;">
                            <br>
                            <label class="col-form-label ">Image
                            <span>(optional, 1024*950)</span></label>

                            <input type="file" accept="image/*" class="form-control" id="image" name="image" />
                        </div>

                        <div class="form-group ">
                            <label class="col-form-label ">Image Head Line
                            <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="image_headline" name="image_headline"  value="{{ $details[0]->image_headline }}"/>
                        </div>
                        <div style="display: none">
                            <div class="form-group ">
                                <img src="{{ asset('public/upload/aboutus_section/'.$details[0]->signuture) }}"  alt="Logo" style="height: 30px; width: 180px">
                                <br>
                                <label class="col-form-label ">Signuture
                                <span>(optional, 150*70)</span></label>

                                <input type="file" accept="image/*" class="form-control" id="signuture" name="signuture" />
                            </div>


                            <div class="form-group ">
                                <label class="col-form-label ">Contact No</label>
                                <input type="text" class="form-control onlyNumber" id="contact_no" name="contact_no"  value="{{ $details[0]->contact_no }}"/>
                            </div>

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
