@extends('frontend.layout.app')
@section('section')

 <!-- CONTENT START -->
 <section>
    <!-- TEAM START -->
    <div class="container mt-5 mb-5">
        <div class="row tc-page">
        @foreach($ourTeam as $key => $value)
            <div class="col-md-6 col-lg-4">
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

                    <img src="{{ $image  }}" alt="ourteam" style="height:330px">
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
    </div>
    <!-- TEAM END -->

    <!-- <br><br><br><br> -->

</section>
<!-- CONTENT END -->


@endsection
