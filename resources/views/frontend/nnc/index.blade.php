@extends('frontend.app')
@section('meta')

<meta name="title" content="SARALMIND - Nepal Nursing Council Liscense exam preparation/mock test" />
<meta name="description"
    content="Here you can practice for Nepal Nursing Council Liscense Exam with thousands of mock test and model questions completely based on Nepal Nursing Council guidelines." />
<meta name="keywords" content="Nepal online education portal, Nepal education, nepal curriculum, Saralmind, NNC, Nepal Nursing Council Liscense Exam, mock test, online preparation" />
<meta property="og:image" content="https://saralmind.com/img/grade_images/nursing-council.png" />
<title>Nepal Nursing Council Liscense exam preparation/mock test | SARALMIND </title>

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
                                <li class="breadcrumb-item"><a href="{{route('welcome')}}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">NNC</li>
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
            <h3>Nursing Council Liscense Exam</h3>
        </center>  
        <div class="card" style="margin-top: 30px;">
            <div class="card-body" style="text-align: justify;">
                <ul>
                    <li>Nepal Nursing Council (NNC) is a national council of the government of Nepal that is liable to validate licenses for the professionals who want to work in Nepal as a Nurse, Specialist or ANM. Only a  nepali or foreign citizen who has passed the Licensure Exam conducted by NNC can professionally engage in the related field.</li>

                    <li>This test provided by Saralmind.com can be used to practice for the License Exam. Please be clear that passing the test here doesn’t make you eligible to work in Nepal as a Nurse but will be helpful for you to know if you can pass the exam.</li>

                    <li>Any registered user can practice the exam here for free for one month. After that, the user needs a paid subscription to use this feature. Each practice session will be saved in your dashboard and you can analyze them by visiting this page later.</li>

                    <li>You can simply click on the “Let’s Start” button below and then register on our website or login with Google or Facebook and start practicing for the NNC License Exam.</li><br>

                    <center><h5>ALL THE BEST !!! :) </h5></center>
                </ul>
                
                <div class="row" style="display: flex; justify-content: center; align-items: center; margin-top: 40px;">
                    @if(auth()->user())
                    <div class="col-md-3">
                        <form action="{{ route('nnc-guidelines') }}">
                            <button type="submit" class="btn btn-primary">Lets Start</button>
                        </form>
                    </div>   
                    <div class="col-md-3">
                        <form action="{{ route('nnc-results') }}">
                            <button type="submit" class="btn btn-primary">View Results</button>
                        </form>
                    </div>
                    @else
                    <div class="col-md-3">
                        <a href="javascript:void(0)" target="_blank" class="btn btn-primary showLoginPop" >Lets Start</a>
                    </div>   
                    <div class="col-md-3">
                        <a href="javascript:void(0)" target="_blank" class="btn btn-primary showLoginPop" >View Results</a>
                    </div>
                    @endif  
                </div>
                

<!--                 <div class="row">
                    <div class="col-md-12">
                        <div class="styled-pagination">

                        </div>
                    </div>
                </div> -->
                

            </div>

        </div>

    </div>
</div>


<!-- <section class="common-gap">
    <div class="container">

        <div class="row">
            <form action="{{ route('nnc-guidelines') }}">
                <button type="submit" class="btn btn-primary">Lets Start</button>
            </form>
        </div>
        <br>
        <div class="row">
            <form action="{{ route('nnc-results') }}">
                <button type="submit" class="btn btn-primary">View Results</button>
            </form>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="styled-pagination">

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



<!-- Get all quiz questions where program = high school (program_id = 1) -->

<!-- 
    select q.* from notes n inner join programs p 
    on
    n.program_id = p.id
    inner join note_objective_questions q
    on
    n.id = q.note_id
-->