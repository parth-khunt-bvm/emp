@extends('backend.employee.layout.layout')
@section('section')
@php
    if($empno[0]->no > 0 && $empno[0]->no < 10){
        $emp_no = "00".$empno[0]->no;
    } else{
        if($empno[0]->no > 9 && $empno[0]->no < 100){
            $emp_no = "0".$empno[0]->no;
        }else{
            $emp_no = $empno[0]->no;
        }
    }
@endphp
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
                <form class="form" id="add-employee" method="POST" enctype="multipart/form-data">@csrf
                    <input type="hidden" class="form-control" name="empNoNew" placeholder="Please enter your employee number" value="{{ $emp_no }}" />
                    <div class="card-body">

                        <div class="row">
                            <div class="col-xl-6">
                                <!--begin::Input-->
                                <div class="form-group">
                                    <label>Employee Number</label>
                                    <input type="text" class="form-control" name="empNo" placeholder="Please enter your employee number" value="{{ $emp_no }}" disabled="disabled" />
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <!--end::Input-->
                                <!--begin::Input-->
                                <div class="form-group">
                                    <label>Employee Image</label>
                                    <input type="file" class="form-control" name="empImage"  />
                                </div>
                            </div>
                        </div>
                        <!--end::Input-->

                        <div class="row">
                            <div class="col-xl-6">
                                <!--begin::Input-->
                                <div class="form-group">
                                    <label>Employee Firstname</label>
                                    <input type="text" class="form-control" name="empFirstName" placeholder="Please enter your employee first name"  />
                                </div>
                                <!--end::Input-->
                            </div>
                            <div class="col-xl-6">
                                <!--begin::Input-->
                                <div class="form-group">
                                    <label>Employee father/husband name & surname</label>
                                    <input type="text" class="form-control" name="empLastName" placeholder="Please enter your employee father/husband name & surname"/>
                                </div>
                                <!--end::Input-->
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xl-6">
                                <!--begin::Input-->
                                <div class="form-group">
                                    <label>Employee Email</label>
                                    <input type="text" class="form-control" name="empEmail" placeholder="Please enter your employee email"/>
                                </div>
                                <!--end::Input-->
                            </div>

                            <div class="col-xl-6">
                                <!--begin::Input-->
                                <div class="form-group">
                                    <label>Employee Date of Birth</label>
                                    <input type="date" class="form-control" name="empDob" placeholder="Please enter your employee date of birth"  />
                                </div>
                                <!--end::Input-->
                            </div>

                        </div>



                        <div class="row">
                            <div class="col-xl-6">
                                <!--begin::Input-->
                                <div class="form-group">
                                    <label>Employee Mobile No</label>
                                    <input type="text" class="form-control onlyNumber" name="empMobileNo" placeholder="Please enter your employee mobile no"  />
                                </div>
                                <!--end::Input-->
                            </div>
                            <div class="col-xl-6">
                                <!--begin::Input-->
                                <div class="form-group">
                                    <label>Employee emergency contact no (Like : Father No, Husband/Wife no)</label>
                                    <input type="text" class="form-control onlyNumber" name="empEmrNo" placeholder="Please enter emergency contact no"/>
                                </div>
                                <!--end::Input-->
                            </div>
                        </div>



                        <div class="row">
                            <div class="col-xl-6">
                                <!--begin::Input-->
                                <div class="form-group">
                                    <label>Employee Gender</label>
                                    <div class="radio-inline">
                                        <label class="radio radio-success">
                                        <input type="radio" name="empgender" checked="checked" value="M">
                                        <span></span>Male</label>
                                        <label class="radio radio-success">
                                        <input type="radio" name="empgender" value="F">
                                        <span></span>Female</label>
                                        <label class="radio radio-success">
                                        <input type="radio" name="empgender" value="O">
                                        <span></span>Others</label>
                                    </div>

                                </div>
                                <!--end::Input-->
                            </div>

                            <div class="col-xl-6">
                                <!--begin::Input-->
                                <div class="form-group">
                                    <label>Employee Salary</label>
                                    <input type="text" class="form-control onlyNumber" name="empSalary" placeholder="Please enter your employee salary"  />
                                </div>
                                <!--end::Input-->
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xl-6">
                                <!--begin::Input-->
                                <div class="form-group">
                                    <label>Department</label>
                                    <select class="form-control" name="empDepartment" id="empDepartment">
                                        <option  value="">Select employee department</option>
                                        @foreach ($departmentList as $key => $val)
                                            <option  value="{{ $val['id'] }}">{{ $val['department'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <!--end::Input-->
                            </div>
                            <div class="col-xl-6">
                                <!--begin::Input-->
                                <div class="form-group">
                                    <label>Designation</label>
                                    <select class="form-control" name="empDesignation" id="empDesignation">
                                        <option  value="">Select employee designation</option>
                                    </select>
                                </div>
                                <!--end::Input-->
                            </div>
                        </div>
                         <!--begin::Input-->
                         <div class="form-group">
                            <label>Employee Address (Ex: A-111 ABC Height, Near xyz Circle , PQR road)</label>
                            <textarea class="form-control" name="empAddress" placeholder="Please enter employee address"></textarea>
                        </div>
                        <!--end::Input-->

                        <div class="row">
                            <div class="col-xl-4">
                                <!--begin::Input-->
                                <div class="form-group">
                                    <label>Select Country</label>
                                    <select class="form-control" name="empCountry" id="empCountry">
                                        <option value="">Please select Employee country</option>
                                        {{-- <option value="101">(+91) India</option> --}}
                                        @foreach ($country as $key => $value)
                                            <option value="{{ $value['id'] }}">{{ $value['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <!--end::Input-->
                            </div>
                            <div class="col-xl-4">
                                <!--begin::Input-->
                                <div class="form-group">
                                    <label>Select State</label>
                                    <select class="form-control" name="empState" id="empState">
                                        <option value="">Please select employee state</option>
                                    </select>
                                </div>
                                <!--end::Input-->
                            </div>
                            <div class="col-xl-4">
                                <!--begin::Input-->
                                <div class="form-group">
                                    <label>Select City</label>
                                    <select class="form-control" name="empCity" id="empCity">
                                        <option value="">Please select employee city</option>
                                    </select>
                                </div>
                                <!--end::Input-->
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-xl-12">
                                <!--begin::Input-->
                                <div class="form-group">
                                    <label>Notes</label>
                                    <textarea class="form-control" name="empnotes" placeholder="Please enter employee notes"></textarea>
                                </div>
                                <!--end::Input-->
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
