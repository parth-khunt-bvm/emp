@extends('frontend.layout.app')
@section('section')


<!-- CONTENT START -->
<section>
    <div class="container mt-5 mb-5">
        <div class="row">
            <!-- BLOG CONTENT START -->
            <div class="col-lg-9">
                <div class="blog-content">
                    <figure class="post-image">
                        <!-- <img src=" {{asset('public/upload/blog/'.$career[0]->icon) }}" alt=""> -->
                    </figure>
                    <div class="post-content">
                        <h2 class="post-title">{{ $career[0]->experience }} | {{ $career[0]->department_name }}</h2>
                        <p>{!! $career[0]->details !!}</p>
                    </div>
                
                </div>
            </div>
            <!-- BLOG CONTENT END -->

            <!-- ASIDE BAR START -->
            <div class="col-lg-3 spacing-md">
                <aside>
                    <div class="aside-block">

                        <h4 class="aside-title">OTHER OPENINGS</h4>
                        <ul class="list-unstyled">
                            @php
                            $count = 0;
                            @endphp
                            @foreach($careers as $key => $value)
                            @if($count == 3)
                            @break;
                            @endif
                            <li class="media">
                                <a href="{{ route('careerdetail',$value->id)}}"><img src=" {{asset('public/upload/career/'.$value->icon) }}"
                                        class="mr-3" alt="..."></a>
                                <div class="media-body">
                                    <h5 class="mt-0 mb-1"><a href="{{ route('careerdetail',$value->id)}}">{{ $value->department_name }}</a></h5>
                                </div>
                            </li>
                            <br>
                            @php
                            $count++;
                            @endphp
                            @endforeach
                        </ul>
                    </div>
               
                    <div class="aside-block">
                        <a href="{{ route('career') }}">
                        <div class="headline-banner">
                                <h4>View all job openings</h4>
                            </div>
                           </a>
                        </div>
                </aside>
            </div>
            <!-- ASIDE BAR END -->
        </div>
    </div>
</section>

@endsection