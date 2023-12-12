@extends('frontend.app')

@section('meta')

<meta name="title" content="Simplified e-Learning platform" />
<meta name="description"
    content="SARALMIND provides ed-tech and e-learning solutions for Schools and Colleges. We provide NNC liscense exam preparation, Notes, Questions Answers, Videos, Tests and much more that can be accessed by teachers and students." />
<meta name="keywords"
    content="Nepal online education portal, Nepali education, nepali curriculum, Saralmind, notes for PCL nursing 1st year, notes for PCL nursing 2nd year, notes for PCL nursing 3rd year, Nepal Nursing Council liscense exam online preparation, nnc liscense exam mock test, Nursing" />
<meta property="og:image" content="https://saralmind.com/frontend/img/saralmind-logo.png"/>
<title>SARALMIND - Find notes, question answers, videos and easily prepare for exams </title>

@endsection

@section('content')

<!-- <section id="home-ban" class="home-ban position-relative">
    <img src="{{asset('frontend/img/new-img/web-banner.png')}}" alt="">
    <div class="text-content-wrapper position-absolute w-100">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 text-right mx-auto title-heading">
                    <h1 class="banner-heading">Simple Solution For</h1><p> <h2> <span class="text-primary"><a href="https://saralmind.com/nnc-exam">NNC Licensure Exam</a> | <a href="https://saralmind.com/pcl-3-rd-year">PCL Nursing 3rd Year </a></span>
                    </h2>
                    
                   <p class=" para-desc text-muted">Simplify your mind by taking courses from <span
                            class="text-primary font-weight-bold"><a href="https://saralmind.com/">Saralmind</a></span> which will help you to save
                        time and learn things the simple way!</p>
                    <div class="d-flex justify-content-center subcribe-form mt-4 pt-2">
                        <form method="GET" action="{{ route('search') }}">
                            <div class="form-group mb-0">
                                <input type="text" id="g_search" name="q" class="border bg-white" required=""
                                    placeholder="Search for Courses">
                                <button type="submit" class="btn btn-pills btn-primary">
                                    Search
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->

<section id="courses-list">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="courses-wrapper p-0 mb-4">
                    <div class="section-heading w-100 text-center">
                        <h2 class="text-primary">Welcome to Saralmind</h2>
                        <h3 class="text-primary">Start your preparations for:</h3>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
        <div class="row my-5">

            <div class="col-lg-4 col-12 start-course-card">
                <a href="{{ route('nnc-exam-home')}}">
                    <div class="main-wrapper">
                        <img style="height:100%; width:100%;" src="{{ asset('img/grade_images/nursing-council.png') }}">
                        <div class="content-wrapper">
                            <!-- <h4> Nursing Council Exam </h4> -->

                            <ul class="list-unstyled">
                                
                            </ul>
                            
                            <!-- <button style="color:white;"><strong>Start</strong></button> -->

                        </div>
                    </div>
                </a>    
            </div>

            @foreach($faculties as $faculty)
            <div class="col-lg-4 col-12 start-course-card">
                <a href="{{ route('faculty',[$faculty->program->slug,$faculty->slug])}}">
                    <div class="main-wrapper">
                        <img style="height:100%; width:100%;" src="{{ $faculty->image_url }}" alt="{{ $faculty->name }}">
                        <div class="content-wrapper">
                            <!-- <h4> {{$faculty->name}} </h4> -->
                            <ul class="list-unstyled">
                                
                            </ul>
                            
                            <!-- <button style="color:white;"><strong>Start</strong></button> -->

                        </div>
                    </div>
                </a>    
            </div>
            @endforeach

        </div>
    </div>
</section>

<section class="common-gap for-student-teacher-wrap">
    <div class="container">
        <div class="row">
            <div class="col-10 mx-auto">
                <div class="section-heading text-center mb-4 pb-2">
                    <h2 class="text-white">We Simplify your Learning and Teaching Process</h2>
                    <hr>
                    <!-- <h4 class="title">SaralMind Simplifies learning and teaching process and is helpful for both teachers and students.</h4>                             -->
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-6 mx-auto sm-mb-30">
                <div class="inside bg-white">
                    <div class="image">
                        <img src="{{asset('frontend/img/new-img/for-students.jpg')}}" alt="">
                    </div>
                    <div class="content">
                        <h4>For Students</h4>
                        <p>Through syllabus based सरल notes and curated videos on each topic, it will be easier
                            for students to learn as simply as possible. Quizzes and Questions/Answers will help
                            them keep track of how much they have understood and the best of all, they can
                            always test themselves without being insecure of the test results, boosting their
                            confidence.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mx-auto sm-mb-30">
                <div class="inside bg-white">
                    <div class="image">
                        <img src="{{asset('frontend/img/new-img/for-teachers.jpg')}}" alt="">
                    </div>
                    <div class="content">
                        <h4>For Teachers</h4>
                        <p>Access all the teaching resources like सरल notes, curated videos, Quizzes and
                            Questions/Answers with just one login. Take mock tests, quizzes and even generate
                            question papers for any kind of test. Learn about your students' progress in each
                            topic. You can even conduct online classes with Zoom/ Google Meet. All this with
                            just one login.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="common-gap three-col-sec">
    <div class="container">
        <div class="row">
            <div class="col-md-4 box">
                <div class="inside">
                    <img src="{{asset('frontend/img/new-img/time.png')}}" alt="">
                    <h4>Learn anytime, anywhere</h4>
                    <p>One subscription gets you access to all our live and recorded classes to watch from the
                        comfort of any of your devices.</p>
                </div>
            </div>
            <div class="col-md-4 box">
                <div class="inside">
                    <img src="{{asset('frontend/img/new-img/teacher.png')}}" alt="">
                    <h4>Learn From Experts</h4>
                    <p>One subscription gets you access to all our live and recorded classes to watch from the
                        comfort of any of your devices.</p>
                </div>
            </div>
            <div class="col-md-4 box">
                <div class="inside">
                    <img src="{{asset('frontend/img/new-img/brain.png')}}" alt="">
                    <h4>Practice and Revise</h4>
                    <p>Learning isn't just limited to classes with our practice section, mock tests and lecture
                        notes shared as PDFs for your revision.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="common-gap highlights-sec">
    <div class="container">
        <div class="row">
            <div class="col-md-4 highlight">
                <div class="inside d-flex align-items-center flex-column">
                    <div class="icon">
                        <img src="{{asset('frontend/img/new-img/courses.png')}}" alt="">
                    </div>
              
                    <span class="number text-primary" id="Courses">4</span>
                    <h3>Courses Available</h3>
                </div>
            </div>
            <div class="col-md-4 highlight">
                <div class="inside d-flex align-items-center flex-column">
                    <div class="icon">
                        <img src="{{asset('frontend/img/new-img/enrollment.png')}}" alt="">
                    </div>
                    <span class="number text-primary" id="Enrolled">{{ $students }}</span>
                    <h3>Students Enrolled</h3>
                </div>
            </div>
            <div class="col-md-4 highlight">
                <div class="inside d-flex align-items-center flex-column">
                    <div class="icon">
                        <img src="{{asset('frontend/img/new-img/experts.png')}}" alt="">
                    </div>
                    <span class="number text-primary" id="Expert">{{ $teachers }}</span>
                    <h3>Expert Teachers</h3>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="partners" class="common-gap">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="section-title text-center mb-4 pb-2">
                    <h2 class="title">Collaborators</h2>
                    <hr>
                    <p class="text-muted para-desc mb-0 mx-auto"> <span
                            class="text-primary font-weight-bold">Saralmind.com</span> is open to collaborations and partnerships with
                        any individual or organization who wishes to be a part of our dream of making both academics and skill based learning accessible for everyone!</p>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="partners-wrapper-home owl-carousel owl-theme owl-loaded owl-drag">
                    <div class="owl-stage-outer">
                        <div class="owl-stage"
                            style="transform: translate3d(-1770px, 0px, 0px); transition: all 0.25s ease 0s; width: 3835px;">
                            @foreach($partners as $partner)
                            <div class="owl-item cloned" style="width: 285px; margin-right: 10px;">
                                <div class="item">
                                    <a href="{{ $partner->url }}" target="_blank">
                                        <img src="{{ $partner->image_url }}" alt="{{ $partner->name }}" class="img-fluid">
                                        <div class="award-title text-center">
                                            <h4>{{ strip_tags($partner->description) }}</h4>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            {{ $partner->count() }}
                            @endforeach
                        </div>
                    </div>
                    <div class="owl-nav disabled"><button type="button" role="presentation" class="owl-prev"><span
                                aria-label="Previous">‹</span></button><button type="button" role="presentation"
                            class="owl-next"><span aria-label="Next">›</span></button></div>
                    <div class="owl-dots disabled"></div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- @if(count($products)==0)
<section id="products" class="common-gap">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="section-title text-center mb-4 pb-2">
                    <h2 class="title">Popular Products</h2>
                    <p class="text-muted para-desc mb-0 mx-auto">We at <span
                            class="text-primary font-weight-bold">Saralmind</span> also provide various education
                        related products and services.</p>
                </div>
            </div>
        </div>

        <div class="row">
            @foreach($products as $product)
            <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2">
                <div class="card blog rounded border-0 shadow overflow-hidden">
                    <div class="position-relative">
                        <img src="{{ $product->image_url }}" class="card-img-top" alt="product img">
                        <div class="overlay bg-dark"></div>
                        <div class="course-fee bg-white text-center shadow-lg rounded-circle">
                            <h6 class="text-primary font-weight-bold fee">NRs. {{ $product->price }}</h6>
                        </div>
                    </div>
                    <div class="position-relative">
                        <div class="shape overflow-hidden text-white">
                            <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor">
                                </path>
                            </svg>
                        </div>
                    </div>
                    <div class="card-body content">
                        <!-- <small><a href="javascript:void(0)" class="text-primary h6">Equipment</a></small> -->
                        <!-- <h5><a href="javascript:void(0)">{{ $product->name }}</a></h5>
                        <p class="text-muted">{!! substr($product->description, 0, 70) !!}</p>
                        <a href="javascript:void(0)" data-toggle="modal" data-target="#product{{$product->id}}Popup"
                            class="text-primary">Read More <i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section> -->
<!-- @endif -->


@if(count($testimonials)>0)
<section id="testimonial" class="common-gap testimonial-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="title">
                    <h2>Testimonial</h2>
                    <p class="para-desc m-auto">We believe we have created the most efficient SaaS landing
                        page for your users. Landing page with features that will convince you to use it for your
                        SaaS business.</p>
                </div>
            </div>
            <div class="col-md-10 offset-md-1">
                <div class="testimonial-slider" id="testimonial-slick">
                    @foreach($testimonials as $testimonial)
                    <div class="item p-t-30">
                        <div class="col-lg-10 offset-lg-1 col-12">
                            <div class="row">

                                <div class="col-sm-3">
                                    <div class="testimonial-msg set-relative">
                                        <!-- Testimonal Avator to Change -->
                                        <img alt="" class="img-fluid" src="{{ $testimonial->image_url }}">
                                        <div class="msg-box">
                                            <div class="center-content">
                                                <img alt="" class="img-fluid set-abs"
                                                    src="{{asset('frontend/img/icons/message.png')}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-9">
                                    <div class="quote-margin">
                                        <div class="quotes set-relative m-b-30">
                                            <img alt="" class="img-fluid set-abs left-quote"
                                                src="{{asset('frontend/img/icons/i1.png')}}">
                                            <div class="quote-text">
                                                <h6 class="text-white">{!! $testimonial->description !!}</h6>
                                            </div>
                                            <img alt="" class="img-fluid set-abs right-quote"
                                                src="{{asset('frontend/img/icons/i2.png')}}">
                                        </div>
                                        <div class="rating align-items-center">
                                            <h5 class="name">{{ $testimonial->name }} - <span>
                                                    {{ $testimonial->position }}</span></h5>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
                <div class="action-btn-wrapper">
                    <a href="javascript:void(0)" class="prevBtn">
                        <img src="{{asset('frontend/img/icons/left.png')}}" alt="" class="img-fluid">
                    </a>
                    <a href="javascript:void(0)" class="nextBtn">
                        <img src="{{asset('frontend/img/icons/right.png')}}" alt="" class="img-fluid">
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endif

@if(count($mediaFeeds)>0)
<section id="products" class="common-gap">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="section-title text-center mb-4 pb-2">
                    <h2 class="title">Media Feeds</h2>
                    <p class="text-muted para-desc mb-0 mx-auto">Media working with <span
                            class="text-primary font-weight-bold">Saralmind</span> that can provide everything you need
                        to generate awareness, drive traffic, connect.</p>
                </div>
            </div>
        </div>

        <div class="row">
            @foreach($mediaFeeds as $mediaFeed)
            <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2">
                <div class="card blog rounded border-0 shadow">
                    <div class="feed-img-wrapper">
                        <img src="{{ $mediaFeed->image_url }}" class="card-img-top rounded-top"
                            alt="{{ $mediaFeed->title }}">
                        <div class="overlay rounded-top bg-dark"></div>
                    </div>
                    <div class="card-body content">
                        <h5><a href="javascript:void(0)" class="card-title title text-dark">{{ $mediaFeed->title }}</a>
                        </h5>
                        <div class="post-meta d-flex justify-content-between mt-3">
                            <a href="{{ $mediaFeed->url }}" target="_blank" class="text-primary">Read More <i
                                    class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                    <div class="author">
                        <small class="text-light user d-block"><i class="mdi mdi-account"></i>
                            {{ $mediaFeed->media }}</small>
                        <small class="text-light date"><i class="mdi mdi-calendar-check"></i>
                            {{ \Carbon\Carbon::parse($mediaFeed->published_at)->format('j F, Y') }}</small>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

@if(count($awards)>0)
<section id="awards" class="common-gap">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="section-title text-center mb-4 pb-2">
                    <h2 class="title">Awards</h2>
                    <p class="text-muted para-desc mb-0 mx-auto"> <span
                            class="text-primary font-weight-bold">Saralmind</span> has been recognized by various
                        organizations as the best startup in education-technology sector including National and
                        international startup awards.</p>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="awards-wrapper" id="awards-slick">
                    @foreach($awards as $award)
                    <div class="item">
                        <div class="awards-img-wrapper">
                            <img alt="Awards Image" class="img-fluid" src="{{ $award->image_url }}">
                        </div>
                        <div class="award-title text-center">
                            <h4>{{ $award->title }}</h4>
                            <h3>{{ \Carbon\Carbon::parse($award->awarded_at)->format('Y') }}</h3>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>
@endif

@if(count($partners)==0)
<section id="partners" class="common-gap">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="section-title text-center mb-4 pb-2">
                    <h2 class="title">Trusted Partners</h2>
                    <p class="text-muted para-desc mb-0 mx-auto"> <span
                            class="text-primary font-weight-bold">Saralmind.com</span> have collaborated with government
                        bodies, youtube channels, national and international non-profit organizations and similar
                        enterprises and corporates to fulfill its dream of educationg everyone.</p>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="partners-wrapper" id="partners-slick">
                    @foreach($partners as $partner)
                    <div class="item">
                        <a href="{{ $partner->url }}" target="_blank">
                            <img alt="{{ $partner->name }}" class="img-fluid" src="{{ $partner->image_url }}">
                            <div class="award-title text-center">
                                <h4>{{ $partner->name }}</h4>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endif

<!-- Class Popup -->
<!-- code removed -->

@foreach($products as $product)
<!-- Product Popup -->
<div class="modal fade" id="product{{$product->id}}Popup" tabindex="-1" role="dialog" aria-labelledby="productLabel"
    aria-modal="true">
    <div class="modal-dialog product-dialog modal-dialog-centered" role="document">
        <div class="modal-content product-content-wrapper">
            <a href="#" class="close btn-close" data-dismiss="modal" aria-label="Close"></a>
            <div class="popup-banner">
                <img src="{{ $product->image_url }}" class="img-fluid" alt="Product">
            </div>
            <div class="product-text-content">
                <div class="product-heading">
                    <h2>{{ $product->name }}</h2>
                </div>
                <div class="product-desc">
                    {!! $product->description !!}
                </div>
                <div class="product-footer">
                    <!-- <p>*This free demo gives you access to the note, exercisesand practice session for all the contents for 5 days.</p> -->
                    <!-- <p>To purchase the full version of software, give us a call at 01-4419284 during office hours</p> -->
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection

@section('extra-js')
<script type="text/javascript">



</script>
@endsection