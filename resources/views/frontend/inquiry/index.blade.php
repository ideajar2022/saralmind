@extends('frontend.app')
@section('meta')

<meta name="title" content="SARALMIND - Contact Us" />
<meta name="description"
    content="You can contact us via email, phone number or by filling up the form in this page." />
<meta name="keywords" content="Nepal online education portal, Nepal education, nepal curriculum, contact, Saralmind" />
<title>SARALMIND - Contact Us</title>
@endsection
@section('content')
@include('frontend.partials.search')
<section class="inner-header">
    <div class="container">
        <div class="row">
            <div class="d-flex align-items-center inner-header-wrapper">
                <div class="col-md-9 col-12">
                    <div class="page-next">
                        <nav aria-label="breadcrumb" class="d-inline-block">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                            </ul>
                        </nav>
                    </div>
                    <div class="inner-title">
                        <h1>Contact Us</h1>
                        <p>Contact us Quickly.</p>
                    </div>
                </div>
                <div class="col-md-3 col-12">
                    <div class="top-svg-wrapper">
                        <img src="{{asset('frontend/img/new-img/study.svg')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="main-contact-wrapper">
    <!-- change in contact form remove the image and add map iframe and change in div class -->
    <div class="container">
        <div class="contact-form-wrapper">
            <div class="row mb-5 justify-content-between">
                <div class="col-md-4 col-12 main-info-wrapper">
                    <div class="info-wrapper d-flex phone">
                        <div class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-phone-call">
                                <path
                                    d="M15.05 5A5 5 0 0 1 19 8.95M15.05 1A9 9 0 0 1 23 8.94m-1 7.98v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                </path>
                            </svg>
                        </div>
                        <a href="tel:+977-9823912345">
                            <p>+977 9823912345</p>
                        </a>
                    </div>
                    <div class="info-wrapper d-flex email">
                        <div class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-mail">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
                                </path>
                                <polyline points="22,6 12,13 2,6"></polyline>
                            </svg>
                        </div>
                        <a href="mailto:info@kullabs.com">
                            <a href="mailto:info@saralmind.com">
                                <p>info@saralmind.com</p>
                            </a>
                        </a>
                    </div>
                    <div class="info-wrapper d-flex location">
                        <div class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-map-pin">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                <circle cx="12" cy="10" r="3"></circle>
                            </svg>
                        </div>
                        <a href="#google-map">
                            <p>Saralmind</p>
                        </a>
                    </div>
                </div>
                <div class="col-md-7 mt-4 mt-sm-0 pt-2 pt-sm-0 col-12">
                    <div class="card shadow rounded-0 border-0">
                        <div class="card-body py-4">
                            <h4 class="card-title">Get In Touch !</h4>
                            <div class="custom-form mt-4">
                            @if(session()->has('message'))
                                <div class="alert alert-success">
                                    {{ session()->get('message') }}
                                </div>
                            @endif
                                <form method="POST" action="{{ route('inquiry.store') }}" name="contact-form"
                                    id="contact-form">
                                    @csrf
                                    {!! GoogleReCaptchaV3::renderField('contact_us_id','contact_us') !!}
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group position-relative">
                                                <label>Your Name <span class="text-danger">*</span></label>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-user icon-sm icons">
                                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                    <circle cx="12" cy="7" r="4"></circle>
                                                </svg>
                                                <input name="name" id="name" type="text"
                                                    class="form-control pl-5 use-keyboard-input"
                                                    placeholder="Full Name :" value="{{ old('name') }}">
                                                @if ($errors->has('name'))
                                                <span class="text-red" role="alert">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group position-relative">
                                                <label>Your Email <span class="text-danger">*</span></label>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-mail icon-sm icons">
                                                    <path
                                                        d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
                                                    </path>
                                                    <polyline points="22,6 12,13 2,6"></polyline>
                                                </svg>
                                                <input name="email" id="email" type="email"
                                                    class="form-control pl-5 use-keyboard-input"
                                                    placeholder="Your email :" value="{{ old('email') }}">
                                                    @if ($errors->has('email'))
                                                <span class="text-red" role="alert">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group position-relative">
                                                <label>Subject</label>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-user icon-sm icons">
                                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                    <circle cx="12" cy="7" r="4"></circle>
                                                </svg>
                                                <select class="form-control select2" name="subject"
                                                    id="subject-wrapper">
                                                    <option value="Collaborate with us"
                                                    @if(old('subject')==='Collaborate with us' ) selected @endif>Collaborate with us</option>
                                                    
                                                    <option value="Advertise with us"
                                                        @if(old('subject')==='Advertise with us' ) selected @endif>
                                                        Advertise with us</option>
                                                  
                                                </select>
                                                @if ($errors->has('subject'))
                                                <span class="text-red" role="alert">
                                                    <strong>{{ $errors->first('subject') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group position-relative">
                                                <label>Contact Number</label>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-phone-outgoing icon-sm icons">
                                                    <polyline points="23 7 23 1 17 1"></polyline>
                                                    <line x1="16" y1="8" x2="23" y2="1"></line>
                                                    <path
                                                        d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                                    </path>
                                                </svg>
                                                <input name="contact_no" id="contact_no" type="text"
                                                    class="form-control pl-5 use-keyboard-input"
                                                    placeholder="Contact Number :" value="{{ old('contact_no') }}">
                                                    @if ($errors->has('contact_no'))
                                                <span class="text-red" role="alert">
                                                    <strong>{{ $errors->first('contact_no') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group position-relative">
                                                <label>Message</label>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-message-circle icon-sm icons">
                                                    <path
                                                        d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z">
                                                    </path>
                                                </svg>
                                                <textarea name="message" id="comments" rows="4"
                                                    class="form-control pl-5 use-keyboard-input"
                                                    placeholder="Your Message :"></textarea>
                                                    @if ($errors->has('message'))
                                                <span class="text-red" role="alert">
                                                    <strong>{{ $errors->first('message') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 text-center">
                                            <input type="submit" id="submit" name="send"
                                                class="submitBnt btn btn-primary btn-block" value="Send Message">
                                            <div id="simple-msg"></div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- maps -->
<!--     <div class="container-fluid">
        <div class="row">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3533.293155369082!2d85.31479311415904!3d27.677332882804293!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb19eb1dad6439%3A0xbb1689fdcee3740b!2sLabim%20Mall!5e0!3m2!1sen!2snp!4v1618056797597!5m2!1sen!2snp"
                width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"
                data-ex-slot-check="iframe_ex_slot_1">
            </iframe>
        </div>
    </div> -->
    <!-- change in contact form remove the image and add map iframe and change in div class -->

    <!--    <div class="container-fluid mt-100 mt-60" id="google-map">
        <div class="row">
            <div class="col-12 p-0">
                <div class="card map border-0">
                    <div class="card-body p-0">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d39206.002432144705!2d-95.4973981212445!3d29.709510002925988!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8640c16de81f3ca5%3A0xf43e0b60ae539ac9!2sGerald+D.+Hines+Waterwall+Park!5e0!3m2!1sen!2sin!4v1566305861440!5m2!1sen!2sin" style="border:0" allowfullscreen=""></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
</section>

<!-- {!! GoogleReCaptchaV3::init() !!}
 -->

@endsection

@section('extra-js')
<script type="text/javascript">
</script>
@endsection