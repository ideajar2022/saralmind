@extends('frontend.app')
@section('meta')
    <meta name="title" content="Simplified e-Learning platform"/>
    <meta name="description" content="Saralmind's Smart school is Nepal's educational networking portals with study materials, solved exercises, practice tests and related videos."/>
    <meta name="keywords" content="Nepal online education portal, Nepal education, nepal curriculum, Saralmind"/>
    <title>NNC Results | SARALMIND</title>
@endsection

@section('content')
    <section class="inner-header">
        <div class="container">
            <div class="row">
                <div class="d-flex align-items-center inner-header-wrapper">
                    <div class="col-md-9 col-12">
                        <div class="page-next">
                        <nav aria-label="breadcrumb" class="d-inline-block">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                                <li class="breadcrumb-item" aria-current="page"><a href="{{route('nnc-exam-home')}}">NNC</a></li>
                                <li class="breadcrumb-item" aria-current="page"><a href="{{route('nnc-results')}}">NNC Results</a></li>
                                <li class="breadcrumb-item active">Check Answers</li>
                            </ul>
                        </nav>
                        </div>
                        <div class="inner-title">
                            <h1>Check Answers</h1>
                            <!-- <p>About us and what we are trying to do.</p> -->
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


    <div class="container">
        <div class="card-body">
            @foreach($questions as $key=>$question)
                <i>Question no {{ $key+1 }}: </i>
                <h5>{{ strip_tags($question[0]) }}</h5>
                <li><b style="background-color: #80ffbf;">{{ strip_tags($question[1]) }}</b></li>
                <li>{{ strip_tags($question[2]) }}</li>
                <li>{{ strip_tags($question[3]) }}</li>
                <li>{{ strip_tags($question[4]) }}</li><br>
                <b> Your Answer : {{ strip_tags($user_answer[$key]) }} </b> &nbsp; &nbsp;
                <b> Correct Answer : {{ strip_tags($question[1]) }} </b>

                <hr style="background-color:red; height:3px;"><br>
            @endforeach
        </div>
        
    </div>

@endsection    