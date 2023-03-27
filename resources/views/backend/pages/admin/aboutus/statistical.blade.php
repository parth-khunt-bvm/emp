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
                <form class="form" id="statistical-form" method="POST">@csrf
                    <div class="card-body">
                        <div class="form-group ">
                            <img src="{{ asset('public/upload/aboutus_section/'.$details[0]->image) }}"  alt="Logo" style="height: 300px;width: 100%;">
                            <br>
                            <label class="col-form-label ">Image
                            <span>(optional, 1024*950)</span></label>

                            <input type="file" accept="image/*" class="form-control" id="image" name="image" />
                        </div>


                        <div class="form-group ">
                            <label class="col-form-label "><h5> Happy Client </h5></label>
                            <br>
                            <img src="{{ asset('public/upload/aboutus_section/'.$details[0]->icon1) }}"  alt="Logo" style="height: 50px; width: 100px">
                            <br>
                            <label class="col-form-label ">icon
                            <span>(optional, 50*50)</span></label>

                            <input type="file" accept="image/*" class="form-control" id="icon1" name="icon1" />
                        </div>
                        <div class="form-group ">
                            <label class="col-form-label ">Count</label>
                            <input type="text" class="form-control onlyNumber" id="count1" name="count1"  value="{{ $details[0]->count1 }}"/>
                        </div>

                        <div class="form-group ">
                            <label class="col-form-label "><h5> Number of Employees </h5></label>
                            <br>
                            <img src="{{ asset('public/upload/aboutus_section/'.$details[0]->icon2) }}"  alt="Logo" style="height: 50px; width: 100px">
                            <br>
                            <label class="col-form-label ">icon
                            <span>(optional, 50*50)</span></label>

                            <input type="file" accept="image/*" class="form-control" id="icon2" name="icon2" />
                        </div>
                         <div class="form-group ">
                            <label class="col-form-label ">Count</label>
                            <input type="text" class="form-control onlyNumber" id="count2" name="count2"  value="{{ $details[0]->count2 }}"/>
                        </div>

                        <div class="form-group ">
                            <label class="col-form-label "><h5>Completed Projects </h5></label>
                            <br>
                            <img src="{{ asset('public/upload/aboutus_section/'.$details[0]->icon3) }}"  alt="Logo" style="height: 50px; width: 100px">
                            <br>
                            <label class="col-form-label ">icon
                            <span>(optional, 50*50)</span></label>

                            <input type="file" accept="image/*" class="form-control" id="icon3" name="icon3" />
                        </div>
                         <div class="form-group ">
                            <label class="col-form-label ">Count</label>
                            <input type="text" class="form-control onlyNumber" id="count3" name="count3"  value="{{ $details[0]->count3 }}"/>
                        </div>

                        <div class="form-group ">
                            <label class="col-form-label "><h5>Technology & Platform</h5></label>
                            <br>
                            <img src="{{ asset('public/upload/aboutus_section/'.$details[0]->icon4) }}"  alt="Logo" style="height: 50px; width: 100px">
                            <br>
                            <label class="col-form-label ">icon
                            <span>(optional, 50*50)</span></label>

                            <input type="file" accept="image/*" class="form-control" id="icon4" name="icon4" />
                        </div>
                         <div class="form-group ">
                            <label class="col-form-label ">Count</label>
                            <input type="text" class="form-control onlyNumber" id="count4" name="count4"  value="{{ $details[0]->count4 }}"/>
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
