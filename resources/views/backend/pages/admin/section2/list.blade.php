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
                    <form class="form" id="edit-form" method="POST" enctype="multipart/form-data">@csrf
                        <div class="card-body">
                            <div class="form-group ">
                                <label class="col-form-label ">Title (Max : 30 Characters)
                                    <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="title" name="title"
                                    placeholder="Please enter title" value="{{  $details[0]->title }}" />
                            </div>


                            <div class="form-group ">
                                <label class="col-form-label ">Description
                                    <span class="text-danger">*</span></label>
                                <textarea class="form-control" id="details" name="description"
                                    placeholder="Please enter description">{{  $details[0]->description }}</textarea>
                            </div>
                            @if(!empty($extraimages[0]))
                            <div style="clear: both; display: table;">

                                @foreach($extraimages as $value)
                                <div style="float: left; width: 33.33%;  padding: 5px;position: relative;">
                                    <img src="{{ asset('public/upload/section/'.$value) }}" alt="main_image"
                                        class="img-fluid" style="width: 100%; height: 350px;">
                                    <button type="button" class="btn btn-danger deleteExterimage"
                                        data-exterimage="{{$value}}" data-toggle="modal" data-target="#deleteModel"
                                        style="position: absolute;top: 6px;right: 20px;" title="Remove Image"><i
                                            class="fa fa-trash" style="color: white"></i></button>
                                </div>
                                @endforeach
                            </div>

                            @endif
                            <br>
                            <div class="form-group">
                                <label class="form-label">Image (Size : 445px * 550px (w*h))</label>
                                <div class="appendDiv">
                                    <div class="row">
                                        <div class="col-9">
                                            <input type="file" class="form-control image validation-file"
                                                name="extra_image[]">
                                        </div>
                                        <div class="col-3">
                                            <button type="button"
                                                class="btn  btn-primary font-weight-bold addImage btn-block"><i
                                                    class="feather icon-plus"></i>Add Image</button>
                                        </div>
                                    </div>
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
