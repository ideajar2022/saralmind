@extends('frontend.app')
@section('meta')

<meta name="title" content="{!! strip_tags($grade->subjects[0]->meta_title) !!}" />
@if($grade->subjects[0]->meta_description)
<meta name="description" content="{!! strip_tags($grade->subjects[0]->meta_description) !!}" />
@else
<meta name="description" content="{!! substr(strip_tags($grade->subjects[0]->description), 0, 150) !!}" />
@endif

<meta name="keywords" content="{!! strip_tags($grade->subjects[0]->meta_keyword) !!}" />
<meta property="og:image" content="{{ $subject->image_url }}" />

<title>
    {{ $grade->subjects[0]->name }} | {{ $grade->name }} |  {{ config('app.name', 'Saralmind') }}
</title>
@endsection
@section('content')
@include('frontend.partials.search')
@php
$subject = $grade->subjects[0];
@endphp
<section class="inner-header">
    <div class="container">
        <div class="row">
            <div class="d-flex align-items-center inner-header-wrapper">
                <div class="col-md-9">
                    <div class="page-next">
                        <nav aria-label="breadcrumb" class="d-inline-block">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                                <li class="breadcrumb-item">
                               

                                </li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $grade->subjects[0]->name }}
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="inner-title">
                        <h1>{{ $grade->subjects[0]->name }}</h1>
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

<section class="lesson-list-accordion common-gap">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h4 class="mb-5">Subject Info</h4>
                <div class="row">
                    <div class="col-md-2 col-4 info-wrapper">
                        <img src="{{asset('frontend/img/new-img/lesson.png')}}" alt="">
                        <h6>Lesson: {{ $grade->subjects[0]->lessons_count }}</h6>
                    </div>
                    <div class="col-md-2 col-4 info-wrapper">
                        <img src="{{asset('frontend/img/new-img/notes.png')}}" alt="">
                        <h6>Notes: {{ $subject->notesCount() }}</h6>
                    </div>
                    <div class="col-md-2 col-4 info-wrapper">
                        <img src="{{asset('frontend/img/new-img/video.png')}}" alt="">
                        <h6>Videos: {{ $subject->video_count }}</h6>
                    </div>
                    <div class="col-md-2 col-4 info-wrapper">
                        <img src="{{asset('frontend/img/new-img/exercises.png')}}" alt="">
                        <h6>Exercises: {{ $subject->exercise_count }}</h6>
                    </div>
                    <div class="col-md-2 col-4 info-wrapper">
                        <img src="{{asset('frontend/img/new-img/practicetest.png')}}" alt="">
                        <h6>Practice Test: {{ $subject->mcqs_count }}</h6>
                    </div>
                    <div class="col-md-2 col-4 info-wrapper">
                        <img src="{{asset('frontend/img/new-img/skills.png')}}" alt="">
                        <h6>Skill Level: <span>Medium</span></h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>




<section id="lessons" class="lessons-list common-gap">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="overview-wrapper">
                    <h2>{!! $grade->subjects[0]->description !!}</h2>
                </div>
                @php
                $noteCount = 0;
                $videoCount = 0;
                $mcqCount = 0;
                $exerciseCount = 0;
                @endphp
                @if($grade->subjects[0]->units->count()>0)

                @foreach($grade->subjects[0]->units as $k=>$unit)
                <div class="list-tile">
                    <h4 class="mb-2">{{ $unit->name }}</h4>
                </div>
                <div class="accordion" id="accordionExample1_{{$k}}">
                    @foreach($unit->lessons as $key=>$lesson)
                    @php
                    $noteCount += $lesson->notes_count;
                    $videoCount += $lesson->notes->sum('videos_count');
                    $exerciseCount += $lesson->notes->sum('exercises_count');
                    $mcqCount += $lesson->notes->sum('mcqs_count');
                    @endphp

                    <div class="card shadow-sm">
                        <div class="card-header" id="heading_unit_{{ $k }}_{{$key}}">
                            <div class="collapsed" data-toggle="collapse" data-target="#collapse_unit_{{ $k }}_{{$key}}"
                                aria-expanded="false" aria-controls="collapse_unit_{{ $k }}_{{$key}}">
                                <h2 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button">{{ $lesson->name }}  </button>
                                </h2>
                            </div>
                        </div>
                        <div id="collapse_unit_{{ $k }}_{{$key}}" class="collapse"
                            aria-labelledby="heading_unit_{{ $k }}_{{$key}}" data-parent="#accordionExample1_{{$k}}">
                            <div class="card-body">
                                <div class="row">
                                    @foreach($lesson->notes as $note)
                                    <div class="col-sm-6 col-12">
                                        <div class="note-block">
                                            <div class="note_block-img_wrapper">
                                                <a href="{{ route('note',[@$grade->program->slug,@$grade->faculty->slug,$grade->slug,$grade->subjects[0]->slug,$lesson->slug,$note->slug]) }}"
                                                    class="link_note-img">
                                                    <img src="{{ $note->thumbnail_url }}" alt="{{ $note->title }}"
                                                        class="img-fluid">
                                                </a>
                                                @if($note->exercises->count() >0 || $note->videos->count() >0 ||
                                                $note->mcqs->count() >0)
                                                <div class="note-meta-links">
                                                  



                                                </div>
                                                @endif
                                            </div>
                                            <div class="note-desc">
                                                <h4><a
                                                        href="{{ route('note',[@$grade->program->slug,@$grade->faculty->slug,$grade->slug,$grade->subjects[0]->slug,$lesson->slug,$note->slug]) }}">{{ $note->title }} </a>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endforeach
                @else
                <div class="accordion common-gap" id="accordionExample1">
                    @foreach($grade->subjects[0]->lessons as $k=>$lesson)
                    @php
                    $noteCount += $lesson->notes_count;
                    $videoCount += $lesson->notes->sum('videos_count');
                    $exerciseCount += $lesson->notes->sum('exercises_count');
                    $mcqCount += $lesson->notes->sum('mcqs_count');
                    @endphp
                    <div class="card shadow-sm">
                        <div class="card-header" id="heading_lesson_{{$k}}">
                            <div class="collapsed" data-toggle="collapse" data-target="#collapse_lesson_{{ $k }}"
                                aria-expanded="false" aria-controls="collapse_lesson_{{ $k }}">
                                <h2 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button">{{ $lesson->name }}</button>
                                </h2>
                            </div>

                        </div>
                        <div id="collapse_lesson_{{$k}}" class="collapse" aria-labelledby="heading_lesson_{{$k}}"
                            data-parent="#accordionExample1">
                            <div class="card-body">
                                <div class="row">
                                    <!-- <h3>This is our note</h3> -->
                                    @foreach($lesson->notes as $key=>$note)
                                    <div class="col-sm-6 col-12">
                                        <div class="d-flex align-items-center note-block-wrapper" style="border: 1px solid rgb(212, 212, 212);
                                                    padding: 1.25rem;
                                                    border-radius: 6px;
                                                    background-color: #fff;
                                                    margin-bottom: 1.25rem;">
                                            <div class="note_block-img_wrapper">
                                                @if(is_null($note->image))
                                                <a href="{{ route('note',[@$grade->program->slug,@$grade->faculty->slug,$grade->slug,$grade->subjects[0]->slug,$lesson->slug,$note->slug]) }}"
                                                    class="link_note-img">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-pen-tool">
                                                <path d="M12 19l7-7 3 3-7 7-3-3z"></path>
                                                <path d="M18 13l-1.5-7.5L2 2l3.5 14.5L13 18l5-5z"></path>
                                                <path d="M2 2l7.586 7.586"></path>
                                                <circle cx="11" cy="11" r="2"></circle>
                                            </svg>
                                                </a>
                                                @else
                                                <a href="{{ route('note',[@$grade->program->slug,@$grade->faculty->slug,$grade->slug,$grade->subjects[0]->slug,$lesson->slug,$note->slug]) }}"
                                                    class="link_note-img">
                                                    <img width="200px" src="{{ ($note->thumbnail_url) }}"
                                                        class="img-fluid">
                                                </a>
                                                @endif
                                                @if($note->exercises->count() >0 || $note->videos->count() >0 ||
                                                $note->mcqs->count() >0)
                                                <div class="note-meta-links">
                                                   




                                                </div>
                                                @endif
                                            </div>
                                            <div class="text-wrapper" style="margin-left: 1.875rem;">
                                                <h4>
                                                <a style="font-size:14px; color: #000;" href="{{ route('note',[@$grade->program->slug,@$grade->faculty->slug,$grade->slug,$grade->subjects[0]->slug,$lesson->slug,$note->slug]) }}">{{ $note->title }}
                                                    </a>
                                                </h4>
                                                <a href="{{ route('note',[@$grade->program->slug,@$grade->faculty->slug,$grade->slug,$grade->subjects[0]->slug,$lesson->slug,$note->slug]) }}">
                                                <p style="margin: 0;
                                                            font-size: .75rem;
                                                            text-decoration: underline; color: #02b4fe;">Read Chapter</p>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif
    </div>
</section>


@endsection
