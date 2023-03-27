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
                <form class="form" id="edit-technologies-form" method="POST">@csrf
                    <input type="hidden" id="id" name="id" value="{{ $details[0]->id }}">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleSelect1">Technology Category
                                <span class="text-danger">*</span></label>
                            <select class="form-control"  id="technologies" name="technologies">
                                <option value="">Select Technology Category </option>
                                @foreach($categroy as $key => $value)
                                <option value="{{ $value->id }}" {{ $details[0]->category ==  $value->id ? "selected='selected'" : "" }}>{{ $value->category }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="col-form-label ">Technology Image (Size : 80px * 80px)</label>
                                <br><br>
                                    <img class="bg-blue" src="{{ asset('public/upload/technologies/'.$details[0]->image) }}" alt="icon" style="width: 50px ;height: 50px ">
                                <br><br>
                            <input type="file" class="form-control" id="image" name="image"  />
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
