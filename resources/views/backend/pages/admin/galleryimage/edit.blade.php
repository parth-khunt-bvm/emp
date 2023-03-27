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
                <form class="form" id="add-gallery-form" method="POST">@csrf
                    <input type="hidden" class="form-control" id="editId" name="editId"  value="{{  $details[0]->id }}" />
                    <div class="card-body">
                        <div class="form-group ">
                        <label for="exampleSelect1">Portfolio Category <span class="text-danger">*</span></label>
                        <select class="form-control"  id="submenu_id" name="submenu_id">
                         <option value="">-- Select -- </option>
                            @foreach($submenu as $key => $value)
                            <option value="{{ $value->id }}" {{ $value->id == $details[0]->submenu_id ? "selected='selected'" : "" }}>{{ $value->name }}</option>
                            @endforeach

                        </select>
                       </div>

                        <div class="form-group ">
                            <label class="col-form-label ">Portfolio Category Name (Ex : Web Design , App Development)
                            <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="name" name="name" value="{{  $details[0]->name }}" placeholder="Please enter portfolio category"/>
                        </div>

                        <div class="form-group ">
                            <label class="col-form-label ">Portfolio URL
                            <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="url" name="url"  value="{{  $details[0]->name }}" placeholder="Please enter portfolio url"/>
                        </div>

                    <div class="form-group ">
                        <label class="col-form-label ">Portfolio Category Image (Ex : Web Design , App Development)
                        <span class="text-danger">*</span></label><br>
                        <div class="image-input image-input-outline" id="kt_image_1">
                           <div class="image-input-wrapper" style="background-image: url({{asset('public/upload/galleryimage/'.$details[0]->image)}}"></div>
                            <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                                <i class="fa fa-pen icon-sm text-muted"></i>
                                <input type="file" name="image" id="image" accept=".png, .jpg, .jpeg" />
                                <input type="hidden" name="profile_avatar_remove" />
                            </label>
                            <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                                <i class="ki ki-bold-close icon-xs text-muted"></i>
                            </span>
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
