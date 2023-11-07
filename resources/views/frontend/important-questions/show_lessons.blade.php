@extends('frontend.app')
@section('meta')

<meta name="title" content="Important Questions" />

<meta name="description" content="description" />

<meta name="keywords" content="Meta Keyword for Important questions" />
<meta property="og:image" content="https://www.saralmind.com/img/grade_images/WATqTi_1671528072.png" />
<title>Important Questions | {{ $subject->name }} | {{ config('app.name', 'Saralmind') }}</title>

@endsection

@section('content')
@include('frontend.partials.search')
<section class="inner-header">
    <div class="container">
        <div class="row">
            <div class="col-md-9 align-self-center">
                <div class="page-next">
                    <nav aria-label="breadcrumb" class="d-inline-block">
                        <ul class="breadcrumb bg-white rounded shadow mb-0">
                            <li class="breadcrumb-item"><a href="{{route('welcome')}}">Home</a></li>
                            <li class="breadcrumb-item" aria-current="page"><a href="{{route('imp-question-grade')}}">Important Questions</a></li>
                            
                            <li class="breadcrumb-item" aria-current="page"><a href="{{route('imp-question-subject',[$subject->program->slug,$subject->faculty->slug,$subject->grade->slug])}}">{{ $subject->grade->name }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $subject->name }}</li>
                        </ul>
                    </nav>
                </div>
                <div class="inner-title">
                    <h1>Important Questions - {{ $subject->name }}</h1>
                </div>
            </div>
            <div class="col-md-3">
                <div class="top-svg-wrapper">
                    <img src="{{asset('frontend/img/new-img/study.svg')}}" alt="">
                </div>
            </div>
        </div>
    </div>
</section>

<section id="courses-list " class="lessons-list common-gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="courses-wrapper p-0 mb-4">
                    <div class="section-heading w-100 text-center">
                        <h2 class="text-primary">Important Questions For :</h2>
                        <hr>
                    </div>
                    <div class="row w-100 my-5 justify-content-center">
                        @foreach($subject->lessons as $lesson)
                        <div class="col-sm-12 col-md-3 col-lg-3 text-center">
                            <a href="{{ route('imp-question',[$lesson->program->slug,$lesson->faculty->slug,$lesson->grade->slug,$lesson->subject->slug,$lesson->slug])}}" class="single-course">
                                <div class="inner-course-wrap">
                                    <div class="icon-wrapper">
                                        <!-- <i class="fa fa-book" aria-hidden="true"></i> -->
                                        <img src="{{ $lesson->image_url }}">
                                    </div>
                                    <h3>{{ $lesson->name }}</h3>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('extra-js')
<script type="text/javascript">
</script>
@endsection