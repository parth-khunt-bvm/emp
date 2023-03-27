@extends('frontend.layout.app')
@section('section')


    <div class="container">
        <div class="career-list-banner">
            <h6>{{$department[0]->line1}}</h6>
            <h2>{{ $department[0]->line2 }}</h2>
            <div class="career-contact">
                <a href="" class="email">{{ $department[0]->email }}</a>
                <a href="" class="phone">{{ $department[0]->phoneno }}</a>
            </div>
        </div>
    </div>
    <section class="career-list">
        <div class="container">
            <div class="row">
            @foreach($carrer as $key => $value)
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="career-box" style="background-image: url({{ asset('public/upload/career/'.$value->icon) }});">
                        <h6>{{ $value->department_name }}</h6>
                        <p>{{ $value->experience }}</p>
                        <a href="{{ route('careerdetail',$value->id)}}"></a>
                    </div>
                </div>
            @endforeach

            </div>

       <div class="container mt-5 mb-5">

<div class="row">
    <div class="col-md-8 mx-auto">
        <div class="contact-title">
            <h3>Enter Below Details To Apply</h3>
        </div>
        <br/>
        <div id="alertDiv">

        </div>
        <form id="career-form-add" method="post" enctype="multipart/form-data">
            @csrf
            <div class="messages"></div>
            <div class="controls">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                        <lable>Your full Name *</lable>
                            <input id="form_name" type="text" name="name" class="form-control " placeholder="Enter your full name" required="required" data-error="Enter your full name.">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                        <lable>Your Email *</lable>
                            <input id="form_email" type="email" name="email" class="form-control " placeholder="Enter your email" required="required" data-error="Enter your email.">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                        <lable>Your mobile number *</lable>
                            <input id="form_phone" type="tel" name="phone" class="form-control  onlyNumber" placeholder="Enter your moblie number">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                        <lable>Attach your resume (Only .pdf files)*</lable>
                            <input id="form_file" type="file" name="file" accept="application/pdf, application/msword" class="form-control ">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                        <lable>Years of Experience *</lable>
                            <input id="form_phone" type="tel" name="experience" class="form-control  onlyNumber" placeholder="Enter your you have yeras of Experience">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                        <lable>Department *</lable>
                        <select class="form-control select2" name="department">
                            <option value="">Select carrer department</option>
                            @foreach($carrer as $key => $value)
                                <option value="{{ $value->id }}">{{ $value->department_name }}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                        <lable>Leave your message ( Maxlength 240 characters )</lable>
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
        </div>
    </section>

@endsection
