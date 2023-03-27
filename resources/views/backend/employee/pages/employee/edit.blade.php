@extends('backend.employee.layout.layout')
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
                <form class="form" id="edit-employee" method="POST" enctype="multipart/form-data">@csrf
                    <input type="hidden" class="form-control" name="empEditId" placeholder="Please enter your employee number" value="{{ $employeeDetails[0]->id }}" />
                    <div class="card-body">

                        <div class="row">
                            <div class="col-xl-6">
                                <!--begin::Input-->
                                <div class="form-group">
                                    <label>Employee Number</label>
                                    <input type="text" class="form-control" name="empNo" placeholder="Please enter your employee number" value="{{ $details[0]->emp_no }}" disabled="disabled" />
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
                                    <input type="text" class="form-control" name="empFirstName" value="{{ $details[0]->firstname }}" placeholder="Please enter your employee first name"  />
                                </div>
                                <!--end::Input-->
                            </div>
                            <div class="col-xl-6">
                                <!--begin::Input-->
                                <div class="form-group">
                                    <label>Employee father/husband name & surname</label>
                                    <input type="text" class="form-control" name="empLastName" value="{{ $details[0]->lastname }}" placeholder="Please enter your employee father/husband name & surname"/>
                                </div>
                                <!--end::Input-->
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xl-6">
                                <!--begin::Input-->
                                <div class="form-group">
                                    <label>Employee Email</label>
                                    <input type="text" class="form-control" name="empEmail" value="{{ $details[0]->email }}" placeholder="Please enter your employee email"/>
                                </div>
                                <!--end::Input-->
                            </div>

                            <div class="col-xl-6">
                                <!--begin::Input-->
                                <div class="form-group">
                                    <label>Employee Date of Birth</label>
                                    <input type="date" class="form-control" name="empDob" value="{{ $details[0]->dob }}" placeholder="Please enter your employee date of birth"  />
                                </div>
                                <!--end::Input-->
                            </div>

                        </div>



                        <div class="row">
                            <div class="col-xl-6">
                                <!--begin::Input-->
                                <div class="form-group">
                                    <label>Employee Mobile No</label>
                                    <input type="text" class="form-control onlyNumber" name="empMobileNo" value="{{ $details[0]->mobileno }}"placeholder="Please enter your employee mobile no"  />
                                </div>
                                <!--end::Input-->
                            </div>
                            <div class="col-xl-6">
                                <!--begin::Input-->
                                <div class="form-group">
                                    <label>Employee emergency contact no (Like : Father No, Husband/Wife no)</label>
                                    <input type="text" class="form-control onlyNumber" name="empEmrNo" value="{{ $details[0]->emergencyno }}" placeholder="Please enter emergency contact no"/>
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
                                        <input type="radio" name="empgender" {{ $details[0]->gender == 'M' ? 'checked="checked"' : '' }} checked="checked" value="M">
                                        <span></span>Male</label>
                                        <label class="radio radio-success">
                                        <input type="radio" name="empgender" {{ $details[0]->gender == 'F' ? 'checked="checked"' : '' }} value="F">
                                        <span></span>Female</label>
                                        <label class="radio radio-success">
                                        <input type="radio" name="empgender" {{ $details[0]->gender == 'O' ? 'checked="checked"' : '' }} value="O">
                                        <span></span>Others</label>
                                    </div>

                                </div>
                                <!--end::Input-->
                            </div>

                            <div class="col-xl-6">
                                <!--begin::Input-->
                                <div class="form-group">
                                    <label>Employee Salary</label>
                                    <input type="text" class="form-control onlyNumber" name="empSalary" value="{{ $details[0]->salary }}" placeholder="Please enter your employee salary"  />
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
                                            <option  value="{{ $val['id'] }}" {{ $details[0]->department == $val['id'] ? 'selected="selected"' : '' }}>{{ $val['department'] }}</option>
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
                                        @foreach ($designationList as $key => $val)
                                            <option {{  $employeeDetails[0]->designation == $val['id'] ? 'selected="selected"':'' }}  value="{{ $val['id'] }}">{{ $val['designation'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <!--end::Input-->
                            </div>
                        </div>
                         <!--begin::Input-->
                         <div class="form-group">
                            <label>Employee Address (Ex: A-111 ABC Height, Near xyz Circle , PQR road)</label>
                            <textarea class="form-control" name="empAddress" placeholder="Please enter employee address">{{ $details[0]->address }}</textarea>
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
                                            <option {{  $employeeDetails[0]->country == $value['id'] ? 'selected="selected"':'' }} value="{{ $value['id'] }}">{{ $value['name'] }}</option>
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
                                        @foreach ($statelist as $key => $value)
                                            <option {{  $employeeDetails[0]->state == $value['id'] ? 'selected="selected"':'' }} value="{{ $value['id'] }}">{{ $value['name'] }}</option>
                                        @endforeach
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
                                        @foreach ($citylist as $key => $value)
                                            <option {{  $employeeDetails[0]->city == $value['id'] ? 'selected="selected"':'' }} value="{{ $value['id'] }}">{{ $value['name'] }}</option>
                                        @endforeach
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
                                    <textarea class="form-control" name="empnotes" placeholder="Please enter employee notes">{{ $details[0]->notes }}</textarea>
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
