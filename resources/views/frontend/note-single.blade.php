@extends('frontend.app')

@section('content')

<section class="inner-header"  style="background-image: url({{asset('frontend/img/inner-banner_bg.svg')}}),linear-gradient(359.93deg,#ddeffd -44.48%,#e5f1fb 102.88%);">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="inner-title">
                    <h2>Community and Society</h2>
                    <p>Subject: <span>Social Studies</span></p>
                </div>
                <div class="page-next">
                    <nav aria-label="breadcrumb" class="d-inline-block">
                        <ul class="breadcrumb bg-white rounded shadow mb-0">
                            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{url('/classes')}}">Class Six</a></li>
                            <li class="breadcrumb-item"><a href="{{url('/lessons')}}">Social Studies</a></li>
                            <li class="breadcrumb-item"><a href="{{url('/lessons/notes')}}">We and Our Society</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Community and Society</li>
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
                <div class="main-note-single-wrapper">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-note" role="tab" aria-controls="pills-home" aria-selected="true">Note</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-ttr" role="tab" aria-controls="pills-ttr" aria-selected="false">Things to remember</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-videos-tab" data-toggle="pill" href="#pills-videos" role="tab" aria-controls="pills-videos" aria-selected="false">Videos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-exercise-tab" data-toggle="pill" href="#pills-exercise" role="tab" aria-controls="pills-exercise" aria-selected="false">Exercise</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-quiz-tab" data-toggle="pill" href="#pills-quiz" role="tab" aria-controls="pills-quiz" aria-selected="false">Quiz</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-note" role="tabpanel" aria-labelledby="pills-note-tab">
                        <div class="note-wrapper">
                            <h5 class="title mb-2">Community and Society</h5>
                            <p>You can combine all the Saralmind into a single one, you can take a component from the Application theme and use it in the Website.</p>
                            <p>All the Saralmind into a single one, you can take a component from the Application theme and use it in the Website.</p>
                            <p>Using Saralmind to build your site means never worrying about designing another page or cross browser compatibility. Our ever-growing library of components and pre-designed layouts will make your life easier.</p>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-ttr" role="tabpanel" aria-labelledby="pills-ttr-tab">
                        <div class="note-wrapper">
                            <h5 class="title mb-2">Key Points</h5>
                            <p>You can combine all the Saralmind into a single one, you can take a component from the Application theme and use it in the Website.</p>
                            <p>All the Saralmind into a single one, you can take a component from the Application theme and use it in the Website.</p>
                            <p>Using Saralmind to build your site means never worrying about designing another page or cross browser compatibility. Our ever-growing library of components and pre-designed layouts will make your life easier.</p>
                            <ul>
                                <li>It includes every relationship which established among the people.</li>
                                <li>There can be more than one community in a society. Community smaller than society.</li>
                                <li>It is a network of social relationships which cannot see or touched.</li>
                                <li>common interests and common objectives are not necessary for society.</li>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-videos" role="tabpanel" aria-labelledby="pills-videos-tab">
                        <div class="note-wrapper">
                            <h5 class="title mb-2">Videos for Community and Society</h5>
                            <p>You can combine all the Saralmind into a single one, you can take a component from the Application theme and use it in the Website.</p>
                        </div>
                        <div class="videos-list">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="video-single">
                                        <a data-autoplay="true" data-vbtype="video" href="https://youtu.be/Eznium_tk4E" class="video-thumbnail-wrapper venobox">
                                            <img src="{{asset('frontend/img/notes/note_1.jpg')}}" alt="" class="img-fluid">
                                            <span class="video-play-button">
                                                <i data-feather="play"></i>
                                            </span>
                                        </a>
                                        <div class="video-caption">
                                            <h5>What is Community?</h5>
                                            <p>We and Our Society</p>
                                            <p>Uploaded: 17th Jan, 2020</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="video-single">
                                        <a data-autoplay="true" data-vbtype="video" href="https://youtu.be/Eznium_tk4E" class="video-thumbnail-wrapper venobox">
                                            <img src="{{asset('frontend/img/notes/note_1.jpg')}}" alt="" class="img-fluid">
                                            <span class="video-play-button">
                                                <i data-feather="play"></i>
                                            </span>
                                        </a>
                                        <div class="video-caption">
                                            <h5>Introduction to Sociology - Society and Social Interaction</h5>
                                            <p>We and Our Society</p>
                                            <p>Uploaded: 17th Jan, 2020</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="video-single">
                                        <a data-autoplay="true" data-vbtype="video" href="https://youtu.be/Eznium_tk4E" class="video-thumbnail-wrapper venobox">
                                            <img src="{{asset('frontend/img/notes/note_1.jpg')}}" alt="" class="img-fluid">
                                            <span class="video-play-button">
                                                <i data-feather="play"></i>
                                            </span>
                                        </a>
                                        <div class="video-caption">
                                            <h5>What is Community?</h5>
                                            <p>We and Our Society</p>
                                            <p>Uploaded: 17th Jan, 2020</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="video-single">
                                        <a data-autoplay="true" data-vbtype="video" href="https://youtu.be/Eznium_tk4E" class="video-thumbnail-wrapper venobox">
                                            <img src="{{asset('frontend/img/notes/note_1.jpg')}}" alt="" class="img-fluid">
                                            <span class="video-play-button">
                                                <i data-feather="play"></i>
                                            </span>
                                        </a>
                                        <div class="video-caption">
                                            <h5>What is Community?</h5>
                                            <p>We and Our Society</p>
                                            <p>Uploaded: 17th Jan, 2020</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-exercise" role="tabpanel" aria-labelledby="pills-exercise-tab">
                        <div class="note-wrapper">
                            <h5 class="title mb-2">Questions and Answers</h5>
                            <p class="text-muted">You can combine all the Saralmind into a single one, you can take a component from the Application theme and use it in the Website.</p>
                        </div>
                        <div class="faq-content">
                            <div class="accordion" id="accordionExample">
                                <div class="card border rounded shadow mb-2">
                                    <a data-toggle="collapse" href="#collapseOne" class="faq position-relative collapsed" aria-expanded="false" aria-controls="collapseOne">
                                        <div class="card-header bg-light p-3" id="headingOne">
                                            <h4 class="title mb-0 faq-question"> What is a community? Why do we need to stay in the community? </h4>
                                        </div>
                                    </a>
                                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample" style="">
                                        <div class="card-body exercise-answers">
                                            <p>A group of family or people sharing a common understanding and often the same language, manners, tradition and law with each other is called  a community .And we need to stay in a community because  .We need help from each other to satisfy our needs which make our life easier and comfortable when we live in a community.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="card border rounded shadow mb-2">
                                    <a data-toggle="collapse" href="#collapseTwo" class="faq position-relative collapsed" aria-expanded="false" aria-controls="collapseTwo">
                                        <div class="card-header bg-light p-3" id="headingTwo">
                                            <h4 class="title mb-0 faq-question"> What is society?</h4>
                                        </div>
                                    </a>
                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample" style="">
                                        <div class="card-body  exercise-answers">
                                            <p>Society means the number of people living in a region, by honoring its laws and customs .And its consists of the people of different races, religious, ages and classes .Here society doesn't&nbsp;belong to human being &nbsp;alone ..Society is formed on the basis of geography , religion , culture etc .People lives in a society to satisfy each other needs . A&nbsp;<em>society</em> can be made up of the geographical boundary.</p></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="card border rounded shadow mb-0">
                                    <a data-toggle="collapse" href="#collapsefive" class="faq position-relative collapsed" aria-expanded="false" aria-controls="collapsefive">
                                        <div class="card-header bg-light p-3" id="headingfive">
                                            <h4 class="title mb-0 faq-question">What is society? Write four advantage of society.</h4>
                                        </div>
                                    </a>
                                    <div id="collapsefive" class="collapse" aria-labelledby="headingfive" data-parent="#accordionExample" style="">
                                        <div class="card-body exercise-answers">
                                            <p>Society means the number of people living in a region, by honoring its laws and customs .It consists of the people of different races, religions ages and classes.</p>
                                            <p>The four advantage of society are</p>
                                            <ul>
                                                <li>It includes every relationship which established among the people.</li>
                                                <li>There can be more than one community in a society. Community smaller than society.</li>
                                                <li>It is a network of social relationships which cannot see or touched.</li>
                                                <li>common interests and common objectives are not necessary for society.</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-quiz" role="tabpanel" aria-labelledby="pills-quiz-tab">
                        <div class="note-wrapper">
                            <h5 class="title mb-2">Quiz</h5>
                            <p class="text-muted">You can combine all the Saralmind into a single one, you can take a component from the Application theme and use it in the Website.</p>
                        </div>
                        <div class="quiz-wrapper">
                            <div id="quiz">
                                <div id="quiz-start-screen">
                                    <p><a href="#" id="quiz-start-btn" class="quiz-button">Start</a></p>
                                </div>
                                <div class="show-corrent-ans" style="display:none">
                                    <div class="incorrect-wrapper">
                                        <i class="fa fa-check"></i> <span>Hard</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="quick-note-wrapper" id="floatdiv" style="position:absolute;
    width:200px;height:50px;top:10px;right:10px;
    padding:16px;background:#FFFFFF;
    border:2px solid #2266AA;
    z-index:100">
    </div>
</section>

@endsection

@section('extra-js')
<script type="text/javascript">

$('#quiz').quiz({
    //resultsScreen: '#results-screen',
    //counter: false,
    //homeButton: '#custom-home',
    counterFormat: 'Question %current of %total',
    resultsFormat: 'You scored %score out of %total correct.',
    questions: [{
            'q': 'Our life becomes easier and _____ when  we live in a community.',
            'options': [
                'comfortable',
                'hard',
                'satisfy',
                'difficult'
            ],
            'correctIndex': 1,
            'correctResponse': '<div class="incorrect-wrapper"><i class="fa fa-check"></i> <span>Correct.</span> </div>',
            'incorrectResponse': '<div class="incorrect-wrapper"><i class="fa fa-close"></i> <span>Incorrect.</span></div>'
        },
        {
            'q': 'We feel more _____ in the community than we living alone.',
            'options': [
                'easy',
                'difficult',
                'comfortable',
                'secure'
            ],
            'correctIndex': 1,
            'correctResponse': '<div class="incorrect-wrapper"><i class="fa fa-check"></i> <span>Correct.</span> </div>',
            'incorrectResponse': '<div class="incorrect-wrapper"><i class="fa fa-close"></i> <span>Incorrect.</span></div>'
        },
        {
            'q': 'A community plays a vital role in _____ the mind of a child.',
            'options': [
                'distrubing',
                'diverting',
                'confusing',
                'shaping'
            ],
            'correctIndex': 2,
            'correctResponse': '<div class="incorrect-wrapper"><i class="fa fa-check"></i> <span>Correct.</span> </div>',
            'incorrectResponse': '<div class="incorrect-wrapper"><i class="fa fa-close"></i> <span>Incorrect.</span></div>'
        },
        {
            'q': 'Society is formed on the basis of _____ religion,culture, etc.',
            'options': [
                'cultural society',
                'geography',
                'cooperating',
                'religious society'
            ],
            'correctIndex': 1,
            'correctResponse': '<div class="incorrect-wrapper"><i class="fa fa-check"></i> <span>Correct.</span> </div>',
            'incorrectResponse': '<div class="incorrect-wrapper"><i class="fa fa-close"></i> <span>Incorrect.</span></div>'
        },
        {
            'q': 'Many families live togeather in a place, it is called a _____ .',
            'options': [
                'community',
                'family',
                'neighbourhood',
                'society'
            ],
            'correctIndex': 3,
            'correctResponse': '<div class="incorrect-wrapper"><i class="fa fa-check"></i> <span>Correct.</span> </div>',
            'incorrectResponse': '<div class="incorrect-wrapper"><i class="fa fa-close"></i> <span>Incorrect.</span></div>'
        }
    ]
});

</script>
@endsection
