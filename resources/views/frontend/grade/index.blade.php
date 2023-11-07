@extends('frontend.app')
@section('meta')

<meta name="title" content="{!! strip_tags($faculty->meta_title) !!}" />
@if($faculty->meta_description)
<meta name="description" content="{!! strip_tags($faculty->meta_description) !!}" />
@else
<meta name="description" content="{!! substr(strip_tags($faculty->description), 0, 150) !!}" />
@endif
<meta name="keywords" content="{!! strip_tags($faculty->meta_keyword) !!}" />
<meta property="og:image" content="{{ $faculty->image_url }}" />
<title>{!! strip_tags($faculty->name) !!} | {{ config('app.name', 'Saralmind') }}</title>

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
                            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $faculty->name }}</li>
                        </ul>
                    </nav>
                </div>
                <div class="inner-title">
                    <h1>{{ $faculty->name }}</h1>
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
                        <h2 class="text-primary">Classes for {{ $faculty->name }}</h2>
                        {!! $faculty->description !!}
                        <hr>
                    </div>
                    <div class="row w-100 my-5 justify-content-center">
                        @foreach($faculty->grades as $grade)
                        <div class="col-sm-12 col-md-3 col-lg-3 text-center">
                            <a href="{{ route('class',[@$faculty->program->slug,$faculty->slug,$grade->slug])}}" class="single-course">
                                <div class="inner-course-wrap">
                                    <div class="icon-wrapper">
                                        <!-- <i class="fa fa-book" aria-hidden="true"></i> -->
                                        <img src="{{ ($grade->image_url) }}">
                                    </div>
                                    <h3>{{ $grade->name }}</h3>
                                </div>
                                <span>View Detail <i class="fa fa-angle-right"></i></span>
                            </a>
                        </div>
                        @endforeach

                        <!-- important questions -->
                        @if($faculty->slug == "pcl-nursing")
                        <div style="display: flex; justify-content: center;">
                            <div class="col-sm-12 col-md-3 col-lg-3 text-center">
                                <a href="{{ route('imp-question-grade')}}" class="single-course">
                                    <div class="inner-course-wrap">
                                        <div class="icon-wrapper">
                                            <!-- <i class="fa fa-book" aria-hidden="true"></i> -->
                                            <img src="{{ asset('img/imp_questions.png') }}">
                                        </div>
                                        <h3>Important Questions</h3>
                                    </div>
                                    <span>View Detail <i class="fa fa-angle-right"></i></span>
                                </a>
                            </div>
                        </div>
                        @endif
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