@extends('backend.employee.layout.layout')
@section('section')
<!--begin::Entry-->
<div class="d-flex flex-column-fluid">
   <!--begin::Container-->
   <div class="container">
      <!--begin::Card-->
      <div class="card card-custom gutter-b">
         <div class="card-body">
            <!--begin::Details-->
            <div class="d-flex mb-9">
               <!--begin: Pic-->
               <div class="flex-shrink-0 mr-7 mt-lg-0 mt-3">
                  <div class="symbol symbol-50 symbol-lg-120">
                     @php
                     if($employeeDetails[0]->image != null || $employeeDetails[0]->image != ''){
                     if(file_exists( public_path().'/upload/employeeImage/'.$employeeDetails[0]->image) ){
                     $image = url("public/upload/employeeImage/" . $employeeDetails[0]->image);
                     }else{
                     if( $employeeDetails[0]->gender == 'M'){
                     $image = url("public/upload/employeeImage/male.png");
                     }else{
                     if( $employeeDetails[0]->gender == 'F'){
                     $image = url("public/upload/employeeImage/female.png");
                     }else{
                     $image = url("public/upload/employeeImage/other.png");
                     }
                     }
                     }
                     }else{
                     if( $employeeDetails[0]->gender == 'M'){
                     $image = url("public/upload/employeeImage/male.png");
                     }else{
                     if( $employeeDetails[0]->gender == 'F'){
                     $image = url("public/upload/employeeImage/female.png");
                     }else{
                     $image = url("public/upload/employeeImage/other.png");
                     }
                     }
                     }
                     @endphp
                     <img src="{{ $image  }}" alt="image" />
                  </div>
                  <div class="symbol symbol-50 symbol-lg-120 symbol-primary d-none">
                     <span class="font-size-h3 symbol-label font-weight-boldest">JM</span>
                  </div>
               </div>
               <!--end::Pic-->
               <!--begin::Info-->
               <div class="flex-grow-1">
                  <!--begin::Title-->
                  <div class="d-flex justify-content-between flex-wrap mt-1">
                     <div class="d-flex mr-3">
                        <a href="#" class="text-dark-75 text-hover-primary font-size-h5 font-weight-bold mr-3">{{  $employeeDetails[0]->firstname }} {{ $employeeDetails[0]->lastname }}</a>
                     </div>
                  </div>
                  <!--end::Title-->
                  <!--begin::Content-->
                  <div class="d-flex flex-wrap justify-content-between mt-1">
                     <div class="d-flex flex-column flex-grow-1 pr-8">
                        <div class="d-flex flex-wrap mb-4">
                           <a href="#" class="text-dark-50 text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                           <i class="fa fa-angle-double-right mr-2 font-size-lg"></i>{{  $employeeDetails[0]->emp_no }}</a>
                           <a href="#" class="text-dark-50 text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                           <i class="fa fa-birthday-cake mr-2 font-size-lg"></i>{{  date("d F ,Y", strtotime($employeeDetails[0]->dob)) }}</a>
                        </div>
                        <div class="d-flex flex-wrap mb-4">
                           <a href="#" class="text-dark-50 text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                           <i class="fa fa-envelope-open mr-2 font-size-lg"></i>{{  $employeeDetails[0]->email }}</a>
                           <a href="#" class="text-dark-50 text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                           <i class="fa fa-phone mr-2 font-size-lg"></i>{{  $employeeDetails[0]->mobileno }}</a>
                           <a href="#" class="text-dark-50 text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                           <i class="fa fa-ambulance mr-2 font-size-lg"></i>{{  $employeeDetails[0]->emergencyno }}</a>
                        </div>
                        <div class="d-flex flex-wrap mb-4">
                           <a href="#" class="text-dark-50 text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                           <i class="fa fa-user mr-2 font-size-lg"></i>{{  $employeeDetails[0]->designation }}</a>
                           <a href="#" class="text-dark-50 text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                           <i class="fa fa-map-pin mr-2 font-size-lg"></i>{{  $employeeDetails[0]->city }} , {{  $employeeDetails[0]->state }} , {{  $employeeDetails[0]->country }}
                           </a>
                           <a href="#" class="text-dark-50 text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                           <i class="fa fa-location-arrow mr-2 font-size-lg"></i>
                           @if ($employeeDetails[0]->gender == "F")
                           {{ "Female" }}
                           @endif
                           @if ($employeeDetails[0]->gender == "M")
                           {{ "Male" }}
                           @endif
                           @if ($employeeDetails[0]->gender == "O")
                           {{ "Others" }}
                           @endif
                           </a>
                        </div>
                     </div>
                  </div>
                  <!--end::Content-->
               </div>
               <!--end::Info-->
            </div>
            <!--end::Details-->
            <br>
            <div class="mt-5">
               <h3 class="card-title align-items-start flex-column">
                  <span class="card-label font-weight-bolder text-dark">Basic Details</span>
                  <div class="separator separator-solid mt-3"></div>
               </h3>
            </div>
            <div class="d-flex align-items-center flex-wrap mt-3">
               <div class="col-xl-12">
                  <div class="row">
                     <div class="col-xl-3">
                        <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2">
                           <div class="d-flex flex-column text-dark-75">
                              <span class="font-weight-bolder font-size-sm">Number</span>
                              <span >
                              {{  $employeeDetails[0]->emp_no }}</span>
                           </div>
                        </div>
                     </div>
                     <div class="col-xl-3">
                        <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2">
                           <div class="d-flex flex-column text-dark-75">
                              <span class="font-weight-bolder font-size-sm">First name</span>
                              <span>
                              {{  $employeeDetails[0]->firstname }}</span>
                           </div>
                        </div>
                     </div>
                     <div class="col-xl-3">
                        <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2">
                           <div class="d-flex flex-column text-dark-75">
                              <span class="font-weight-bolder font-size-sm">Last name</span>
                              <span>
                              {{ $employeeDetails[0]->lastname }}
                              </span>
                           </div>
                        </div>
                     </div>
                     <div class="col-xl-3">
                        <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2">
                           <div class="d-flex flex-column flex-lg-fill">
                              <span class="text-dark-75 font-weight-bolder font-size-sm">Email</span>
                              <span>
                              {{  $employeeDetails[0]->email }}
                              </span>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!--begin::Items-->
            <!--begin::Items-->
            <div class="d-flex align-items-center flex-wrap mt-8">
               <div class="col-xl-12">
                  <div class="row">
                     <div class="col-xl-3">
                        <!--begin::Item-->
                        <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2">
                           <div class="d-flex flex-column flex-lg-fill">
                              <span class="text-dark-75 font-weight-bolder font-size-sm">Birthdate</span>
                              <span>
                              {{  date("d F ,Y", strtotime($employeeDetails[0]->dob)) }}
                              </span>
                           </div>
                        </div>
                        <!--end::Item-->
                     </div>
                     <div class="col-xl-3">
                        <!--begin::Item-->
                        <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2">
                           <div class="d-flex flex-column">
                              <span class="text-dark-75 font-weight-bolder font-size-sm">Mobile number</span>
                              <span>
                              {{ $employeeDetails[0]->mobileno }}
                              </span>
                           </div>
                        </div>
                        <!--end::Item-->
                     </div>
                     <div class="col-xl-3">
                        <!--begin::Item-->
                        <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2">
                           <div class="d-flex flex-column">
                              <span class="text-dark-75 font-weight-bolder font-size-sm">Emerg contact number</span>
                              <span>
                              {{ $employeeDetails[0]->emergencyno }}
                              </span>
                           </div>
                        </div>
                        <!--end::Item-->
                     </div>
                     <div class="col-xl-3">
                        <!--begin::Item-->
                        <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2">
                           <div class="d-flex flex-column">
                              <span class="text-dark-75 font-weight-bolder font-size-sm">Gender</span>
                              <span>
                              @if ($employeeDetails[0]->gender == "F")
                              {{ "Female" }}
                              @endif
                              @if ($employeeDetails[0]->gender == "M")
                              {{ "Male" }}
                              @endif
                              @if ($employeeDetails[0]->gender == "O")
                              {{ "Others" }}
                              @endif
                              </span>
                           </div>
                        </div>
                        <!--end::Item-->
                     </div>
                  </div>
               </div>
            </div>
            <!--begin::Items-->
            <br>


            <!--begin::Items-->
            <div class="mt-5">
               <h3 class="card-title align-items-start flex-column">
                  <span class="card-label font-weight-bolder text-dark">Address & Education Details</span>
                  <div class="separator separator-solid mt-3"></div>
               </h3>
            </div>
            <!--begin::Items-->
            <div class="d-flex align-items-center flex-wrap mt-8">
               <div class="col-xl-12">
                  <div class="row">
                     <div class="col-xl-3">
                        <!--begin::Item-->
                        <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2">
                           <div class="d-flex flex-column text-dark-75">
                              <span class="font-weight-bolder font-size-sm">Education</span>
                              <span >
                              {{  $employeeDetails[0]->education }}</span>
                           </div>
                        </div>
                        <!--end::Item-->
                     </div>
                     <div class="col-xl-3">
                        <!--begin::Item-->
                        <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2">
                           <div class="d-flex flex-column text-dark-75">
                              <span class="font-weight-bolder font-size-sm">Education passsing year</span>
                              <span>
                              {{  $employeeDetails[0]->passingyear }}</span>
                           </div>
                        </div>
                        <!--end::Item-->
                     </div>
                     <div class="col-xl-3">
                        <!--begin::Item-->
                        <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2">
                           <div class="d-flex flex-column text-dark-75">
                              <span class="font-weight-bolder font-size-sm">College/Institute Name</span>
                              <span>
                              {{ $employeeDetails[0]->institute }}
                              </span>
                           </div>
                        </div>
                        <!--end::Item-->
                     </div>
                     <div class="col-xl-3">
                        <!--begin::Item-->
                        <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2">
                           <div class="d-flex flex-column flex-lg-fill">
                              <span class="text-dark-75 font-weight-bolder font-size-sm">No of yeras experience</span>
                              <span>
                              {{  $employeeDetails[0]->experience }}
                              </span>
                           </div>
                        </div>
                        <!--end::Item-->
                     </div>
                  </div>
               </div>
            </div>
            <!--begin::Items-->
            <!--begin::Items-->
            <div class="d-flex align-items-center flex-wrap mt-8">
               <div class="col-xl-12">
                  <div class="row">
                     <div class="col-xl-3">
                        <!--begin::Item-->
                        <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2">
                           <div class="d-flex flex-column flex-lg-fill">
                              <span class="text-dark-75 font-weight-bolder font-size-sm">Employee Address </span>
                              <span>
                              {{  $employeeDetails[0]->address }}
                              </span>
                           </div>
                        </div>
                        <!--end::Item-->
                     </div>
                     <div class="col-xl-3">
                        <!--begin::Item-->
                        <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2">
                           <div class="d-flex flex-column">
                              <span class="text-dark-75 font-weight-bolder font-size-sm">Country</span>
                              <span>
                              {{ $employeeDetails[0]->country }}
                              </span>
                           </div>
                        </div>
                        <!--end::Item-->
                     </div>
                     <div class="col-xl-3">
                        <!--begin::Item-->
                        <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2">
                           <div class="d-flex flex-column">
                              <span class="text-dark-75 font-weight-bolder font-size-sm">State</span>
                              <span>
                              {{ $employeeDetails[0]->state }}
                              </span>
                           </div>
                        </div>
                        <!--end::Item-->
                     </div>
                     <div class="col-xl-3">
                        <!--begin::Item-->
                        <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2">
                           <div class="d-flex flex-column">
                              <span class="text-dark-75 font-weight-bolder font-size-sm">City</span>
                              <span>
                              {{ $employeeDetails[0]->city }}
                              </span>
                           </div>
                        </div>
                        <!--end::Item-->
                     </div>
                  </div>
               </div>
            </div>
            <!--begin::Items-->
            <br>


            <div class="mt-5">
               <h3 class="card-title align-items-start flex-column">
                  <span class="card-label font-weight-bolder text-dark">Employee Work Details</span>
                  <div class="separator separator-solid mt-3"></div>
               </h3>
            </div>
            <!--begin::Items-->
            <div class="d-flex align-items-center flex-wrap mt-8">
               <div class="col-xl-12">
                  <div class="row">
                     <div class="col-xl-3">
                        <!--begin::Item-->
                        <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2">
                           <div class="d-flex flex-column text-dark-75">
                              <span class="font-weight-bolder font-size-sm">Department</span>
                              <span >
                              {{  $employeeDetails[0]->department }}</span>
                           </div>
                        </div>
                        <!--end::Item-->
                     </div>
                     <div class="col-xl-3">
                        <!--begin::Item-->
                        <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2">
                           <div class="d-flex flex-column text-dark-75">
                              <span class="font-weight-bolder font-size-sm">Designation</span>
                              <span>
                              {{  $employeeDetails[0]->designation }}</span>
                           </div>
                        </div>
                        <!--end::Item-->
                     </div>
                     <div class="col-xl-3">
                        <!--begin::Item-->
                        <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2">
                           <div class="d-flex flex-column text-dark-75">
                              <span class="font-weight-bolder font-size-sm">Salary</span>
                              <span>
                              {{ $employeeDetails[0]->salary }}
                              </span>
                           </div>
                        </div>
                        <!--end::Item-->
                     </div>
                     <div class="col-xl-3">
                        <!--begin::Item-->
                        <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2">
                           <div class="d-flex flex-column flex-lg-fill">
                              <span class="text-dark-75 font-weight-bolder font-size-sm">Date of Joining</span>
                              <span>
                              {{  date("d F ,Y", strtotime($employeeDetails[0]->doj)) }}
                              </span>
                           </div>
                        </div>
                        <!--end::Item-->
                     </div>
                  </div>
               </div>
            </div>
            <!--begin::Items-->
            <!--begin::Items-->
            <br>


            <div class="mt-5">
               <h3 class="card-title align-items-start flex-column">
                  <span class="card-label font-weight-bolder text-dark">Employee Bank Details</span>
                  <div class="separator separator-solid mt-3"></div>
               </h3>
            </div>

            <!--begin::Items-->
              <div class="d-flex align-items-center flex-wrap mt-8">
                <div class="col-xl-12">
                   <div class="row">
                      <div class="col-xl-3">
                        <!--begin::Item-->
                        <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2">
                            <div class="d-flex flex-column text-dark-75">
                            <span class="font-weight-bolder font-size-sm">Aadhar Card Number</span>
                            <span >
                            {{  $employeeDetails[0]->aadharcard }}</span>
                            </div>
                        </div>
                        <!--end::Item-->
                      </div>
                      <div class="col-xl-3">
                         <!--begin::Item-->
                        <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2">
                            <div class="d-flex flex-column text-dark-75">
                            <span class="font-weight-bolder font-size-sm">Pan Card Number</span>
                            <span>
                            {{  $employeeDetails[0]->pancard }}</span>
                            </div>
                        </div>
                        <!--end::Item-->
                      </div>
                      <div class="col-xl-3">
                         <!--begin::Item-->
                        <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2">
                            <div class="d-flex flex-column text-dark-75">
                            <span class="font-weight-bolder font-size-sm">Bank Name</span>
                            <span>
                            {{ $employeeDetails[0]->bankname }}
                            </span>
                            </div>
                        </div>
                        <!--end::Item-->
                      </div>
                      <div class="col-xl-3">
                        <!--begin::Item-->
                        <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2">
                            <div class="d-flex flex-column flex-lg-fill">
                            <span class="text-dark-75 font-weight-bolder font-size-sm">Bank Branch name</span>
                            <span>
                            {{  $employeeDetails[0]->branchname  }}
                            </span>
                            </div>
                        </div>
                        <!--end::Item-->
                      </div>
                   </div>
                </div>
             </div>
            <!--begin::Items-->

            <!--begin::Items-->
            <div class="d-flex align-items-center flex-wrap mt-8">
                <div class="col-xl-12">
                    <div class="row">
                        <div class="col-xl-3">
                        <!--begin::Item-->
                        <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2">
                            <div class="d-flex flex-column text-dark-75">
                            <span class="font-weight-bolder font-size-sm">IFSC Code</span>
                            <span >
                            {{  $employeeDetails[0]->ifsccode }}</span>
                            </div>
                        </div>
                        <!--end::Item-->
                        </div>
                        <div class="col-xl-3">
                            <!--begin::Item-->
                        <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2">
                            <div class="d-flex flex-column text-dark-75">
                            <span class="font-weight-bolder font-size-sm">Bank account number</span>
                            <span>
                            {{  $employeeDetails[0]->accountno }}</span>
                            </div>
                        </div>
                        <!--end::Item-->
                        </div>
                        <div class="col-xl-3">
                            <!--begin::Item-->
                        <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2">
                            <div class="d-flex flex-column text-dark-75">
                            <span class="font-weight-bolder font-size-sm">P.F. No</span>
                            <span>
                            {{ $employeeDetails[0]->pfno }}
                            </span>
                            </div>
                        </div>
                        <!--end::Item-->
                        </div>
                        <div class="col-xl-3">
                        <!--begin::Item-->
                        <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2">
                            <div class="d-flex flex-column flex-lg-fill">
                            <span class="text-dark-75 font-weight-bolder font-size-sm">ESI No</span>
                            <span>
                            {{  $employeeDetails[0]->esino  }}
                            </span>
                            </div>
                        </div>
                        <!--end::Item-->
                        </div>
                    </div>
                </div>
            </div>
            <!--begin::Items-->


            <div class="d-flex align-items-center flex-wrap mt-3">
               <!--begin::Item-->
               <div class="col-xl-12">
                <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2">
                    <div class="d-flex flex-column text-dark-75">
                        <span class="font-weight-bolder font-size-sm">Notes</span>
                        <span >
                        {{  $employeeDetails[0]->notes }}</span>
                    </div>
                </div>
               </div>
               <!--end::Item-->
            </div>
            <!--begin::Items-->
         </div>
      </div>
      <!--end::Card-->
   </div>
   <!--end::Container-->
</div>
<!--end::Entry-->
@endsection
