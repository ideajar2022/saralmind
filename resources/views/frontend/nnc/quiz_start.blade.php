@extends('frontend.app')
@section('meta')
    <meta name="title" content="NNC License Mock Test Started | Saralmind.com"/>
    <meta name="description" content="The Mock Test for NNC License Exam Just Started. All the best."/>
    <meta name="keywords" content="Nepal online education portal, Nepal education, nepal curriculum, Saralmind"/>
    <title>NNC License Mock Test Started | Saralmind.com</title>
    <style>
        .question-wrap {display: none!important;}
        .question-wrap.active{display: block!important;}
    </style>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
@endsection

@section('content')
<section class="inner-header" style="background-image: url(https://saralmind.com/frontend/img/inner-banner_bg.svg),linear-gradient(359.93deg,#ddeffd -44.48%,#e5f1fb 102.88%);">
<body onbeforeunload="return alertOnRedirect()">
<!-- <body>     -->
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="page-next">
                        <nav aria-label="breadcrumb" class="d-inline-block">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Quiz</li>
                            </ul>
                        </nav>
                    </div>


                </div>

                <div class="col-md-3">
                    <div class="ads-wrapper">
                        <!-- Ads HERE -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="row justify-content-center" id="start-quiz">
        <div class="col-md-8 row mt-2 mb-5">
            <div>
                <center><h2>NNC Liscense Exam</h2></center>
            </div>
            <div class="alert alert-warning" role="alert" style="height:75px; width: 450px;">
                <h6><strong>Time remaining</strong></h6>
                <b id="demo"></b>
            </div>
            

            <div class="card">      
                    <form id="form" method="POST" action="{{ route('nnc-exam-finish') }}">  @csrf  
                        @foreach($questions as $key=>$question)
                            
                            <div class="card question-wrap @if($loop->iteration==1)active @endif question-{{$loop->iteration}} @if(!$loop->last)mb-3 @endif">
                                <div>
                                    <h5>Question No : {{ $key + 1 }}</h5>
                                </div>
                                <div class="card-header">{{ strip_tags($question->question) }}</div>
                                
                                @foreach($options_array[$key] as $key1=>$option)
                                
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input ans" type="radio" id="answer-{{$key+1}}{{$loop->iteration}}" name="answer[{{ $question->id }}]" value="{{ $option }}">
                                            <label for="answer-{{$key+1}}{{$loop->iteration}}" class="form-check-label">
                                                {{ strip_tags($option) }}
                                            </label>           
                                        </div>
                                    </div>                          
                                @endforeach    
                                <input type="hidden" name="question[{{ $question->id }}]" value="{{ $question->id }}">    
                              
                                @if($loop->iteration<$total_questions)
                                    <div class="form-group row mt-3">
                                        <div class="col-md-6">
                                            <button type="button" class="btn btn-primary btn-next">
                                                Next
                                            </button>
                                        </div>
                                    </div>
                                    <div class="form-group row mt-3">
                                        <div class="col-md-6">
                                            <button type="submit" class="btn btn-primary" id="testBtn" style="display:none;">
                                                Submit
                                            </button>
                                        </div>
                                    </div>

                                @else
                                    <div class="form-group row mt-3">
                                        <div class="col-md-6">
                                            <button type="submit" class="btn btn-primary" id="btn-submit">
                                                Submit
                                            </button>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        @endforeach

                    </form>

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

    <script type="text/javascript">
        // let total_questions = {!! json_encode($total_questions) !!};
        // let countDownTime = total_questions*9000+1000; // 2 hr 30 min and 1 sec start after onload time

        let countDownTime = 9000000+1000;  // 1 sec for initial loading time
        var active_question = 1;
        $(document).on('click','.btn-next',function(){
        //$(".btn-next").on('click',function(){
            for (var i=1; i<5; i++) {

                if($('#answer-'+`${active_question}${i}`).is(':checked')){
                    // alert("checked");
                    $(".question-"+active_question).removeClass('active');
                    active_question++;
                    $(".question-"+active_question).addClass('active');
                    break;
                }

                else{
                    if(i==4){
                        alert("Please Select an option !!");
                    }
                }   
            }
        });

        $timer_started = true;

        $(window).on('load',function(){
            setTimeout(() => {
                let countDownDate = new Date().getTime()+countDownTime;
                
                // Update the count down every 1 second
                var x = setInterval(function() {
                    // Get today's date and time
                    var now = new Date().getTime();
                    // Find the distance between now and the count down date
                    var distance = Math.floor((countDownDate - now)/1000);

                    var h = Math.floor(distance / 3600);
                    var m = Math.floor(distance % 3600 / 60);
                    var s = Math.floor(distance % 3600 % 60);

                    var hDisplay = h > 0 ? h + (h == 1 ? " hour, " : " hours, ") : "";
                    var mDisplay = m > 0 ? m + (m == 1 ? " minute, " : " minutes, ") : "";
                    var sDisplay = s > 0 ? s + (s == 1 ? " second" : " seconds") : "";

                    document.getElementById("demo").innerHTML = hDisplay + mDisplay + sDisplay;
                    
                    // If the count down is over, finish the quiz
                    if (distance < 1) {
                        $timer_started = false;
                        document.getElementById('testBtn').click();
                        clearInterval(x);
                    }
                }, 1000);
                    
            },1);
        });

        let submit_clicked = false;
        let submit_btn = document.getElementById('btn-submit');
        submit_btn.addEventListener('click', function handleClick() {
            submit_clicked=true;
        });

        function alertOnRedirect() {
            if($timer_started && submit_clicked==false){
                return "Alert on Redirect";
            }
        }
    </script>

</body>
@endsection

