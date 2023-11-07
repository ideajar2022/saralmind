@extends('frontend.app')

@section('meta')

<meta name="title" content="SARALMIND - About Us" />
<meta name="description"
    content="" />
<meta name="keywords" content="Nepal online education portal, Nepal education, nepal curriculum, about Saralmind" />
<title>SARALMIND - About Us</title>
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
                                <li class="breadcrumb-item"><a href="saralmind.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">About</li>
                            </ul>
                        </nav>
                    </div>
                    <div class="inner-title">
                        <h1>About</h1>
                        <p>About us and what we are trying to do.</p>
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

<section class="about-detail common-gap">
            <div class="container">
                <div class="row" style="text-align: justify;">
                    <h4>About SaralMind.com</h4>
                    <p>Saralmind.com is a company founded by experienced techies, college professionals and ed-tech founders with an experience of over a decade with an 
aim to slimplify the teaching and learning process for educators and students. As a start, we have been working specially in the field of Academics and Certification related to Nursing and Bachelors in Business Administration(BBA) courses.
For a start you can find contents for various lessons and any nursing student can simply login and start practicing for their Nepal Nursing Council License Examination. All the notes for CTEVT nursing and BBA syllabus are provided along with the important questions.
  
 </p>
                </div>
            </div>
        </section>
        <section class="vision-section common-gap">
            <div class="container">
                <div class="row">
                    <div class="col-12 p-0 mt-4 pt-5 mt-sm-0 pt-sm-0">
                        <div class="section-title about-text-content">
                            <h4>What Can You Find at Saralmind.com right now?</h4>
                            <ul>
                                <li>
                                    <p>Course study materials for PCL Nursing. </p>
                                </li>
                                <li>
                                    <p>Nepal Nursing Council License Exam Preparation. </p>
                                </li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
       <!-- <section class="video-section">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 p-0">
                        <div class="left-img_wrapper">
                            <img src="https://i.ibb.co/YW5HYvD/christina-wocintechchat-com-6-U4n-I2-R2-M-unsplash.jpg" class="img-fluid mx-auto d-block" alt="">
                            <div class="play-icon">
                                <a href="https://youtu.be/RNXLmEdpuYY" data-autoplay="true" data-vbtype="video" class="play-btn venobox video-play-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-play text-primary bg-white"><polygon points="5 3 19 12 5 21 5 3"></polygon></svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
@endsection

@section('extra-js')
<script type="text/javascript">
</script>
@endsection