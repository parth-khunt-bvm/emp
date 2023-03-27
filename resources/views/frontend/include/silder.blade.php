<!--begin::Aside-->
@php
$currentRoute = Route::current()->getName();
if($currentRoute != "home"){
    if($currentRoute == "services" || $currentRoute == "service-details"){
        $id= 1;
    }
    if($currentRoute == "portfolio"){
        $id= 2;
    }
    if($currentRoute == "blog" || $currentRoute ==  "blogs"){
        $id= 3;
    }
    if($currentRoute == "blogdetail"){
        $id= 4;
    }
    if($currentRoute == "contact-us"){
        $id= 8;
    }
    if($currentRoute == "about-us"){
        $id= 5;
    }
    if($currentRoute == "career"){
        $id= 6;
    }
    if($currentRoute == "careerdetail"){
        $id= 7;
    }

    if($currentRoute == "faqs"){
        $id= 9;
    }
    if($currentRoute == "our-team"){
        $id= 10;
    }

    $getBannerList = getBannerDetails($id);

}
@endphp

@if($currentRoute == "home")
    <!--SLIDER START-->
<div class="home-slider">
    <div class="hero-slider" data-carousel>
    @foreach($homeSlider as $key => $value)
        <div class="carousel-cell" style="background-image:url({{ asset('public/upload/homesilder/'.$value->image) }});">
            <div class="overlay"></div>
            <div class="container slider-caption">
                <h5 class="subtitle">{{$value->title}}</h5>
                <h2 class="title">{{ $value->description}} </h2>

            </div>
        </div>
        @endforeach
    </div>
</div>

<!--SLIDER END-->
@else

    <!--SLIDER START-->
    <div class="pages-hero" style="background-image:url({{ asset('public/upload/banner_image/'.$getBannerList[0]->image) }});">
        <div class="container">
            <div class="pages-title" >
                <h1 style="color: white !important">{{$header['title']}}</h1>
            </div>
        </div>
    </div>
    <!--SLIDER END-->
@endif

