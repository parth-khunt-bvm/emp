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
    <div class="container">
        <div class="card card-custom">
            <div class="card-body p-0">
                <!--begin: Wizard-->
                <div class="wizard wizard-3" id="kt_wizard_v3" data-wizard-state="step-first" data-wizard-clickable="true">
                    <!--begin: Wizard Nav-->
                    <div class="wizard-nav">
                        <div class="wizard-steps px-8 py-8 px-lg-15 py-lg-3">
                            <!--begin::Wizard Step 1 Nav-->
                            <div class="wizard-step" data-wizard-type="step" data-wizard-state="current">
                                <div class="wizard-label">
                                    <h3 class="wizard-title">
                                    <span>1.</span>Basic Details</h3>
                                    <div class="wizard-bar"></div>
                                </div>
                            </div>
                            <!--end::Wizard Step 1 Nav-->
                            <!--begin::Wizard Step 2 Nav-->
                            <div class="wizard-step" data-wizard-type="step">
                                <div class="wizard-label">
                                    <h3 class="wizard-title">
                                    <span>2.</span>Address & Education Details</h3>
                                    <div class="wizard-bar"></div>
                                </div>
                            </div>
                            <!--end::Wizard Step 2 Nav-->
                            <!--begin::Wizard Step 3 Nav-->
                            <div class="wizard-step" data-wizard-type="step">
                                <div class="wizard-label">
                                    <h3 class="wizard-title">
                                    <span>3.</span>Employee Work Details </h3>
                                    <div class="wizard-bar"></div>
                                </div>
                            </div>
                            <!--end::Wizard Step 3 Nav-->
                            <!--begin::Wizard Step 4 Nav-->
                            <div class="wizard-step" data-wizard-type="step">
                                <div class="wizard-label">
                                    <h3 class="wizard-title">
                                    <span>4.</span>Employee Bank Details</h3>
                                    <div class="wizard-bar"></div>
                                </div>
                            </div>
                            <!--end::Wizard Step 4 Nav-->
                        </div>
                    </div>
                    <!--end: Wizard Nav-->
                    <!--begin: Wizard Body-->
                    <div class="row justify-content-center py-10 px-8 py-lg-12 px-lg-10">
                        <div class="col-xl-12 col-xxl-7">
                            <!--begin: Wizard Form-->
                            <form class="form" id="kt_form" method="POST" enctype="multipart/form-data">@csrf
                                <!--begin: Wizard Step 1-->
                                <input type="hidden" class="form-control" name="empNoNew" placeholder="Please enter your employee number" value="{{ $emp_no }}" />
                                <div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">
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

                                    </div>

                                </div>
                                <!--end: Wizard Step 1-->


                                <!--begin: Wizard Step 2-->
                                <div class="pb-5" data-wizard-type="step-content">


                                    <div class="row">
                                        <div class="col-xl-6">
                                            <!--begin::Input-->
                                            <div class="form-group">
                                                <label>Education (Ex. B.tech,B.E., MCA , BCA ) </label>
                                                <input type="text" class="form-control" name="empEducation" placeholder="Please enter your employee education"  />
                                            </div>
                                            <!--end::Input-->
                                        </div>
                                        <div class="col-xl-6">
                                            <!--begin::Input-->
                                            <div class="form-group">
                                                <label>Education passsing year</label>
                                                <select class="form-control" name="empPassingYear" id="empPassingYear">
                                                    <option  value="">Select employee passing year</option>
                                                    @for($i = 2005; $i < date('Y') + 3  ; $i++)
                                                        <option  value="{{ $i }}">{{ $i }}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                            <!--end::Input-->
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-xl-6">
                                            <!--begin::Input-->
                                            <div class="form-group">
                                                <label>College/Institute Name</label>
                                                <input type="text" class="form-control" name="empCollageName" placeholder="Please enter your employee college/institute name"  />
                                            </div>
                                            <!--end::Input-->
                                        </div>
                                        <div class="col-xl-6">
                                            <!--begin::Input-->
                                            <div class="form-group">
                                                <label>No of yeras experience</label>
                                                <select class="form-control" name="empExperience" id="empExperience">
                                                    <option  value="">Select employee no of yeras experience</option>
                                                    @for($i = 0; $i < 20 ; $i++)
                                                        <option  value="{{ $i }}">{{ $i }}</option>
                                                    @endfor
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
                                </div>
                                <!--end: Wizard Step 2-->
                                <!--begin: Wizard Step 3-->
                                <div class="pb-5" data-wizard-type="step-content">
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

                                    <div class="row">
                                        <div class="col-xl-6">
                                            <!--begin::Input-->
                                            <div class="form-group">
                                                <label>Employee Salary</label>
                                                <input type="text" class="form-control onlyNumber" name="empSalary" placeholder="Please enter your employee salary"  />
                                            </div>
                                            <!--end::Input-->
                                        </div>
                                        <div class="col-xl-6">
                                            <!--begin::Input-->
                                            <div class="form-group">
                                                <label>Date of Joining</label>
                                                <input type="date" class="form-control" name="empDoj" placeholder="Please enter your employee date of joining"  />
                                            </div>
                                            <!--end::Input-->
                                        </div>
                                    </div>
                                </div>
                                <!--end: Wizard Step 3-->

                                <!--begin: Wizard Step 4-->
                                <div class="pb-5" data-wizard-type="step-content">

                                    <div class="my-5">
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <!--begin::Input-->
                                                <div class="form-group">
                                                    <label>Employee Aadhar Card Number</label>
                                                    <input type="text" class="form-control onlyNumber" name="empAadharCard" placeholder="Please enter your employee aadhar card number"  />
                                                </div>
                                                <!--end::Input-->
                                            </div>
                                            <div class="col-xl-6">
                                                <!--begin::Input-->
                                                <div class="form-group">
                                                    <label>Employee Pan Card Number</label>
                                                    <input type="text" class="form-control" name="empPanCard" placeholder="Please enter your employee pan card number"  />
                                                </div>
                                                <!--end::Input-->
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-xl-6">
                                                <!--begin::Input-->
                                                <div class="form-group">
                                                    <label>Bank Name</label>
                                                    <input type="text" class="form-control " name="empBank" placeholder="Please enter bank name"  />
                                                </div>
                                                <!--end::Input-->
                                            </div>

                                            <div class="col-xl-6">
                                                <!--begin::Input-->
                                                <div class="form-group">
                                                    <label>Bank Branch name</label>
                                                    <input type="text" class="form-control" name="empBranch" placeholder="Please enter bank branch name"  />
                                                </div>
                                                <!--end::Input-->
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-xl-6">
                                                <!--begin::Input-->
                                                <div class="form-group">
                                                    <label>IFSC Code</label>
                                                    <input type="text" class="form-control " name="empIfsc" placeholder="Please enter IFSC Code"  />
                                                </div>
                                                <!--end::Input-->
                                            </div>


                                            <div class="col-xl-6">
                                                <!--begin::Input-->
                                                <div class="form-group">
                                                    <label>Bank account number</label>
                                                    <input type="text" class="form-control" name="empAccount" placeholder="Please enter bank account number"  />
                                                </div>
                                                <!--end::Input-->
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-xl-6">
                                                <!--begin::Input-->
                                                <div class="form-group">
                                                    <label>P.F. No</label>
                                                    <input type="text" class="form-control " name="empPfno" placeholder="Please enter employee P.F. No"  />
                                                </div>
                                                <!--end::Input-->
                                            </div>
                                            <div class="col-xl-6">
                                                <!--begin::Input-->
                                                <div class="form-group">
                                                    <label>ESI No</label>
                                                    <input type="text" class="form-control" name="empEsl" placeholder="Please enter employee ESI No"  />
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
                                </div>
                                <!--end: Wizard Step 4-->
                                <!--begin: Wizard Actions-->
                                <div class="d-flex justify-content-between border-top mt-5 pt-10">
                                    <div class="mr-2">
                                        <button type="button" class="btn btn-light-primary font-weight-bolder text-uppercase px-9 py-4" data-wizard-type="action-prev">Previous</button>
                                    </div>
                                    <div>
                                        <button type="submit" class="btn btn-success submitbtn font-weight-bolder text-uppercase px-9 py-4" data-wizard-type="action-submit">Submit</button>
                                        <button type="button" class="btn btn-primary font-weight-bolder text-uppercase px-9 py-4" data-wizard-type="action-next">Next</button>
                                    </div>
                                </div>
                                <!--end: Wizard Actions-->
                            </form>
                            <!--end: Wizard Form-->
                        </div>
                    </div>
                    <!--end: Wizard Body-->
                </div>
                <!--end: Wizard-->
            </div>
        </div>
    </div>
    <!--end::Container-->
</div>
<!--end::Entry-->
@endsection
