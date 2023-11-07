@extends('frontend.app')
@section('meta')
    <meta name="title" content="Simplified e-Learning platform"/>
    <meta name="description" content="Saralmind's Smart school is Nepal's educational networking portals with study materials, solved exercises, practice tests and related videos."/>
    <meta name="keywords" content="Nepal online education portal, Nepal education, nepal curriculum, Saralmind"/>
    <title>SARALMIND - An E-Learning Platform Initiating Free Education</title>
@endsection

@section('content')

    <section class="inner-header" style="background-image: url(https://saralmind.com/frontend/img/inner-banner_bg.svg),linear-gradient(359.93deg,#ddeffd -44.48%,#e5f1fb 102.88%);">
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

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <!-- <div class="card-header">Test</div> -->

            <div class="card-body">

                <form action="{{ route('nnc-results') }}">
                    <div class="form-group row mb-0">
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary">
                                View Result
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
    </div>
</div>
@endsection

@section('extra-js')
<script type="text/javascript">
</script>

@endsection