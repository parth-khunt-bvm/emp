@extends('backend.employee.layout.layout')
@section('section')

<!--begin::Entry-->
<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container">

        <!--begin::Card-->
        <div class="card card-custom">
            <div class="card-header">
                <div class="card-title">
                    <h3 class="card-title">{{$header['title']}}</h3>
                </div>
                <div class="card-toolbar">
                    <!--begin::Button-->
                    <a href="{{  route('employee-salaryslip-add') }}" class="btn btn-primary font-weight-bolder">
                    <i class="far fa-plus-square"></i> New Salary Slip</a>
                    <!--end::Button-->
                </div>
            </div>
            <div class="card-body">@csrf
                <!--begin: Datatable-->
                <table class="table table-bordered table-hover table-checkable" id="employee-salary-list" >
                    <thead>
                        <tr>
                            <th>Sr. No</th>
                            <th>Emp. Name</th>
                            <th>Department</th>
                            <th>Designation</th>
                            <th>Month - Year</th>
                            <th>Action</th>
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
