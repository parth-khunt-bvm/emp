@extends('frontend.layout.app')
@section('section')
<!-- CONTENT START -->
@php
$logodetails = getdetails();
@endphp
<section>
    <!-- CONTACT BOX START -->
    <div class="bg-wrapper contact-wrapper mb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="cw-box">
                        <figure class="cw-icon">
                            <img src="{{ asset('public/frontend/assets/images/icons/placeholder.png') }}" alt="">
                        </figure>
                        <p>{{ $logodetails[0]->address_line1 }}</p>
                        <p>{{ $logodetails[0]->address_line2 }}</p>
                    </div>
                </div>
                <div class="col-lg-4 spacing-m-center">
                    <div class="cw-box">
                        <figure class="cw-icon">
                            <img src="{{ asset('public/frontend/assets/images/icons/telephone.png') }}" alt="">
                        </figure>
                        <p>+91 {{ $logodetails[0]->phoneno }}</p>
                        @if($logodetails[0]->phoneno2)
                        <p>+91 {{ $logodetails[0]->phoneno2 }}</p>
                        @endif
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="cw-box">
                        <figure class="cw-icon">
                            <img src="{{ asset('public/frontend/assets/images/icons/email.png') }}" alt="">
                        </figure>
                        <p>{{ $logodetails[0]->email }}</p>
                        @if($logodetails[0]->email2)
                        <p>{{ $logodetails[0]->email2 }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- CONTACT BOX END -->

    <!-- CONTACT FORM START -->

    <div class="container mt-5 mb-5">

        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="contact-title">
                    <h3>Get in Touch With Us</h3>
                    {!! $details[0]->details !!}
                </div>
                <br/>
                <div id="alertDiv">

                </div>
                <form id="contact-form-add" method="post" >
                    @csrf
                    <div class="messages"></div>
                    <div class="controls">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input id="form_name" type="text" name="name" class="form-control" placeholder="*Name" required="required" data-error="Firstname is required.">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input id="form_email" type="email" name="email" class="form-control" placeholder="*Email address" required="required" data-error="Valid email is required.">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input id="form_phone" type="tel" name="phone" class="form-control onlyNumber" placeholder="Please enter your phone">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <textarea id="form_message" name="message" class="form-control " placeholder="*Your message" rows="6" required="required" data-error="Please,leave us a message."></textarea>
                                </div>
                            </div>
                        </div>
                        <br/>
                        <div class="row">
                            <div class="col-md-12 btn-send">
                                <p><input type="submit" class="btn btn-washla" value="Send message"></p>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- CONTACT FORM END -->

    <!-- MAP START -->
    <div class="bottom-map">
        {!! $logodetails[0]->map  !!}
    </div>
    <!-- MAP END -->
</section>
<!-- CONTENT END -->
@endsection
