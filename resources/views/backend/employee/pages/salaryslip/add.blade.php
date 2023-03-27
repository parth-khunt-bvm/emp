@extends('backend.employee.layout.layout')
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
                <form class="form" id="add-salary-slip-form" method="POST">@csrf

                    <div class="card-body">
                        <div class="col-12">
                            <h3 class="card-title" >EMPLOYEE DETAILS</h3>
                        </div>

                        <div class="col-12">
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="" for="exampleSelect1">Department <span class="text-danger">*</span></label>
                                        <select class="form-control"  id="empDepartment" name="empDepartment">
                                        <option value="">Select Employee Department</option>
                                            @foreach($menu as $key => $value)
                                            <option value="{{ $value->id }}">{{ $value->department }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="form-group">
                                        <label>Designation<span class="text-danger">*</span></label>
                                        <select class="form-control" name="empDesignation" id="empDesignation">
                                            <option  value="">Select employee designation</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="form-group">
                                        <label>Employee<span class="text-danger">*</span></label>
                                        <select class="form-control" name="employee" id="employee">
                                            <option  value="">Select Employee </option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-12">
                            <div class="row">

                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Month<span class="text-danger">*</span></label>
                                        <select class="form-control" name="month" id="month">
                                            <option  value="">Select Salary Slip Month </option>
                                            <option  value="1">January </option>
                                            <option  value="2">February </option>
                                            <option  value="3">March </option>
                                            <option  value="4">April </option>
                                            <option  value="5">May </option>
                                            <option  value="6">June </option>
                                            <option  value="7">July </option>
                                            <option  value="8">August </option>
                                            <option  value="9">September </option>
                                            <option  value="10">October </option>
                                            <option  value="11">November </option>
                                            <option  value="12">December </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Year<span class="text-danger">*</span></label>
                                        <select class="form-control" name="year" id="year" disabled=true>
                                            <option  value="">Select Salary Slip Year </option>

                                            @for($i = 2015; $i <= date("Y") ; $i++)
                                                <option  value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-12">
                            <h3 class="card-title" >WORKING DETAILS</h3>
                        </div>

                        <div class="col-12">
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="" for="exampleSelect1">WD <span class="text-danger">*</span></label>
                                        <input class="form-control " type="number" id="wd" value="0" name="wd">
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="form-group">
                                        <label>WO <span class="text-danger">*</span></label>
                                        <input class="form-control " type="number" id="wo" value="0" name="wo">
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="form-group">
                                        <label>PH <span class="text-danger">*</span></label>
                                        <input class="form-control " type="number" id="ph" value="0" name="ph">
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-12">
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="" for="exampleSelect1">PD <span class="text-danger">*</span></label>
                                        <input class="form-control " type="number" id="pd" value="0" name="pd">
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="form-group">
                                        <label>LWP <span class="text-danger">*</span></label>
                                        <input class="form-control " type="number" id="lwp" value="0" name="lwp">
                                    </div>
                                </div>

                            </div>
                        </div>


                        <div class="col-12">
                            <h3 class="card-title" >EARNING DETAILS</h3>
                        </div>

                        <div class="col-12">
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="" for="exampleSelect1">BASIC <span class="text-danger">*</span></label>
                                        <input class="form-control " type="number" id="basic" value="0" name="basic">
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="form-group">
                                        <label>HRA <span class="text-danger">*</span></label>
                                        <input class="form-control " type="number" id="hra" value="0" name="hra">
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="form-group">
                                        <label>LEAVE ENCASH <span class="text-danger">*</span></label>
                                        <input class="form-control " type="number" id="leave_encash" value="0" name="leave_encash">
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-12">
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="" for="exampleSelect1">PRODUC <span class="text-danger">*</span></label>
                                        <input class="form-control " type="number" id="produc" value="0" name="produc">
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="form-group">
                                        <label>CONVEI <span class="text-danger">*</span></label>
                                        <input class="form-control " type="number" id="convei" value="0" name="convei">
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="form-group">
                                        <label>TRANSPORT <span class="text-danger">*</span></label>
                                        <input class="form-control " type="number" id="transport" value="0" name="transport">
                                    </div>
                                </div>

                            </div>
                        </div>


                        <div class="col-12">
                            <h3 class="card-title" >DEDUCTION DETAILS</h3>
                        </div>

                        <div class="col-12">
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="" for="exampleSelect1">P.F. <span class="text-danger">*</span></label>
                                        <input class="form-control " type="number" id="pf" value="0" name="pf">
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="form-group">
                                        <label>ESI <span class="text-danger">*</span></label>
                                        <input class="form-control " type="number" id="esi" value="0" name="esi">
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="form-group">
                                        <label>P.T. <span class="text-danger">*</span></label>
                                        <input class="form-control " type="number" id="pt" value="0" name="pt">
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-12">
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="" for="exampleSelect1">TDS <span class="text-danger">*</span></label>
                                        <input class="form-control " type="number" id="tds" value="0" name="tds">
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="form-group">
                                        <label>OTHER DEDUCTION<span class="text-danger">*</span></label>
                                        <input class="form-control " type="number" id="other" value="0" name="other">
                                    </div>
                                </div>

                            </div>
                        </div>


                        <div class="card-footer" style="padding-left: 15px !important">
                            <button type="submit" class="btn btn-primary font-weight-bold mr-2">Create Salary Slip</button>
                            <button type="reset" class="btn btn-light-primary font-weight-bold">Reset</button>
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
