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
                <form class="form" id="edit-salary-slip-form" method="POST">@csrf

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
                                            <option value="{{ $value->id }}" {{ $salarySlipDetails[0]->empDepartment == $value->id ? 'selected="selected"': '' }}>{{ $value->department }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="form-group">
                                        <label>Designation<span class="text-danger">*</span></label>
                                        <select class="form-control" name="empDesignation" id="empDesignation">
                                            <option  value="">Select employee designation</option>
                                            @foreach($designationList as $key => $value)
                                                <option value="{{ $value->id }}" {{ $salarySlipDetails[0]->empDesignation == $value->id ? 'selected="selected"': '' }}>{{ $value->designation }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="form-group">
                                        <label>Employee<span class="text-danger">*</span></label>
                                        <select class="form-control" name="employee" id="employee">
                                            <option  value="">Select Employee </option>
                                            @foreach($employeeList as $key => $value)
                                                <option value="{{ $value->id }}" {{ $salarySlipDetails[0]->employee == $value->id ? 'selected="selected"': '' }}>{{ $value->firstname ." ". $value->lastname ." (". $value->emp_no .")" }}</option>
                                            @endforeach
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
                                            <option  {{ $salarySlipDetails[0]->month == 1 ? 'selected="selected"': '' }} value="1">January </option>
                                            <option  {{ $salarySlipDetails[0]->month == 2 ? 'selected="selected"': '' }} value="2">February </option>
                                            <option  {{ $salarySlipDetails[0]->month == 3 ? 'selected="selected"': '' }} value="3">March </option>
                                            <option  {{ $salarySlipDetails[0]->month == 4 ? 'selected="selected"': '' }} value="4">April </option>
                                            <option  {{ $salarySlipDetails[0]->month == 5 ? 'selected="selected"': '' }} value="5">May </option>
                                            <option  {{ $salarySlipDetails[0]->month == 6 ? 'selected="selected"': '' }} value="6">June </option>
                                            <option  {{ $salarySlipDetails[0]->month == 7 ? 'selected="selected"': '' }} value="7">July </option>
                                            <option  {{ $salarySlipDetails[0]->month == 8 ? 'selected="selected"': '' }} value="8">August </option>
                                            <option  {{ $salarySlipDetails[0]->month == 9 ? 'selected="selected"': '' }} value="9">September </option>
                                            <option  {{ $salarySlipDetails[0]->month == 10 ? 'selected="selected"': '' }} value="10">October </option>
                                            <option  {{ $salarySlipDetails[0]->month == 11 ? 'selected="selected"': '' }} value="11">November </option>
                                            <option  {{ $salarySlipDetails[0]->month == 12 ? 'selected="selected"': '' }} value="12">December </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Year<span class="text-danger">*</span></label>
                                        <select class="form-control" name="year" id="year" >
                                            <option  value="">Select Salary Slip Year </option>

                                            @for($i = 2015; $i <= date("Y") ; $i++)
                                                <option  value="{{ $i }}"  {{ $salarySlipDetails[0]->year == $i  ? 'selected="selected"': '' }} >{{ $i }}</option>
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
                                        <input class="form-control " type="number" id="wd" value="{{ $salarySlipDetails[0]->wd }}" name="wd">
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="form-group">
                                        <label>WO <span class="text-danger">*</span></label>
                                        <input class="form-control " type="number" id="wo" value="{{ $salarySlipDetails[0]->wo }}" name="wo">
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="form-group">
                                        <label>PH <span class="text-danger">*</span></label>
                                        <input class="form-control " type="number" id="ph" value="{{ $salarySlipDetails[0]->ph }}" name="ph">
                                        <input class="form-control " type="hidden" id="editId" value="{{ $salarySlipDetails[0]->id }}" name="editId">
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-12">
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="" for="exampleSelect1">PD <span class="text-danger">*</span></label>
                                        <input class="form-control " type="number" id="pd" value="{{ $salarySlipDetails[0]->pd }}" name="pd">
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="form-group">
                                        <label>LWP <span class="text-danger">*</span></label>
                                        <input class="form-control " type="number" id="lwp" value="{{ $salarySlipDetails[0]->lwp }}" name="lwp">
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
                                        <input class="form-control " type="number" id="basic" value="{{ $salarySlipDetails[0]->basic }}" name="basic">
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="form-group">
                                        <label>HRA <span class="text-danger">*</span></label>
                                        <input class="form-control " type="number" id="hra" value="{{ $salarySlipDetails[0]->hra }}" name="hra">
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="form-group">
                                        <label>LEAVE ENCASH <span class="text-danger">*</span></label>
                                        <input class="form-control " type="number" id="leave_encash" value="{{ $salarySlipDetails[0]->leave_encash }}" name="leave_encash">
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-12">
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="" for="exampleSelect1">PRODUC <span class="text-danger">*</span></label>
                                        <input class="form-control " type="number" id="produc" value="{{ $salarySlipDetails[0]->produc }}" name="produc">
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="form-group">
                                        <label>CONVEI <span class="text-danger">*</span></label>
                                        <input class="form-control " type="number" id="convei" value="{{ $salarySlipDetails[0]->convei }}" name="convei">
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="form-group">
                                        <label>TRANSPORT <span class="text-danger">*</span></label>
                                        <input class="form-control " type="number" id="transport" value="{{ $salarySlipDetails[0]->transport }}" name="transport">
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
                                        <input class="form-control " type="number" id="pf" value="{{ $salarySlipDetails[0]->pf }}" name="pf">
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="form-group">
                                        <label>ESI <span class="text-danger">*</span></label>
                                        <input class="form-control " type="number" id="esi" value="{{ $salarySlipDetails[0]->esi }}" name="esi">
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="form-group">
                                        <label>P.T. <span class="text-danger">*</span></label>
                                        <input class="form-control " type="number" id="pt" value="{{ $salarySlipDetails[0]->pt }}" name="pt">
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-12">
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="" for="exampleSelect1">TDS <span class="text-danger">*</span></label>
                                        <input class="form-control " type="number" id="tds" value="{{ $salarySlipDetails[0]->tds }}" name="tds">
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="form-group">
                                        <label>OTHER DEDUCTION<span class="text-danger">*</span></label>
                                        <input class="form-control " type="number" id="other" value="{{ $salarySlipDetails[0]->other }}" name="other">
                                    </div>
                                </div>

                            </div>
                        </div>


                        <div class="card-footer" style="padding-left: 15px !important">
                            <button type="submit" class="btn btn-primary font-weight-bold mr-2">Update Salary Slip</button>
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
