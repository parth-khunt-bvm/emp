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
                        <img src=" {{asset('public/upload/blog/'.$blog[0]->image) }}" alt="">
                    </figure>
                    <div class="post-content">
                        <h2 class="post-title">{{ $blog[0]->title }}</h2>
                        <p>{!! $blog[0]->description !!}</p>
                    </div>
                
                </div>
            </div>
            <!-- BLOG CONTENT END -->

            <!-- ASIDE BAR START -->
            <div class="col-lg-3 spacing-md">
                <aside>
                    <div class="aside-block">

                        <h4 class="aside-title">Recent Posts</h4>
                        <ul class="list-unstyled">
                            @php
                            $count = 0;
                            @endphp
                            @foreach($blogs as $key => $value)
                            @if($count == 3)
                            @break;
                            @endif
                            <li class="media">
                                <a href="{{ route('blogdetail',$value->id)}}"><img src=" {{asset('public/upload/blog/'.$value->image) }}"
                                        class="mr-3" alt="..."></a>
                                <div class="media-body">
                                    <h5 class="mt-0 mb-1"><a href="{{ route('blogdetail',$value->id)}}">{{ $value->title }}</a></h5>
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
                            <div class="headline-banner">
                                <h4>Category</h4>
                            </div>
                            <ul class="tags">
                                <li>
                                @foreach($menu as $key => $value)
                                    <button class="btn-tags"><a href="{{ route('blogs',$value->id)}}">{{$value->name }}</a></button>
                                @endforeach
                                </li>
                            </ul>
                        </div>
                </aside>
            </div>
            <!-- ASIDE BAR END -->
        </div>
    </div>
</section>

@endsection