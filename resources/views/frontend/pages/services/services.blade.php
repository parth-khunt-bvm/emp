@extends('frontend.layout.app')
@section('section')

<!-- CONTENT START -->
<section>
    <!-- SERVICE START -->
    @if(!$service->isEmpty())
    <div class="container mt-5 mb-5">
        <div class="row">
            @foreach($service as $key => $value)
            <div class="col-md-6 col-lg-4">
                <div class="sb-washla">
                    <figure class="sb-thumbail"><img src="{{ asset('public/upload/services/'.$value->image) }}" alt="service_image" style="width: 350px ;height: 250px "></figure>
                    <div class="sb-caption">
                        <div class="sb-inner-caption" style="height:210px">
                            <div class="sb-circle-layer">
                                <figure class="sb-center-icon">
                                    <img src="{{ asset('public/upload/services/'.$value->icon) }}" alt="service_image">
                                </figure>
                            </div>
                            <h4>{{  $value->title }}</h4>
                            <p>{{ $value->short_description }}</p>

                        </div>
                        <center>
                            <a class="btn bg-blue"  style="color: white;margin-bottom:15px" href="{{ route("service-details", $value->id) }}">Read More</a>
                        </center>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif
    <!-- SERVICE END -->
    @if(!$testimonials->isEmpty())
    <div class="mb-5" style="padding-top: 100px ; padding-bottom: 100px ; background: #ccf0fa ">
        <div class="container">
            <div class="pc-center">
                <div class="section-heading">
                    <div class="row">
                        <div class="col-10 col-md-6 mx-auto text-center mb-4">
                            <h2>Testimonials</h2>
                        </div>
                    </div>
                </div>
                <div class="bs-carousel">
                    <div class="owl-carousel owl-theme" id="#owl-demo">
                        @foreach($testimonials as $key => $value)
                            <div class="item text-center" style="width: 100% !important">
                                <div class="ws-box-services">
                                    <center>
                                        <figure class="ws-box-icon" >
                                            <img src="{{ asset('public/upload/testimonials/'.$value->image) }}" alt="testimonials_img" style="height: 80px; width: 80px; border-radius:50%; ">
                                        </figure>
                                    </center>
                                    <h4>{{ $value->name}}</h4>
                                    <p>{{ $value->description}}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="owl-theme">
                        <div class="owl-controls">
                            <div class="custom-nav owl-nav"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    <!-- HOME SERVICE END -->





@endsection
