@extends('backend.layout.layout')
@section('section')

<!--begin::Entry-->
<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container">
        <div class="row">

            <div class="col-md-12">

                <!--begin::Card-->
                <div class="card card-custom gutter-b example example-compact">
                    <div class="card-header">
                        <h3 class="card-title">Menu access</h3>
                    </div>
                    <div class="card-body">
                        <!--begin::Form-->
                        <form class="form" id="menuaccess-form" method="POST">@csrf
                            <div class="checkbox-inline row">
                                @foreach ($menuList as $key => $value)
                                    <div class="col-4">
                                        <label class="checkbox checkbox-lg">
                                        <input type="checkbox" {{  $value['is_active'] == "Yes" ? 'checked="checked"':'' }} name="menu[]" value="{{ $value['id'] }}">
                                        <span></span>{{ $value['menu'] }}</label>
                                    </div>
                                @endforeach
                            </div>

                            {{-- <div class="form-group row">
                                @foreach ($menuList as $key => $value)
                                    <div class="col-4">
                                        <input type="checkbox" class="form-control" checked="checked" name="menu[]" value="{{ $value['id'] }}"/>
                                        <label class="col-form-label">{{ $value['menu'] }}</label>

                                        </span>
                                    </div>
                                @endforeach

                            </div> --}}
                            <hr>

                            <div class="row">
                                <div class="col-lg-12 ml-lg-auto">
                                    <button type="submit" class="btn btn-primary font-weight-bold mr-2">Submit</button>
                                    {{-- <button type="reset" class="btn btn-light-primary font-weight-bold">Reset</button> --}}
                                </div>
                            </div>

                        </form>
                        <!--end::Form-->

                    </div>
                </div>
                <!--end::Card-->
            </div>
        </div>
    </div>
    <!--end::Container-->
</div>
<!--end::Entry-->

@endsection
