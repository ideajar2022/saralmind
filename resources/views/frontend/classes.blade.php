@extends('frontend.app')

@section('content')
<section class="inner-header"  style="background-image: url({{asset('frontend/img/inner-banner_bg.svg')}}),linear-gradient(359.93deg,#ddeffd -44.48%,#e5f1fb 102.88%);">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="inner-title">
                    <h2>Class: Six</h2>
                </div>
                <div class="page-next">
                    <nav aria-label="breadcrumb" class="d-inline-block">
                        <ul class="breadcrumb bg-white rounded shadow mb-0">
                            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Class Six</li>
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
<section class="global-search_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="{{url('/search-results')}}">
                    <div class="global-search-inner">
                        <div class="form-group course-keyword">
                            <input type="text" class="form-control" placeholder="Enter your keywords">
                        </div>
                        <div class="form-group course-category">
                            <select name="category" id="category" class="select2 form-control">
                                <option value="all_category">All Category</option>
                                <option value="school_level">School Level</option>
                                <option value="bachelors_level">Bachelors Level</option>
                                <option value="videos">Videos</option>
                                <option value="practice_test">Practice Test</option>
                            </select>
                        </div>
                        <div class="global-search-btn">
                            <input type="submit" value="Search" class="btn btn-global-search">
                            <i data-feather="search"></i>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<section id="classes" class="common-gap">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="overview-wrapper classes-intro">
                    <h4 class="title mb-2">Subjects for Class VI</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas pellentesque egestas varius. Cras dictum turpis ut rhoncus facilisis. Vivamus eleifend, libero ut placerat semper, orci tellus luctus lectus, fermentum feugiat orci lectus venenatis leo. Etiam felis tortor, porttitor sit amet rutrum eget, malesuada eu metus. </p>
                </div>
            </div>
        </div>
        <div class="class-list-wrapper">
            <div class="row">
                <div class="col-md-2">
                    <a class="subject-wrapper" href="{{url('/lessons')}}">
                        <div class="subject-icon-wrapper">
                            <img src="{{asset('frontend/img/subjects/science_cover_6.jpg')}}" alt="Subject Image" class="img-fluid">
                        </div>
                        <div class="subject-title">
                            <h4>Science</h4>
                        </div>
                    </a>
                </div>
                <div class="col-md-2">
                    <a class="subject-wrapper" href="#">
                        <div class="subject-icon-wrapper">
                            <img src="{{asset('frontend/img/subjects/math_cover_6.jpg')}}" alt="Subject Image" class="img-fluid">
                        </div>
                        <div class="subject-title">
                            <h4>Mathematics</h4>
                        </div>
                    </a>
                </div>
                <div class="col-md-2">
                    <a class="subject-wrapper" href="{{url('/lessons')}}">
                        <div class="subject-icon-wrapper">
                            <img src="{{asset('frontend/img/subjects/english_cover_6.jpg')}}" alt="Subject Image" class="img-fluid">
                        </div>
                        <div class="subject-title">
                            <h4>English</h4>
                        </div>
                    </a>
                </div>
                <div class="col-md-2">
                    <a class="subject-wrapper" href="{{url('/lessons')}}">
                        <div class="subject-icon-wrapper">
                            <img src="{{asset('frontend/img/subjects/science_cover_6.jpg')}}" alt="Subject Image" class="img-fluid">
                        </div>
                        <div class="subject-title">
                            <h4>Science</h4>
                        </div>
                    </a>
                </div>
                <div class="col-md-2">
                    <a class="subject-wrapper" href="{{url('/lessons')}}">
                        <div class="subject-icon-wrapper">
                            <img src="{{asset('frontend/img/subjects/science_cover_6.jpg')}}" alt="Subject Image" class="img-fluid">
                        </div>
                        <div class="subject-title">
                            <h4>Science</h4>
                        </div>
                    </a>
                </div>
                <div class="col-md-2">
                    <a class="subject-wrapper" href="#">
                        <div class="subject-icon-wrapper">
                            <img src="{{asset('frontend/img/subjects/math_cover_6.jpg')}}" alt="Subject Image" class="img-fluid">
                        </div>
                        <div class="subject-title">
                            <h4>Mathematics</h4>
                        </div>
                    </a>
                </div>
                <div class="col-md-2">
                    <a class="subject-wrapper" href="{{url('/lessons')}}">
                        <div class="subject-icon-wrapper">
                            <img src="{{asset('frontend/img/subjects/english_cover_6.jpg')}}" alt="Subject Image" class="img-fluid">
                        </div>
                        <div class="subject-title">
                            <h4>English</h4>
                        </div>
                    </a>
                </div>
                <div class="col-md-2">
                    <a class="subject-wrapper" href="{{url('/lessons')}}">
                        <div class="subject-icon-wrapper">
                            <img src="{{asset('frontend/img/subjects/science_cover_6.jpg')}}" alt="Subject Image" class="img-fluid">
                        </div>
                        <div class="subject-title">
                            <h4>Science</h4>
                        </div>
                    </a>
                </div>
                <div class="col-md-2">
                    <a class="subject-wrapper" href="{{url('/lessons')}}">
                        <div class="subject-icon-wrapper">
                            <img src="{{asset('frontend/img/subjects/science_cover_6.jpg')}}" alt="Subject Image" class="img-fluid">
                        </div>
                        <div class="subject-title">
                            <h4>Science</h4>
                        </div>
                    </a>
                </div>
                <div class="col-md-2">
                    <a class="subject-wrapper" href="#">
                        <div class="subject-icon-wrapper">
                            <img src="{{asset('frontend/img/subjects/math_cover_6.jpg')}}" alt="Subject Image" class="img-fluid">
                        </div>
                        <div class="subject-title">
                            <h4>Mathematics</h4>
                        </div>
                    </a>
                </div>
                <div class="col-md-2">
                    <a class="subject-wrapper" href="{{url('/lessons')}}">
                        <div class="subject-icon-wrapper">
                            <img src="{{asset('frontend/img/subjects/english_cover_6.jpg')}}" alt="Subject Image" class="img-fluid">
                        </div>
                        <div class="subject-title">
                            <h4>English</h4>
                        </div>
                    </a>
                </div>
                <div class="col-md-2">
                    <a class="subject-wrapper" href="#">
                        <div class="subject-icon-wrapper">
                            <img src="{{asset('frontend/img/subjects/math_cover_6.jpg')}}" alt="Subject Image" class="img-fluid">
                        </div>
                        <div class="subject-title">
                            <h4>Mathematics</h4>
                        </div>
                    </a>
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
