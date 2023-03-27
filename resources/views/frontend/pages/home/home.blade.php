@extends('frontend.layout.app')
@section('section')

    <!-- HOME SERVICE CAROUSEL START -->
    @if(!$homeService->isEmpty())
    <div class="container mt-5 mb-5">
        <div class="front-carousel-alt">
            <div class="owl-carousel owl-theme">
            @foreach($homeService as $key => $value)
                <div class="item" >
                    <div class="box-layer" style="height: 250px">
                        <figure class="bl-icon">
                            <img src="{{ asset('public/upload/homeservice/'.$value->image) }}" alt="service_image">
                        </figure>
                        <h4>{{ $value->title }}</h4>
                        <p>{{ $value->description }}</p>
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
    @endif
    <!-- HOME SERVICE CAROUSEL END -->

    <!-- HOME ABOUT START -->
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-lg-6">
                <figure class="about-front">
                    <img src="{{ asset('public/upload/topsection/'.$topsection[0]->image) }}" alt="">
                    <div class="mission-layer">
                        <figure class="ml-icon">
                            <img src="{{ asset('public/upload/topsection/'.$topsection[0]->icon) }}" alt="">
                        </figure>
                        <p>{{ $topsection[0]->short_description }}</p>
                    </div>
                </figure>
            </div>
            <div class="col-lg-6 spacing-md ">
                <div class="about-layer">
                <h2>{{ $topsection[0]->title }}</h2>
                <p>{!! $topsection[0]->description  !!}</p>
            </div>
            </div>
        </div>
    </div>
    <!-- HOME ABOUT END -->

    <!-- HOME WIDE SECTION START -->
    <div class="ws-washla mt-5 mb-5" style="background-image: url({{ asset('public/upload/banner/'.$bannersection[0]->image) }}) ">
        <div class="content-left-layer">
            <div class="inner-cll">
            <h2>{{ $bannersection[0]->title }}</h2>
            <p>{!! $bannersection[0]->description  !!}</p>
            </div>
        </div>
    </div>
    <!-- HOME WIDE SECTION END -->

    <!-- TEAM START -->
    <div class="container mt-5 mb-5">
        <div class="section-heading">
            <div class="row">
                <div class="col-10 col-md-6 mx-auto text-center mb-4">
                    <h5 class="subtitle">MEET OUR</h5>
                    <h2>Our Team</h2>
                    <p>The member of our highly experienced team is dedicated to providing you with only the best
                        service we can possibly provide.</p>
                </div>
            </div>
        </div>
        <div class="team-carousel">
            <div class="owl-carousel owl-theme">
            @foreach($ourTeam as $key => $value)
                <div class="item">
                    <div class="team-card">
                        <figure class="tc-portrait">

                            @php
                                if($value->image != '' || $value->image != null ){
                                    if(file_exists( public_path().'/upload/ourteam/'.$value->image) ){
                                        $image = url("public/upload/ourteam/" . $value->image);
                                    }else{
                                        $image = url("public/frontend/assets/images/commons/user.png");
                                    }
                                }else{
                                    $image = url("public/frontend/assets/images/commons/user.png");
                                }
                            @endphp
                            <img src="{{ $image }}" alt="ourteam" style="height:330px">
                            <ul class="tc-social">
                            @if($value->facebook != NULL)
                                <li><a href="{{ $value->facebook }}"><i class="fab fa-facebook-f"></i></a></li>
                            @endif
                            @if($value->twitter != NULL)
                                <li><a href="{{ $value->twitter }}"><i class="fab fa-twitter"></i></a></li>
                            @endif
                            @if($value->instagram != NULL)
                                <li><a href="{{ $value->instagram }}"><i class="fab fa-linkedin-in"></i></a></li>
                            @endif
                            @if($value->linkedin != NULL)
                                <li><a href="{{ $value->linkedin }}"><i class="fab fa-dribbble"></i></a></li>
                            @endif
                            </ul>
                        </figure>
                        <div class="tc-caption">

                            <h4>{{ $value->name }}</h4>
                            <p>{{ $value->designation}}</p>
                        </div>
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
    <!-- TEAM END -->

    <!-- CAROUSEL INFO SECTION START -->
    <div class="container mt-5">
        <div class="cover-feature">
            <div class="row">
                <div class="col-lg-5">
                    <div class="gallery-carousel">
                        <div class="owl-carousel owl-theme">
                        @if(!empty($section2_extraimages[0]))
                            @foreach($section2_extraimages as $value)
                            <div class="item">
                                <div class="gallery-slider-bg"
                                    style="background-image:url({{ asset('public/upload/section/'.$value) }});"></div>
                            </div>
                             @endforeach
                          @endif

                        </div>
                        <div class="owl-theme">
                            <div class="owl-controls">
                                <div class="custom-nav owl-nav"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="cf-content">
                        <h2>{{ $section2[0]->title }}</h2>
                         <p>{!! $section2[0]->description  !!}</p>                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- CAROUSEL INFO SECTION END -->

    <!-- COUNTER START -->
    @if(!$statistical->isEmpty())
    <div class="ww-counter mb-5" style="background-image:url({{ asset('public/upload/aboutus_section/'.$statistical[0]->image)}});">
        <div class="container">
            <div class="counter-bar">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="media counter-layer right-border" style="height: 125px !important">
                            <img src="{{ asset('public/upload/aboutus_section/'.$statistical[0]->icon1) }}"  class="mr-3" alt="happay_client">
                            <div class="media-body">
                                <div class="counter" data-count="{{$statistical[0]->count1}}">0</div>
                                <p>Happy  Client </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="media counter-layer right-border" style="height: 125px !important">
                            <img src="{{ asset('public/upload/aboutus_section/'.$statistical[0]->icon2) }}" class="mr-3" alt="happay_client">
                            <div class="media-body">
                                <div class="counter" data-count="{{$statistical[0]->count2}}">0</div>
                                <p> Number of Employees</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="media counter-layer right-border" style="height: 125px !important">
                            <img src="{{ asset('public/upload/aboutus_section/'.$statistical[0]->icon3) }}" class="mr-3" alt="happay_client">
                            <div class="media-body">
                                <div class="counter" data-count="{{$statistical[0]->count3}}">0</div>
                                <p>Completed Projects</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="media counter-layer right-border" style="height: 125px !important">
                            <img src="{{ asset('public/upload/aboutus_section/'.$statistical[0]->icon4) }}" class="mr-3" alt="happay_client">
                            <div class="media-body">
                                <div class="counter" data-count="{{$statistical[0]->count4}}">0</div>
                                <p>Technology & Platform</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    <!-- COUNTER END -->


           <!-- PROJECT GRID START -->
           <div class="container mt-5 mb-5" >
            <div class="">

                <div class="section-heading">
                    <div class="row">
                        <div class="col-10 col-md-8 mx-auto text-center mb-4">
                            <h2>Technologies</h2>
                            <p>We’ve spent over 15 years carefully curating the best local and international talent
                                to provide you with flexible staffing solutions that will reduce your costs and give better results.
                            </p>
                        </div>
                    </div>
                </div>

                @if(count($categroy) <= 0 )
                    <div class="container mt-5 mb-5" style="">
                        <div class="grid">
                            <h3 class="has-error"  >Oops !!!! No gallery technologies available right now</h3>
                        </div>
                    </div>
                @else
                    <!-- PROJECT GRID START -->
                    <div class="container mt-5 mb-5">
                        <div class="grid technologies-box">
                            <div class="filter-container">
                                <ul class="filter">
                                <li class=" active" data-filter="*">All</li>
                                @foreach($categroy as $key => $value)
                                    <li class="" data-filter="{{  ".".str_replace(' ', '-',$value['category'])  }}">  {{ $value->category }} </a></li>
                                @endforeach
                                </ul>
                            </div>

                            <div class="grid grid-four-col" id="kehl-grid">
                            	<div class="grid-sizer"></div>
                                @foreach($technology as $key => $value)
                                    <div class="grid-box {{  str_replace(' ', '-',$value['category'])  }}">
                                        <div class="technologies-icon">
                                            <img src=" {{asset('public/upload/technologies/'.$value->image) }}" alt="{{  str_replace(' ', '-',$value['cat_name'])  }}" />
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                    <!-- PROJECT GRID END -->
                    <br/>
                    <br/>
                    <br/>

                @endif
            </div>
        </div>
        <!-- PROJECT GRID END -->


@endsection
