@extends('frontend.app')
@section('meta')

<meta name="title" content="{!! strip_tags($note->meta_title) !!}" />
@if($note->meta_description)
<meta name="description" content="{!! strip_tags($note->meta_description) !!}" />
@else
<meta name="description" content="{!! substr(strip_tags($note->description), 0, 150) !!}" />
@endif
<meta name="keywords" content="{!! strip_tags($note->meta_keyword) !!}" />
<meta property="og:image" content="{{ $note->subject->image_url }}" />

<title>
    {!! strip_tags($note->title) !!} | Notes, Videos, QA and Tests |
    {{ $note->grade->name }}>{{ $note->subject->name }}>{!! strip_tags($note->lesson->name) !!} |
    {{ config('app.name', 'Saralmind') }}
</title>

@endsection
@section('content')
@include('frontend.partials.search')

<section class="inner-header">
    <div class="container">
        <div class="row">
            <div class="col-md-9" style="align-self: center;">
                <div class="page-next">
                    <nav aria-label="breadcrumb" class="d-inline-block">
                        <ul class="breadcrumb bg-white rounded shadow mb-0">
                            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                            <li class="breadcrumb-item"><a
                                    href="{{ route('class',[$note->program->slug,$note->faculty->slug,$note->grade->slug])}}">{{ $note->grade->name }}</a></li>
                            <li class="breadcrumb-item"><a
                                    href="{{route('syllabus',[$note->program->slug,$note->faculty->slug,$note->grade->slug,$note->subject->slug])}}">{{ $note->subject->name }}</a>
                            </li>
                            <li class="breadcrumb-item"><a
                                    href="{{route('lesson',[$note->program->slug,$note->faculty->slug,$note->grade->slug,$note->subject->slug,$note->lesson->slug])}}">{{ $note->lesson->name }}</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $note->lesson->name }}</li>
                        </ul>
                    </nav>
                </div>
                <div class="inner-title">
                    <h1>{{ $note->title }}</h1>
                    <p>Subject: <span>{{ $note->subject->name }}</span></p>
                </div>
            </div>
            <div class="col-md-3 col-12">
                <div class="top-svg-wrapper">
                    <img src="{{asset('frontend/img/new-img/study.svg')}}" alt="">
                </div>
            </div>
        </div>
    </div>
</section>

<section id="lessons" class="lessons-list common-gap">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="course-sidebar">
                    <div class="course-single-info course-widget">
                        <div class="accordion sidebar-accordion" id="accordionSidebar">
                            <h3 class="widget-title">Syllabus</h3>

                            @include('backend.cache.note-sidebar',['subject'=>$note->subject])

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="overview-wrapper">
                    <h4 class="title mb-2">Overview</h4>
                    {!! $note->summary !!}
                </div>
                <div id="sticky-anchor"></div>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="main-note-single-wrapper" id="sticky">
                            <ul class="nav nav-pills mb-3 d-block" id="pills-tab" role="tablist">
                                <li class="nav-link">
                                    <a data-type="" class="nav-link {{ (request('type') == '') ? 'active':''}}"
                                        id="pills-home-tab" data-toggle="pill" href="#pills-note" role="tab"
                                        aria-controls="pills-home"
                                        aria-selected="{{ (request('type') == '') ? 'true':'false'}}">
                                        <img height="20px" width="20px" src="{{asset('frontend/img/new-img/notes.png')}}" alt="">
                                        Note
                                    </a>
                                </li>
                                <li class="nav-link">
                                    <a data-type="things-to-remember"
                                        class="nav-link {{ (request('type') == 'things-to-remember') ? 'active':''}}"
                                        id="pills-profile-tab" data-toggle="pill" href="#pills-ttr" role="tab"
                                        aria-controls="pills-ttr"
                                        aria-selected="{{ (request('type') == 'things-to-remember') ? 'true':'false'}}">
                                        <img height="20px" width="20px" src="{{asset('frontend/img/new-img/practicetest.png')}}" alt="">
                                        Things
                                        to remember</a>
                                </li>
                                @if($note->videos->count() >0)
                                <li class="nav-link">
                                    <a data-type="video"
                                        class="nav-link {{ (request('type') == 'video') ? 'active':''}}"
                                        id="pills-videos-tab" data-toggle="pill" href="#pills-videos" role="tab"
                                        aria-controls="pills-videos"
                                        aria-selected="{{ (request('type') == 'video') ? 'true':'false'}}">
                                        <img height="20px" width="20px" src="{{asset('frontend/img/new-img/video.png')}}" alt="">
                                        Videos</a>
                                </li>
                                @endif
                                @if($note->exercises->count() >0)
                                <li class="nav-link">
                                    <a data-type="exercise"
                                        class="nav-link {{ (request('type') == 'exercise') ? 'active':''}}"
                                        id="pills-exercise-tab" data-toggle="pill" href="#pills-exercise" role="tab"
                                        aria-controls="pills-exercise"
                                        aria-selected="{{ (request('type') == 'exercise') ? 'true':'false'}}">
                                        <img height="20px" width="20px" src="{{asset('frontend/img/new-img/exercises.png')}}" alt="">
                                        Exercise</a>
                                </li>
                                @endif
                                @if($note->mcqs->count() >0)
                                <li class="nav-link">
                                    <a data-type="quiz" class="nav-link {{ (request('type') == 'quiz') ? 'active':''}}"
                                        id="pills-quiz-tab" data-toggle="pill" href="#pills-quiz" role="tab"
                                        aria-controls="pills-quiz"
                                        aria-selected="{{ (request('type') == 'quiz') ? 'true':'false'}}">
                                        <img height="20px" width="20px" src="{{asset('frontend/img/new-img/skills.png')}}" alt="">
                                        Quiz</a>
                                </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-9">
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade {{ (request('type') == '') ? 'show active':''}} " id="pills-note"
                                role="tabpanel" aria-labelledby="pills-note-tab">

                                <!-- <div class="note-wrapper"> -->
                                    <!-- <h5 class="title mb-2">{{ $note->title }}</h5> -->
                                    @php
                                    $content = explode("</p>", $note->description,2);

                                    @endphp
                                    <!-- {!! substr($note->description,0,10) !!} -->
                                    {!! @$content[0] !!}
                                    {!! substr(@$content[1], 0, 750) !!} ....

                                    <div class="alert alert-warning" role="alert">
                                    <center>
                                      <h6>
                                          Please 
                                          <a href="javascript:void(0)" target="_blank" class="showLoginPop" >
                                            Login </a> or 
                                            <a href="javascript:void(0)" target="_blank" class="showRegisterPop" > Sign Up 
                                          </a>   to get full notes. Don't worry, Registration is free.
                                      </h6>
                                    </center>  
                                    </div>
                                <!-- </div> -->
                                <!-- Note wrapper div end -->

                                <!--  <div class="comments">
                            <div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#configurator" data-numposts="5" data-width="100%"></div>

                        </div> -->

                                <!-- <div class="comments">
                            <h3>4 Comments</h3>
                            <ul class="comments__list">
                                <li>
                                    <div class="comment">
                                        <div class="comment__avatar">
                                            <img alt="Image" src="{{url('frontend/img/author-3.jpg')}}">
                                        </div>
                                        <div class="comment__body">
                                            <h5 class="type--fine-print">Anne Brady</h5>
                                            <div class="comment__meta">
                                                <span>10th May 2016</span>
                                                <a href="#">Reply</a>
                                            </div>
                                            <p>
                                                Affordances food-truck SpaceTeam unicorn disrupt integrate viral pair programming big data pitch deck intuitive intuitive prototype long shadow. Responsive hacker intuitive driven
                                            </p>
                                        </div>
                                    </div>

                                    <div class="comment">
                                        <div class="comment__avatar">
                                            <img alt="Image" src="{{url('frontend/img/author-3.jpg')}}">
                                        </div>
                                        <div class="comment__body">
                                            <h5 class="type--fine-print">Jacob Sims</h5>
                                            <div class="comment__meta">
                                                <span>10th May 2016</span>
                                                <a href="#">Reply</a>
                                            </div>
                                            <p>
                                                Prototype intuitive intuitive thought leader personas parallax paradigm long shadow engaging unicorn SpaceTeam fund ideate paradigm.
                                            </p>
                                        </div>
                                    </div>

                                </li>
                                <li>
                                    <div class="comment">
                                        <div class="comment__avatar">
                                            <img alt="Image" src="{{url('frontend/img/author-3.jpg')}}">
                                        </div>
                                        <div class="comment__body">
                                            <h5 class="type--fine-print">Kelly Dewitt</h5>
                                            <div class="comment__meta">
                                                <span>11th May 2016</span>
                                                <a href="#">Reply</a>
                                            </div>
                                            <p>
                                                Responsive hacker intuitive driven waterfall is so 2000 and late intuitive cortado bootstrapping venture capital. Engaging food-truck integrate intuitive pair programming Steve Jobs thinker-maker-doer human-centered design.
                                            </p>
                                            <p>
                                                Affordances food-truck SpaceTeam unicorn disrupt integrate viral pair programming big data pitch deck intuitive intuitive prototype long shadow. Responsive hacker intuitive driven
                                            </p>
                                        </div>
                                    </div>

                                </li>
                                <li>
                                    <div class="comment">
                                        <div class="comment__avatar">
                                            <img alt="Image" src="{{url('frontend/img/author-3.jpg')}}">
                                        </div>
                                        <div class="comment__body">
                                            <h5 class="type--fine-print">Luke Smith</h5>
                                            <div class="comment__meta">
                                                <span>11th May 2016</span>
                                                <a href="#">Reply</a>
                                            </div>
                                            <p>
                                                Unicorn disrupt integrate viral pair programming big data pitch deck intuitive intuitive prototype long shadow. Responsive hacker intuitive driven
                                            </p>
                                        </div>
                                    </div>

                                </li>
                            </ul>
                        </div>
                        <div class="card shadow rounded border-0 mt-4">
                            <div class="card-body">
                                <h5 class="card-title mb-0">Leave A Comment :</h5>

                                <form class="mt-3">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group position-relative">
                                                <label>Your Comment</label>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-circle fea icon-sm icons"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg>
                                                <textarea id="message" placeholder="Your Comment" rows="5" name="message" class="form-control pl-5" required=""></textarea>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group position-relative">
                                                <label>Name <span class="text-danger">*</span></label>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user fea icon-sm icons"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                                <input id="name" name="name" type="text" placeholder="Name" class="form-control pl-5" required="">
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group position-relative">
                                                <label>Your Email <span class="text-danger">*</span></label>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail fea icon-sm icons"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                                                <input id="email" type="email" placeholder="Email" name="email" class="form-control pl-5" required="">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="send">
                                            <button type="submit" class="btn btn-primary btn-block">Send Message</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div> -->
                                @if($note->mcqs->count() >0)
                                <!-- take a quiz suggestion -->
                                <div class="alert quiz-alert-info" role="alert">
                                    <div class="text">
                                        <p>Have you finished reading this lesson? If you have and you do feel confident
                                            enough,
                                            then let's take a quiz, shall we?</p>
                                    </div>
                                    <a href="#pills-quiz" class="quiz-button">Start Quiz</a>
                                </div>
                                <!-- take a quiz suggestion -->
                                @endif
                            </div>
                            <div class="tab-pane fade {{ (request('type') == 'things-to-remember') ? 'show active':''}} "
                                id="pills-ttr" role="tabpanel" aria-labelledby="pills-ttr-tab">
                                <div class="note-wrapper">
                                    <h5 class="title mb-2">Things to remember</h5>
                                    {!! $note->things_to_remember !!}
                                    <!--                             <ul>
                                <li>It includes every relationship which established among the people.</li>
                                <li>There can be more than one community in a society. Community smaller than society.</li>
                                <li>It is a network of social relationships which cannot see or touched.</li>
                                <li>common interests and common objectives are not necessary for society.</li>
                            </ul> -->
                                </div>
                            </div>
                            @if($note->videos->count() >0)
                            <div class="tab-pane fade {{ (request('type') == 'video') ? 'show active':''}} "
                                id="pills-videos" role="tabpanel" aria-labelledby="pills-videos-tab">
                                <div class="note-wrapper">
                                    <h5 class="title mb-2">Videos for {{ $note->title }}</h5>

                                </div>
                                <div class="videos-list">
                                    <div class="row">
                                        @foreach($note->videos as $video)
                                        <div class="col-sm-6">
                                            <div class="video-single">
                                                <a data-autoplay="true" data-vbtype="video" href="{{ $video->url }}"
                                                    class="video-thumbnail-wrapper venobox">
                                                    <img src="https://img.youtube.com/vi/{{ $video->key}}/0.jpg" alt=""
                                                        class="img-fluid">
                                                    <span class="video-play-button">
                                                        <i data-feather="play"></i>
                                                    </span>
                                                </a>
                                                <div class="video-caption">
                                                    <h5>{{ $video->title }}</h5>

                                                </div>
                                            </div>
                                        </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                            @endif
                            @if($note->exercises->count() >0)
                            <div class="tab-pane fade {{ (request('type') == 'exercise') ? 'show active':''}} "
                                id="pills-exercise" role="tabpanel" aria-labelledby="pills-exercise-tab">
                                <div class="note-wrapper">
                                    <h5 class="title mb-2">Questions and Answers</h5>

                                </div>
                                <div class="faq-content">
                                    <div class="accordion" id="accordionExample">
                                        @foreach($note->exercises as $key=>$exercise)
                                        <div class="card border rounded shadow mb-2">
                                            <a data-toggle="collapse" href="#collapse{{$key}}"
                                                class="faq position-relative collapsed" aria-expanded="false"
                                                aria-controls="collapseOne">
                                                <div class="card-header bg-light p-3" id="heading{{$key}}">
                                                    <h4 class="title mb-0 faq-question">{!! @$exercise->question !!}
                                                    </h4>
                                                </div>
                                            </a>
                                            <div id="collapse{{$key}}" class="collapse"
                                                aria-labelledby="heading{{ $key }}" data-parent="#accordionExample"
                                                style="">
                                                <div class="card-body exercise-answers">
                                                    <div class="alert alert-warning" role="alert">
                                                    <center>
                                                      <h6>
                                                          Please 
                                                          <a href="javascript:void(0)" target="_blank" class="showLoginPop" >
                                                            Login </a> or 
                                                            <a href="javascript:void(0)" target="_blank" class="showRegisterPop" > Sign Up 
                                                          </a>   to get answers. Don't worry, Registration is free.
                                                      </h6>
                                                    </center>  
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                            @endif
                            @if($note->mcqs->count() >0)
                            <div class="tab-pane fade {{ (request('type') == 'quiz') ? 'show active':''}} "
                                id="pills-quiz" role="tabpanel" aria-labelledby="pills-quiz-tab">
                                <div class="note-wrapper">
                                    <h5 class="title mb-2">Quiz</h5>

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
                            @endif
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
$("#{{@$note->unit->slug}}Accor").addClass("show");
$("#lesson-{{ $note->lesson->slug }}").addClass("active");
$("#lesson-{{ $note->lesson->slug }}").addClass("opened-lesson");
$("#note-{{ $note->slug }}").addClass("active");
$('#quiz').quiz({
    //resultsScreen: '#results-screen',
    //counter: false,
    //homeButton: '#custom-home',
    counterFormat: 'Question %current of %total',
    resultsFormat: 'You scored %score out of %total correct.',
    questions: {
        !!$note - > mcqs!!
    }
});
$('.main-note-single-wrapper ul li a').on('click', function(e) {
    e.preventDefault()
    updateURL($(this).data("type"))
})

function updateURL(type) {
    if (history.pushState) {
        var newurl = window.location.protocol + "//" + window.location.host + window.location.pathname + '?type=' +
            type;
        window.history.pushState({
            path: newurl
        }, '', newurl);
        $("input[name='url']").val(window.location.href)
    }
}

function sticky_relocate() {
    var window_top = $(window).scrollTop();
    var div_top = $('#sticky-anchor').offset().top;
    if (window_top > div_top) {
        $('#sticky').addClass('stick');
    } else {
        $('#sticky').removeClass('stick');
    }
}
$(function() {
    $(window).scroll(sticky_relocate);
    sticky_relocate();
});
$('.note-wrapper table').wrap('<div class="table-responsive"></div>');
$('.note-wrapper table').addClass('table');
$("#lessons").on("contextmenu", function(e) {
    return false;
});
$('#lessons').bind('cut copy paste', function(e) {
    e.preventDefault();
});
</script>
{!! cache('tooltip_view') !!}

@endsection