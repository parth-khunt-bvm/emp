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
                <form class="form" id="add-blog-form" method="POST">@csrf

                    <div class="card-body">

                        <div class="form-group">
                            <label for="exampleSelect1">Blog Category <span class="text-danger">*</span></label>
                            <select class="form-control"  id="category_id" name="category_id">
                             <option value="">-- Select -- </option>
                                @foreach($menu as $key => $value)
                                <option value="{{ $value->id }}">{{ $value->name }}</option>                                
                                @endforeach
                            </select>
                           </div>      
                   
                        <div class="form-group ">
                            <label class="col-form-label ">Title (Max  : 30 Characters)
                            <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="title" name="title"  placeholder="Please enter title"/>
                        </div>
                        
                        <div class="form-group ">
                            <label class="col-form-label ">Short Description (Max  : 240 Characters)
                            <span class="text-danger">*</span></label>
                            <textarea class="form-control" id="short_description" name="short_description" placeholder="Please enter short description"></textarea>
                        </div>

                        <div class="form-group ">
                            <label class="col-form-label ">Description 
                            <span class="text-danger">*</span></label>
                            <textarea class="form-control" id="details" name="description" placeholder="Please enter  description"></textarea>
                        </div>
                        
                        
                        <div class="form-group ">
                            <label class="col-form-label ">Image (Size : 320px * 225px)
                            <span class="text-danger">*</span></label>
                            <input type="file" accept="image/*" class="form-control" id="image" name="image"/>
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
