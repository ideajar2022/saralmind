@extends('frontend.app')
@section('meta')

<meta name="title" content="Important Questions" />

<meta name="description" content="description" />

<meta name="keywords" content="Meta Keyword for Important questions" />
<meta property="og:image" content="https://www.saralmind.com/img/grade_images/WATqTi_1671528072.png" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<title>Important Questions | {{ $lesson->name }} | {{ config('app.name', 'Saralmind') }}</title>

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
                            
                            <li class="breadcrumb-item" aria-current="page"><a href="{{route('imp-question-subject',[$lesson->program->slug,$lesson->faculty->slug,$lesson->grade->slug])}}">{{ $lesson->grade->name }}</a></li>

                            <li class="breadcrumb-item" aria-current="page"><a href="{{route('imp-question-lesson',[$lesson->program->slug,$lesson->faculty->slug,$lesson->grade->slug,$lesson->subject->slug])}}">{{ $lesson->subject->name }}</a></li>

                            <li class="breadcrumb-item active" aria-current="page">{{ $lesson->name }}</li>
                        </ul>
                    </nav>
                </div>
                <div class="inner-title">
                    <h1>Important Questions - {{ $lesson->name }}</h1>
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
                        <h2 class="text-primary">Important Questions For {{ $lesson->name }}:</h2>
                        <hr>
                    </div>

                </div>
            </div>

            @if(count($exercises) == 0)
                <div class="text-center" style="margin-top: 50px;">
                  <h3 class="display-6">Coming Soon ... Stay Tuned</h3>
                  <p class="lead">We are currently uploading exercises for this section and will be back soon.</p>
                </div>
            
            @else
                <div class="very-short-question" style="margin-top: 30px;">
                    <h5>Very Short Questions (2 marks)</h5> 
                    <ol>           
                        @foreach($exercises as $exercise)
                            @if($exercise->type == 'VERYSHORT')
                                <div class="alert alert-success" role="alert" style="padding-left: 30px;">
                                    <li>
                                        <b>{{ strip_tags($exercise->question) }}</b> 
                                    </li>
                                </div>  
                            @endif
                        @endforeach
                    </ol>
                </div>

                <div class="short-question" style="margin-top: 30px;">
                    <h5>Short Questions (4 marks)</h5>
                    <ol>            
                        @foreach($exercises as $exercise)
                            @if($exercise->type == 'SHORT')
                            <div class="alert alert-success" role="alert" style="padding-left: 30px;">
                                <li>
                                    <b>{{ strip_tags($exercise->question) }}</b> 
                                </li>    
                            </div>
                            @endif
                        @endforeach
                    </ol>
                </div>

                <div class="short-question" style="margin-top: 30px;">
                    <h5>Long Questions (8 marks)</h5>   
                    <ol>         
                        @foreach($exercises as $exercise)
                            @if($exercise->type == 'LONG')
                            <div class="alert alert-success" role="alert" style="padding-left: 30px;">
                                <li>
                                    <b>{{ strip_tags($exercise->question) }}</b> 
                                </li>    
                            </div>
                            @endif
                        @endforeach
                    </ol>
                </div>    
            @endif
        </div>
    </div>
</section>

@endsection

@section('extra-js')
<script type="text/javascript">
</script>
@endsection

