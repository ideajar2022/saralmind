@extends('frontend.app')

@section('content')

<section class="inner-header"  style="background-image: url({{asset('frontend/img/inner-banner_bg.svg')}}),linear-gradient(359.93deg,#ddeffd -44.48%,#e5f1fb 102.88%);">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="inner-title">
                    <h2>We and Our Society</h2>
                    <p>Subject: <span>Social Studies</span></p>
                </div>
                <div class="page-next">
                    <nav aria-label="breadcrumb" class="d-inline-block">
                        <ul class="breadcrumb bg-white rounded shadow mb-0">
                            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{url('/classes')}}">Class Six</a></li>
                            <li class="breadcrumb-item"><a href="{{url('/lessons')}}">Social Studies</a></li>
                            <li class="breadcrumb-item active" aria-current="page">We and Our Society</li>
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

<section id="lessons" class="lessons-list common-gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="course-sidebar">
                    <div class="course-single-info course-widget">
                        <h3 class="widget-title">Subject Info</h3>
                        <div class="course-intro">
                            <ul>
                                <li> <i data-feather="clipboard"></i> Lessons <span> 9</span></li>
                                <li> <i data-feather="book-open"></i> Notes <span>205</span></li>
                                <li> <i data-feather="youtube"></i> Videos <span>49</span></li>
                                <li> <i data-feather="pen-tool"></i> Exercises <span> 738</span></li>
                                <li> <i data-feather="file-text"></i> Practice Test <span>162</span></li>
                                <li> <i data-feather="trending-up"></i> Skill Level <span>Medium</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="course-single-info course-widget">
                        <div class="accordion sidebar-accordion" id="accordionSidebar">
                            <h3 class="widget-title">Quick Access</h3>
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#classAccor" aria-expanded="true" aria-controls="classAccor">
                                        Class List
                                        <i data-feather="chevron-up"></i>
                                    </button>
                                </h5>
                                </div>

                                <div id="classAccor" class="collapse sidebar-inner_list" aria-labelledby="headingOne" data-parent="#accordionSidebar">
                                    <div class="card-body">
                                        <ul>
                                            <li><i data-feather="check-circle"></i><a href="javascript:void(0)">Class Six</a></li>
                                            <li><i data-feather="check-circle"></i><a href="javascript:void(0)">Class Seven</a></li>
                                            <li><i data-feather="check-circle"></i><a href="javascript:void(0)">Class Eight</a></li>
                                            <li><i data-feather="check-circle"></i><a href="javascript:void(0)">Class Nine</a></li>
                                            <li><i data-feather="check-circle"></i><a href="javascript:void(0)">Class Ten</a></li>
                                            <li><i data-feather="check-circle"></i><a href="javascript:void(0)">Class Eleven</a></li>
                                            <li><i data-feather="check-circle"></i><a href="javascript:void(0)">Class Twelve</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingThree">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#subjectAccor" aria-expanded="false" aria-controls="subjectAccor">
                                        Subjects
                                        <i data-feather="chevron-up"></i>
                                    </button>
                                </h5>
                                </div>
                                <div id="subjectAccor" class="collapse sidebar-inner_list" aria-labelledby="headingThree" data-parent="#accordionSidebar">
                                <div class="card-body">
                                    <ul>
                                        <li><i data-feather="check-circle"></i><a href="javascript:void(0)">English</a></li>
                                        <li><i data-feather="check-circle"></i><a href="javascript:void(0)">Nepali</a></li>
                                        <li><i data-feather="check-circle"></i><a href="javascript:void(0)">E.H.P.</a></li>
                                        <li><i data-feather="check-circle"></i><a href="javascript:void(0)">Computer Science</a></li>
                                        <li><i data-feather="check-circle"></i><a href="javascript:void(0)">Math</a></li>
                                        <li><i data-feather="check-circle"></i><a href="javascript:void(0)">Optional Math</a></li>
                                        <li><i data-feather="check-circle"></i><a href="javascript:void(0)">Social Studies</a></li>
                                    </ul>
                                </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingTwo">
                                <h5 class="mb-0">
                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#lessonsAccor" aria-expanded="false" aria-controls="lessonsAccor">
                                        Lessons
                                        <i data-feather="chevron-up"></i>
                                    </button>
                                </h5>
                                </div>
                                <div id="lessonsAccor" class="collapse sidebar-inner_list show" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                                    <div class="card-body">
                                        <ul>
                                            <li class="active"><i data-feather="check-circle"></i><a href="javascript:void(0)">We and Our Society</a></li>
                                            <li><i data-feather="check-circle"></i><a href="javascript:void(0)">Our Social Values and Norms</a></li>
                                            <li><i data-feather="check-circle"></i><a href="javascript:void(0)">Social Problems and Solutions</a></li>
                                            <li><i data-feather="check-circle"></i><a href="javascript:void(0)">Civic Awareness</a></li>
                                            <li><i data-feather="check-circle"></i><a href="javascript:void(0)">Our Earth</a></li>
                                            <li><i data-feather="check-circle"></i><a href="javascript:void(0)">Population and Population Status</a></li>
                                            <li><i data-feather="check-circle"></i><a href="javascript:void(0)">Population Growth and its Management</a></li>
                                            <li><i data-feather="check-circle"></i><a href="javascript:void(0)">Our Economic Activities</a></li>
                                            <li><i data-feather="check-circle"></i><a href="javascript:void(0)">Our International Relation and Cooperation</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 pl-md-5">
                <div class="overview-wrapper">
                    <h4 class="title mb-2">Overview</h4>
                    <p>You can combine all the Saralmind into a single one, you can take a component from the Application theme and use it in the Website.</p>
                    <p>All the Saralmind into a single one, you can take a component from the Application theme and use it in the Website.</p>
                    <p>Using Saralmind to build your site means never worrying about designing another page or cross browser compatibility. Our ever-growing library of components and pre-designed layouts will make your life easier.</p>
                </div>
                <div class="list-tile">
                    <h4 class="mb-2">Notes</h4>
                </div>
                <div class="notes-list">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="note-block">
                                <div class="note_block-img_wrapper">
                                    <img src="{{asset('frontend/img/notes/note_1.jpg')}}" alt="Note" class="img-fluid">
                                    <div class="note-meta-links">
                                        <a href="{{url('/lessons/notes/note-single')}}"><i data-feather="pen-tool"></i> Exercises</a>
                                        <a href="#"><i data-feather="youtube"></i> Videos</a>
                                        <a href="#"><i data-feather="file-text"></i> Practice Test</a>
                                    </div>
                                </div>
                                <div class="note-desc">
                                    <h4><a href="{{url('/lessons/notes/note-single')}}">Community and Society</a></h4>
                                    <p>A group of family or people sharing a common understanding and often the same language, manners, tradition and law with each other is known as a community.</p>
                                    <a href="{{url('/lessons/notes/note-single')}}" class="btn-more">Learn More <i class="fa fa-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="note-block">
                                <div class="note_block-img_wrapper">
                                    <img src="{{asset('frontend/img/notes/note_1.jpg')}}" alt="Note" class="img-fluid">

                                    <div class="note-meta-links">
                                        <a href="#"><i data-feather="pen-tool"></i> Exercises</a>
                                        <a href="#"><i data-feather="youtube"></i> Videos</a>
                                        <a href="#"><i data-feather="file-text"></i> Practice Test</a>
                                    </div>
                                </div>
                                <div class="note-desc">
                                    <h4><a href="{{url('/lessons/notes/note-single')}}">Origin and Formation of Society</a></h4>
                                    <p>A group of family or people sharing a common understanding and often the same language, manners, tradition and law with each other is known as a community.</p>
                                    <a href="{{url('/lessons/notes/note-single')}}" class="btn-more">Learn More <i class="fa fa-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="note-block">
                                <div class="note_block-img_wrapper">
                                    <img src="{{asset('frontend/img/notes/note_1.jpg')}}" alt="Note" class="img-fluid">

                                    <div class="note-meta-links">
                                        <a href="#"><i data-feather="pen-tool"></i> Exercises</a>
                                        <a href="#"><i data-feather="youtube"></i> Videos</a>
                                        <a href="#"><i data-feather="file-text"></i> Practice Test</a>
                                    </div>
                                </div>
                                <div class="note-desc">
                                    <h4><a href="{{url('/lessons/notes/note-single')}}">Our VDC And its Functions</a></h4>
                                    <p>A group of family or people sharing a common understanding and often the same language, manners, tradition and law with each other is known as a community.</p>
                                    <a href="{{url('/lessons/notes/note-single')}}" class="btn-more">Learn More <i class="fa fa-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="note-block">
                                <div class="note_block-img_wrapper">
                                    <img src="{{asset('frontend/img/notes/note_1.jpg')}}" alt="Note" class="img-fluid">

                                    <div class="note-meta-links">
                                        <a href="#"><i data-feather="pen-tool"></i> Exercises</a>
                                        <a href="#"><i data-feather="youtube"></i> Videos</a>
                                        <a href="#"><i data-feather="file-text"></i> Practice Test</a>
                                    </div>
                                </div>
                                <div class="note-desc">
                                    <h4><a href="{{url('/lessons/notes/note-single')}}">Our Municipality and its Functions</a></h4>
                                    <p>A group of family or people sharing a common understanding and often the same language, manners, tradition and law with each other is known as a community.</p>
                                    <a href="{{url('/lessons/notes/note-single')}}" class="btn-more">Learn More <i class="fa fa-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="note-block">
                                <div class="note_block-img_wrapper">
                                    <img src="{{asset('frontend/img/notes/note_1.jpg')}}" alt="Note" class="img-fluid">

                                    <div class="note-meta-links">
                                        <a href="#"><i data-feather="pen-tool"></i> Exercises</a>
                                        <a href="#"><i data-feather="youtube"></i> Videos</a>
                                        <a href="#"><i data-feather="file-text"></i> Practice Test</a>
                                    </div>
                                </div>
                                <div class="note-desc">
                                    <h4><a href="{{url('/lessons/notes/note-single')}}">Our Infrastructure Of Development:Education</a></h4>
                                    <p>Education is the process of delivery of knowledge, skills, customs and values from one generation to another which is the most important infrastructure of development.</p>
                                    <a href="{{url('/lessons/notes/note-single')}}" class="btn-more">Learn More <i class="fa fa-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="note-block">
                                <div class="note_block-img_wrapper">
                                    <img src="{{asset('frontend/img/notes/note_1.jpg')}}" alt="Note" class="img-fluid">

                                    <div class="note-meta-links">
                                        <a href="#"><i data-feather="pen-tool"></i> Exercises</a>
                                        <a href="#"><i data-feather="youtube"></i> Videos</a>
                                        <a href="#"><i data-feather="file-text"></i> Practice Test</a>
                                    </div>
                                </div>
                                <div class="note-desc">
                                    <h4><a href="{{url('/lessons/notes/note-single')}}">Our Infrastructure of Development:Health</a></h4>
                                    <p>"Health is the state of complete physical,mental, and social well-being and not merely the absence of diseases or infirmity".</p>
                                    <a href="{{url('/lessons/notes/note-single')}}" class="btn-more">Learn More <i class="fa fa-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
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
