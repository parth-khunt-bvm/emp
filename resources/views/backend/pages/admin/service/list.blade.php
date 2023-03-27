@extends('backend.layout.layout')
@section('section')

<!--begin::Entry-->
<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container-fluid">

        <!--begin::Card-->
        <div class="card card-custom">
            <div class="card-header">
                <div class="card-title">
                    <h3 class="card-title">{{$header['title']}}</h3>
                </div>
                <div class="card-toolbar">
                    <!--begin::Button-->
                    <a href="{{  route('admin-service-add') }}" class="btn btn-primary font-weight-bolder">
                    <i class="far fa-plus-square"></i> New Service</a>
                    <!--end::Button-->
                </div>
            </div>
            <div class="card-body">@csrf
                <!--begin: Datatable-->
                <table class="table table-bordered table-hover table-checkable" id="service-list" >
                    <thead>
                        <tr>
                            <th>Sr. No</th>
                            <th>Image</th>
                            <th>Icon</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
                <!--end: Datatable-->
            </div>
        </div>
        <!--end::Card-->
    </div>
    <!--end::Container-->
</div>
<!--end::Entry-->

@endsection
