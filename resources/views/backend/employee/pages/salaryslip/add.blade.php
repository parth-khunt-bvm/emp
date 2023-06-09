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

                                <div class="col-4">
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

                                <div class="col-4">
                                    <div class="form-group">
                                        <label>Year<span class="text-danger">*</span></label>
                                        <select class="form-control" name="year" id="year" >
                                            <option  value="">Select Salary Slip Year </option>

                                            @for($i = 2015; $i <= date("Y") ; $i++)
                                                <option  value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="form-group">
                                        <label>Pay Salary Date</label>
                                        <input type="date" class="form-control" name="pay_salary" placeholder="Please enter your Pay Salary date"  />
                                    </div>
                                </div>


                            </div>
                        </div>

                        <div class="col-12">
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="" for="exampleSelect1">BASIC SALARY <span class="text-danger">*</span></label>
                                        <input class="form-control " type="number" id="basic" value="0" name="basic">
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="" for="exampleSelect1">WORKING DAY <span class="text-danger">*</span></label>
                                        <input class="form-control " type="number" id="wd" value="0" name="wd">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="" for="exampleSelect1">Loss Of Pay(LOP) <span class="text-danger">*</span></label>
                                        <input class="form-control " type="number" id="lop" value="0" name="lop">
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
                                        <input class="form-control " type="number" id="hra_pr" value="0" name="hra_pr">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>HOUSE RENT ALLOWANCE(Amount) <span class="text-danger">*</span></label>
                                        <input class="form-control " type="number" id="hra" value="0" name="hra">
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
                                        <input class="form-control " type="number" id="income_tax_pr" value="0" name="income_tax_pr">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Income Tax(Amount) <span class="text-danger">*</span></label>
                                        <input class="form-control " type="number" id="income_tax" value="0" name="income_tax">
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
                                        <input class="form-control " type="number" id="pf_pr" value="0" name="pf_pr">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Provident Fund (Amount) <span class="text-danger">*</span></label>
                                        <input class="form-control " type="number" id="pf" value="0" name="pf">
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
                                        <input class="form-control " type="number" id="pro_tax_pr" value="0" name="pro_tax_pr">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>PROFESSIONAL Tax(Amount) <span class="text-danger">*</span></label>
                                        <input class="form-control " type="number" id="pro_tax" value="0" name="pro_tax">
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
