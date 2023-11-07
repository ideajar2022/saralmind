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
                                    <li class="breadcrumb-item active" aria-current="page">NNC Results</li>
                                </ul>
                            </nav>
                        </div>
                        <div class="inner-title">
                            <h1>NNC Results</h1>
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
            <div style="text-align: center; margin-top: 20px;">
                <h6>You can see the Nepal Nursing Council exam leaderboard in your profile dashboard !!</h6>
            </div>
            @if($results->count()<1)
                <h3>Nothing to show</h3>
                <h5>Start <a href="{{ route('nnc-guidelines') }}">Nepal Nursing Council Mock Test</a></h5>
            @endif

            @foreach($results as $key=>$result)
            <div class="accordion" id="accordionExample" style="margin: 30px 200px;">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading">
                    @if($result->percentage<40)
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" style="background-color:#ff5c5c;">
                    @else
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne" style="background-color:#54bd29;">
                    @endif
                        <!-- {{ $result->quiz_name }} <br> -->
                        <h5>{{ $result->created_at->diffForHumans() }}</h5>
                    </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="heading" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <h6>
                        Correct Answers : {{ array_sum($result->points) }} &nbsp;&nbsp;
                        Percentage : {{ round($result->percentage,2) }} % &nbsp;&nbsp;
                        Status : @if($result->percentage<40) Failed @else Passed @endif
                        </h6>
                        <hr/>

                        <div class="row">
                            <div class="col-md-6">
                                <!-- <h6> -->
                                    Categories
                                    @foreach($categories as $category)
                                        <br>
                                        <i>{{ $category }}</i>
                                    @endforeach
                                <!-- </h6> -->
                            </div>
                            <div class="col-md-6">
                                    Percentage
                                    @foreach($result->category_wise_percentage as $key1=>$res)
                                    <br>
                                    <i>{{ round($res,2) }} %</i>
                                    @endforeach
                                <!-- </h6> -->
                            </div>
                        </div>

                    </div>
                    <div>
                        <form action="{{ route('nnc-exam-answers', $result->id) }}" method="get">
                            <button class="btn btn-info">
                                Check Results
                            </button>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
                   
            @endforeach
        </div>
        
        <div class="card-footer clearfix">
            {{ $results->links() }}
        </div>
    </div>


@endsection

@section('extra-js')
<script type="text/javascript">
</script>

@endsection