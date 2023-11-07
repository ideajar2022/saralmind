@extends('frontend.app')
@section('meta')

    <meta name="title" content="{!! strip_tags($lesson->meta_title) !!}"/>
    @if($lesson->meta_description)
        <meta name="description" content="{!! strip_tags($lesson->meta_description) !!}"/>
    @else
        <meta name="description" content="{!! substr(strip_tags($lesson->description), 0, 150) !!}"/>
    @endif
    <meta name="keywords" content="{!! strip_tags($lesson->meta_keyword) !!}"/>

    <title>
        {{ $lesson->grade->name }} | {{ $lesson->subject->name }} | {!! strip_tags($lesson->name) !!} | {{ config('app.name', 'Saralmind') }}
    </title>

@endsection
@section('content')
    @include('frontend.partials.search')
    <section class="inner-header">
        <div class="container">
            <div class="row">
                <div class="d-flex align-items-center inner-header-wrapper">
                    <div class="col-md-9">
                        <div class="page-next">
                            <nav aria-label="breadcrumb" class="d-inline-block">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('class',[$lesson->program->slug,$lesson->faculty->slug,$lesson->grade->slug]) }}">{{ $lesson->grade->name }}</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('syllabus',[$lesson->program->slug,$lesson->faculty->slug,$lesson->grade->slug,$lesson->subject->slug]) }}">{{ $lesson->subject->name }}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ $lesson->name }}</li>
                                </ul>
                            </nav>
                        </div>
                        <div class="inner-title">
                            <h1>{{ $lesson->name }}</h1>
                            <!-- <p>Subject: <span>{{ $lesson->subject->name }}</span></p> -->
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

<section id="lessons" class="lessons-list common-gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 pl-lg-5">
                <div class="overview-wrapper">
                    <h4 class="title mb-2">Overview</h4>
                    {!! $lesson->description !!}
                </div>
                <div class="list-tile">
                    <h4 class="mb-2">Notes</h4>
                </div>
                <div class="notes-list">
                    <div class="row">
                    @foreach($lesson->notes as $note)
                        <div class="col-md-6">
                            <div class="note-block">
                                <div class="note_block-img_wrapper">
                                    <a href="{{ route('note',[$lesson->program->slug,$lesson->faculty->slug,$lesson->grade->slug,$lesson->subject->slug,$lesson->slug,$note->slug])}}" class="link_note-img">
                                        <img src="{{ $note->thumbnail_url }}" alt="{{ $note->title }}" class="img-fluid">
                                    </a>
                                @if($note->exercises->count() >0 || $note->videos->count() >0 || $note->mcqs->count() >0)
                                    <div class="note-meta-links">
                                    @if($note->exercises->count() >0)
                                        <a href="{{ route('note',[$lesson->program->slug,$lesson->faculty->slug,$lesson->grade->slug,$lesson->subject->slug,$lesson->slug,$note->slug])}}?type=exercise"><i data-feather="pen-tool"></i> Exercises</a>
                                    @endif
                                    @if($note->videos->count() >0)
                                        <a href="{{ route('note',[$lesson->program->slug,$lesson->faculty->slug,$lesson->grade->slug,$lesson->subject->slug,$lesson->slug,$note->slug])}}?type=video"><i data-feather="youtube"></i> Videos</a>
                                    @endif
                                    @if($note->mcqs->count() >0)
                                        <a href="{{ route('note',[$lesson->program->slug,$lesson->faculty->slug,$lesson->grade->slug,$lesson->subject->slug,$lesson->slug,$note->slug])}}?type=quiz"><i data-feather="file-text"></i> Practice Test</a>
                                    @endif
                                    </div>
                                @endif
                                </div>
                                <div class="note-desc">
                                    <h4><a href="{{ route('note',[$lesson->program->slug,$lesson->faculty->slug,$lesson->grade->slug,$lesson->subject->slug,$lesson->slug,$note->slug])}}">{{ $note->title }}</a></h4>
                                   <!-- {!! $note->summary !!} -->
                                    <a href="{{ route('note',[$lesson->program->slug,$lesson->faculty->slug,$lesson->grade->slug,$lesson->subject->slug,$lesson->slug,$note->slug])}}" class="btn-more">View Note <i class="fa fa-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="course-sidebar">
                    <div class="course-single-info course-widget">
                        <h3 class="widget-title">Lesson Info</h3>
                        <div class="course-intro">
                            <ul>
                                <li> <i data-feather="book-open"></i> Notes <span>{{ $lesson->notes_count }}</span></li>
                                <li> <i data-feather="youtube"></i> Videos <span>{{ $lesson->notes->sum('videos_count') }}</span></li>
                                <li> <i data-feather="pen-tool"></i> Exercises <span> {{ $lesson->notes->sum('exercises_count') }}</span></li>
                                <li> <i data-feather="file-text"></i> Practice Test <span>{{ $lesson->notes->sum('mcqs_count') }}</span></li>
                                <li> <i data-feather="trending-up"></i> Skill Level <span>Medium</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="course-single-info course-widget">
                        <div class="accordion sidebar-accordion" id="accordionSidebar">
                            <h3 class="widget-title">Syllabus</h3>
                            {!! cache($lesson->subject->slug.'_lesson_sidebar_view') !!}
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
    $("#{{@$lesson->unit->slug}}Accor").addClass("show");
    $("#lesson-{{ $lesson->slug }}").addClass("active");
</script>
@endsection
