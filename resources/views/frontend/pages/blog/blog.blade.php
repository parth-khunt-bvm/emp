@extends('frontend.layout.app')
@section('section')


    <!-- CONTENT START -->
    <section>
        <div class="container mt-5 mb-5">
            <div class="row">
                <!-- BLOG GRID START -->
                <div class="col-lg-9">
                    <div class="row image-hover">
                    @foreach($blog as $key => $value)
                        <div class="col-lg-6">
                            <div class="blog-preview">
                                <figure class="bp-thumbnail zoom-in">
                                    <a href="blog-single.html"><img src=" {{asset('public/upload/blog/'.$value->image) }}" alt=""></a>
                                </figure>
                                <div class="bp-caption">
                                    <h6>{{ $value->name }}</h6>
                                    <h5>{{ $value->title }}</h5>
                                    <p>{{ $value->short_description }}</p>
                                    <a class="btn-washla" href="{{ route('blogdetail',$value->id)}}" role="button">Read More</a>

                                </div>
                            </div>
                        </div>
                    @endforeach
                    </div>

                </div>
                <!-- BLOG GRID END -->

                <!-- ASIDE BAR START -->
                <div class="col-lg-3 spacing-md">
                    <aside>
                        <div class="aside-block">

                            <h4 class="aside-title">Recent Posts</h4>
                            <ul class="list-unstyled">
                            @php
                            $count = 0;
                            @endphp
                            @foreach($blog as $key => $value)
                            @if($count == 3)
                            @break;
                            @endif
                                <li class="media">
                                  <a href="{{ route('blogdetail',$value->id)}}"><img src=" {{asset('public/upload/blog/'.$value->image) }}" class="mr-3" alt="..."></a>
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
    <!-- CONTENT END -->


@endsection
