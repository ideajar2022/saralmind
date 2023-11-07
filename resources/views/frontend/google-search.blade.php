@extends('frontend.app')
@section('extra-css')
    <script async src="https://cse.google.com/cse.js?cx=9771a4d70736ab870"></script>
    <style>.gsc-adBlock{display: none !important;}</style>
@stop
@section('meta')

    <meta name="title" content="Search | Saralmind.com"/> 
    <meta name="keywords" content="Nepal online education portal, Nepal education, nepal curriculum, Saralmind"/>
    <title>SARALMIND - An E-Learning Platform Initiating Free Education</title>
@endsection
@section('content')
    <section class="main-search-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="global_search-inner-wrapper">
                        <div class="global_search-input">
                            <div class="gcse-searchbox-only" data-resultsUrl="{{ route('search') }}"></div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
    <div class="gcse-searchresults-only"></div>
                </div>
            </div>
        </div>
    </section>
@stop
