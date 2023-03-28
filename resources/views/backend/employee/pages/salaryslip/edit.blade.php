@extends('backend.employee.layout.layout')
@section('section')
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
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
                <form class="form" id="edit-salary-slip-form" method="POST">@csrf
                    <input class="form-control " type="hidden" id="editId" value="{{ $salarySlipDetails[0]->id }}" name="editId">
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

                                <div class="col-4">
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

                                <div class="col-4">
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

                                <div class="col-4">
                                    <div class="form-group">
                                        <label>Pay Salary Date</label>
                                        <input type="date" class="form-control" name="pay_salary" placeholder="Please enter your Pay Salary date"  value="{{ $salarySlipDetails[0]->pay_date }}"/>
                                    </div>
                                </div>


                            </div>
                        </div>

                        <div class="col-12">
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="" for="exampleSelect1">BASIC SALARY <span class="text-danger">*</span></label>
                                        <input class="form-control " type="number" id="basic"  name="basic" value="{{ $salarySlipDetails[0]->basic }}">
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="" for="exampleSelect1">WORKING DAY <span class="text-danger">*</span></label>
                                        <input class="form-control " type="number" id="wd" value="{{ $salarySlipDetails[0]->wd }}" name="wd">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="" for="exampleSelect1">Loss Of Pay(LOP) <span class="text-danger">*</span></label>
                                        <input class="form-control " type="number" id="lop"  name="lop"  value="{{ $salarySlipDetails[0]->lop }}">
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="col-12">
                            <h3 class="card-title" >HOUSE RENT ALLOWANCE</h3>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>HOUSE RENT ALLOWANCE(%) <span class="text-danger">*</span></label>
                                        <input class="form-control " type="number" id="hra_pr" value="{{ $salarySlipDetails[0]->hra_pr }}" name="hra_pr">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>HOUSE RENT ALLOWANCE(Amount) <span class="text-danger">*</span></label>
                                        <input class="form-control " type="number" id="hra" value="{{ $salarySlipDetails[0]->hra }}" name="hra">
                                    </div>
                                </div>

                            </div>
                        </div>


                        <div class="col-12">
                            <h3 class="card-title" >Income Tax</h3>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Income Tax(%) <span class="text-danger">*</span></label>
                                        <input class="form-control " type="number" id="income_tax_pr" value="{{ $salarySlipDetails[0]->income_tax_pr }}" name="income_tax_pr">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Income Tax(Amount) <span class="text-danger">*</span></label>
                                        <input class="form-control " type="number" id="income_tax" value="{{ $salarySlipDetails[0]->income_tax }}" name="income_tax">
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-12">
                            <h3 class="card-title" >Provident Fund </h3>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Provident Fund (%) <span class="text-danger">*</span></label>
                                        <input class="form-control " type="number" id="pf_pr" value="{{ $salarySlipDetails[0]->pf_pr }}" name="pf_pr">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Provident Fund (Amount) <span class="text-danger">*</span></label>
                                        <input class="form-control " type="number" id="pf" value="{{ $salarySlipDetails[0]->pf }}" name="pf">
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-12">
                            <h3 class="card-title" >PROFESSIONAL Tax</h3>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>PROFESSIONAL Tax(%) <span class="text-danger">*</span></label>
                                        <input class="form-control " type="number" id="pro_tax_pr" value="{{ $salarySlipDetails[0]->pt_pr }}" name="pro_tax_pr">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>PROFESSIONAL Tax(Amount) <span class="text-danger">*</span></label>
                                        <input class="form-control " type="number" id="pro_tax" value="{{ $salarySlipDetails[0]->pt }}" name="pro_tax">
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

<script type="text/javascript">
    $('.date').datepicker({
       format: dd-mm-yyyy'
     });
</script>

@endsection
