@extends('frontend.layout.app')
@section('section')

<!-- CONTENT START -->
<section>
    <!-- ABOUT SECTION START -->
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-lg-6">
                <div class="about-info-layer">
                    {{-- <h5 class="subtitle">About Washla</h5> --}}
                    <h2>
                        @if($aboutus_section_one[0]->title)
                        {{ $aboutus_section_one[0]->title }}
                        @endif
                    </h2>
                    <p>
                        @if($aboutus_section_one[0]->details)
                        {!! $aboutus_section_one[0]->details !!}
                        @endif
                    </p>

                    {{-- <div class="brand-layer d-flex">
                        <figure class="signature">
                            @if($aboutus_section_one[0]->signuture)
                            <img src="{{ asset('public/upload/aboutus_section/'.$aboutus_section_one[0]->signuture) }}" alt="signuture_image">
                            @endif
                        </figure>
                        <div class="bl-contact">
                            <p>Call Us for Service</p>
                            <h4>
                                @if($aboutus_section_one[0]->contact_no)
                                {{$aboutus_section_one[0]->contact_no}}
                                @endif
                            </h4>
                        </div>
                    </div> --}}
                </div>
            </div>
            <div class="col-lg-6 spacing-md">
                <figure class="about-img-layer">
                    @if($aboutus_section_one[0]->image)
                    <img src="{{ asset('public/upload/aboutus_section/'.$aboutus_section_one[0]->image) }}"  alt="aboutus_section_image ">
                    @endif
                    <div class="ai-banner">
                        <div class="media">

                            <div class="media-body">
                                <h5 class="mt-0">
                                    @if($aboutus_section_one[0]->image_headline)
                                    {{$aboutus_section_one[0]->image_headline}}
                                    @endif
                                </h5>
                            </div>
                        </div>
                    </div>
                </figure>
            </div>
        </div>
    </div>
    <!-- ABOUT SECTION END -->

    <br><br><br><br>

    <!-- COUNTER START -->
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
                        <div class="media counter-layer" style="height: 125px !important">
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
    <!-- COUNTER END -->

    <!-- GRID SECTION START -->
    @if(!$aboutus_section_two->isEmpty())
    <div class="bg-wrapper mt-5" style="background-color: white">
        <div class="container">
            <div class="row">

                <div class="col-lg-12 spacing-md">
                    <div class="ws-left-side">

                        <h2>
                            @if($aboutus_section_two[0]->title)
                            {{ $aboutus_section_two[0]->title }}
                            @endif
                        </h2>
                        <p>
                            @if($aboutus_section_two[0]->details)
                            {!! $aboutus_section_two[0]->details !!}
                            @endif
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

@endsection
