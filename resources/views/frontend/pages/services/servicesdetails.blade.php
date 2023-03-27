@extends('frontend.layout.app')
@section('section')

   <!-- CONTENT START -->
   <section>
    <div class="container mt-5 mb-5">
        <div class="row">
            <!-- BLOG CONTENT START -->
            <div class="col-lg-12">
                <div class="blog-content">
                    <figure class="post-image">
                        <img src="{{ asset('public/upload/services/'.$service[0]->image) }}" alt="service_image" style="height: 500px">
                      
                    </figure>
                    <div class="post-content">
                        <h2 class="post-title">{{  $service[0]->title }}</h2>
                        <p>  {!! $service[0]->description !!} </p>
                    </div>
                
                </div>
            </div>
            <!-- BLOG CONTENT END -->
            
       
        </div>
    </div>
</section>
<!-- CONTENT END -->

@endsection
