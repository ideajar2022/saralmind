@extends('frontend.app')
@section('meta')
    <meta name="title" content="Simplified e-Learning platform"/>
    <meta name="description" content="Saralmind's Smart school is Nepal's educational networking portals with study materials, solved exercises, practice tests and related videos."/>
    <meta name="keywords" content="Nepal online education portal, Nepal education, nepal curriculum, Saralmind"/>
    <title>Nepal Nursing Council Liscense exam preparation/mock test | SARALMIND</title>
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
                                        <li class="breadcrumb-item"><a href="{{route('nnc-exam-home')}}">NNC</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Start Exam</li>
                                    </ul>
                                </nav>
                            </div>
                            <div class="inner-title">
                                <h1>NNC Liscense Exam</h1>
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

        <div class="row justify-content-center" style="margin:50px 20px;">
            <div class="col-md-8">
                <center>
                    <h3>Guidelines</h3>
                </center>  
                <div class="card">
                    <div class="card-body">
                        <ul>
                            <li>You need to answer a total of 150 questions for NNC Licensure Exam.</li>
                           
                            <li>Once answered, the answer cannot be changed.</li>
                            <li>Once you submit your test, you can review it from your dashboard.</li>
                            <li>If you close or leave the mock test before questions or time finishes, the results won’t be evaluated. </li>
                            <li>You can see the countdown timer (in seconds) at the top right of the window after you start your quiz.</li>
                            <li>If the time is up before you finish the test, the answers will still be evaluated.</li>
                            <li>To pass, you must answer at least 40% of all the questions correctly.</li>
                            <li>Click on “Start Exam” to start the NNC mock test.</li>
                        </ul>
                            
                    </div>
                </div>
            </div>
        </div>



        <div class="row justify-content-center" style="margin:50px 20px;">

            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form style="width:88%; margin:auto;" method="post" action={{ route('nnc-exam-start') }}>@csrf
                            <button type="submit" class="btn btn-primary">Start Exam</button>
                        </form>
                    </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                </div>
            </div>
        </div>

@endsection    