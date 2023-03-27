@extends('backend.layout.layout')
@section('section')

<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container">
       <div class="row">
          <div class="col-lg-12">
             <!--begin::Card-->
             <div class="card card-custom gutter-b example example-compact">
                <div class="card-header">
                   <h3 class="card-title">Update Social Media Details</h3>
                </div>
                <!--begin::Form-->
                <form class="form" id="social_media_form" method="POST">@csrf
                   <div class="card-body">

                        <div class="form-group">
                            <label class="form-control-label">Facebook Link
                            <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="Please enter facebook link" name="facebook" value="{{ $details[0]->facebook }}"/>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Twitter Link
                            <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="Please enter twitter link" name="twitter" value="{{ $details[0]->twitter }}"/>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Instagram Link
                            <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="Please enter instagram link" name="instagram" value="{{ $details[0]->instagram }}"/>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Linkedin Link
                            <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="Please enter linkedin link" name="linkedin" value="{{ $details[0]->linkedin }}"/>
                        </div>
                   </div>
                   <div class="card-footer">
                      <button type="submit" class="btn btn-success font-weight-bold mr-2 submitbtn">Submit</button>
                      <button type="reset" class="btn btn-light-success font-weight-bold">Reset</button>
                   </div>
                </form>
                <!--end::Form-->
             </div>
             <!--end::Card-->

          </div>
       </div>
    </div>
</div>
@endsection
