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
                <form class="form" id="details-form" method="POST">@csrf
                    <div class="card-body">
                        <div class="form-group ">
                            <label class="col-form-label ">Phone Number
                            <span class="text-danger">*</span></label>
                            <input type="text" class="form-control onlyNumber" id="phoneno" name="phoneno"  value="{{ $details[0]->phoneno }}"/>
                        </div>
                        <div class="form-group ">
                            <label class="col-form-label ">Phone Number 2 (optional)</label>
                            <input type="text" class="form-control onlyNumber" id="phoneno2" name="phoneno2"  value="{{ $details[0]->phoneno2 }}"/>
                        </div>

                        <div class="form-group ">
                            <label class="col-form-label ">Email
                            <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="email" name="email"  value="{{ $details[0]->email }}"/>
                        </div>
                        <div class="form-group ">
                            <label class="col-form-label ">Email 2 (optional)</label>
                            <input type="text" class="form-control" id="email2" name="email2"  value="{{ $details[0]->email2 }}"/>
                        </div>

                        <div class="form-group ">
                            <label class="col-form-label ">Address Line 1 (Ex. A-111 XYZ Complex , xyz)
                            <span class="text-danger">*</span></label>
                            <textarea class="form-control" id="address_line1" name="address_line1">{{ $details[0]->address_line1 }}</textarea>
                        </div>

                        <div class="form-group ">
                            <label class="col-form-label ">Address Line 2(Ex. state, country - 123456)
                            <span class="text-danger">*</span></label>
                            <textarea class="form-control" id="address_line2" name="address_line2">{{ $details[0]->address_line2 }}</textarea>
                        </div>

                        <div class="form-group ">
                            <img src="{{ asset('public/upload/details/'.$details[0]->logo) }}"  alt="Logo" style="height: 30px; width: 180px">
                            <br>
                            <label class="col-form-label ">Logo
                            <span class="text-danger">*</span></label>

                            <input type="file" accept="image/*" class="form-control" id="logo" name="logo" />
                        </div>

                        <div class="form-group ">
                            <img src="{{ asset('public/upload/details/'.$details[0]->favicon) }}"  alt="favicon" style="height: 25px; width: 25px">
                            <br>
                            <label class="col-form-label ">Favicon
                            <span class="text-danger">*</span></label>
                            <input type="file" accept="image/*" class="form-control" id="favicon" name="favicon" />
                        </div>

                        <div class="form-group ">
                            <label class="col-form-label ">About us (Max characters : 350)
                            <span class="text-danger">*</span></label>
                            <textarea class="form-control" id="aboutus" name="aboutus">{{ $details[0]->aboutus }}</textarea>
                        </div>
                        <style>
                            iframe{
                                height: 250px !important;
                                width: 100% !important;
                            }
                        </style>
                        <div class="form-group ">
                            {!! $details[0]->map !!}<br>
                            <label class="col-form-label ">Map Embed link
                            <span class="text-danger">*</span></label>
                            <textarea class="form-control" id="map" name="map">{{ $details[0]->map }}</textarea>
                        </div>

                        <div class="form-group ">
                            <label class="col-form-label ">Facebook link (optional)</label>
                            <input type="text" class="form-control" id="facebook" name="facebook" value="{{ $details[0]->facebook }}"/>
                        </div>

                        {{-- <div class="form-group ">
                            <label class="col-form-label ">Twitter link (optional)</label>
                            <input type="text" class="form-control" id="twitter" name="twitter" value="{{ $details[0]->twitter }}"/>
                        </div> --}}

                        <div class="form-group ">
                            <label class="col-form-label ">Linkedin (optional) </label>
                            <input type="text" class="form-control" id="linkedin" name="linkedin" value="{{ $details[0]->linkedin }}"/>
                        </div>

                        <div class="form-group ">
                            <label class="col-form-label ">Instagram (optional)</label>
                            <input type="text" class="form-control" id="instagram" name="instagram" value="{{ $details[0]->instagram }}"/>
                        </div>


                        {{-- <div class="form-group ">
                            <label class="col-form-label ">Github (optional)</label>
                            <input type="text" class="form-control" id="github" name="github" value="{{ $details[0]->github }}"/>
                        </div> --}}


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
