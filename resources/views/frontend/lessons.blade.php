@extends('frontend.app')

@section('content')

<section class="inner-header">
    <div class="container">
        <div class="row">
            <div class="d-flex align-items-center inner-header-wrapper">
                <div class="col-md-9 col-12">
                    <div class="page-next">
                        <nav aria-label="breadcrumb" class="d-inline-block">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="saralmind.html">Home</a></li>
                                <li class="breadcrumb-item">
                                    <a href="">Grade 10</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="">Math</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Force And Motion</li>
                            </ul>
                        </nav>
                    </div>
                    <div class="inner-title">
                        <h1>Force and Motion</h1>
                        <p>Complete coverage of force and motion</p>
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
            <div class="col-12">
                <div class="course-sidebar">
                    <div class="course-single-info course-widget">
                        <div class="accordion sidebar-accordion" id="accordionSidebar">
                            <h3 class="widget-title">Syllabus</h3>
                            <div class="card">
                                <div class="card-header" id="headingTwo">
                                    <h5 class="mb-0"><button class="btn btn-link" type="button" data-toggle="collapse"
                                            data-target="#lessonsAccor" aria-expanded="false"
                                            aria-controls="lessonsAccor">
                                            Lessons
                                        </button></h5>
                                </div>
                                <div id="lessonsAccor" class="collapse sidebar-inner_list" aria-labelledby="headingTwo"
                                    data-parent="#accordionSidebar">
                                    <div class="card-body">
                                        <ul>
                                        @foreach($lessons as $lesson)
                                            <li id="lesson-measurement-1" class="">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-point feather feather-check-circle"
                                                    width="30" height="30" viewBox="0 0 24 24" stroke-width="1.5"
                                                    stroke="#02b4fe" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="#02b4fe"></path>
                                                    <circle cx="12" cy="12" r="4"></circle>
                                                </svg>
                                                
                                                <a
                                                    href="https://saralmind.com/class-7/science-1/measurement-1">{{ $lesson->name }}</a>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-chevron-up collapse-inner">
                                                    <polyline points="18 15 12 9 6 15"></polyline>
                                                </svg>
                                                <ul>
                                                    <li id="note-measurement:-length-and-mass" class="">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="feather feather-circle">
                                                            <circle cx="12" cy="12" r="10"></circle>
                                                        </svg>
                                                        <a
                                                            href="https://saralmind.com/class-7/science-1/measurement-1/measurement:-length-and-mass">Measurement:
                                                            Length and Mass</a>
                                                    </li>
                                                    <li id="note-measurement;-time,-regular-and-irregular-objects,-area-and-volume"
                                                        class=""><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-circle">
                                                            <circle cx="12" cy="12" r="10"></circle>
                                                        </svg><a
                                                            href="https://saralmind.com/class-7/science-1/measurement-1/measurement;-time,-regular-and-irregular-objects,-area-and-volume">Measurement;
                                                            Time, Regular and Irregular Objects, Area and Volume</a>
                                                    </li>
                                                </ul>
                                            </li>
                                        @endforeach
                                            <li id="lesson-force-and-motion" class="active opened-lesson">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-point feather feather-check-circle"
                                                    width="30" height="30" viewBox="0 0 24 24" stroke-width="1.5"
                                                    stroke="#02b4fe" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="#02b4fe"></path>
                                                    <circle cx="12" cy="12" r="4"></circle>
                                                </svg>
                                                <a href="https://saralmind.com/class-7/science-1/force-and-motion">Force
                                                    and Motion</a><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-chevron-up collapse-inner">
                                                    <polyline points="18 15 12 9 6 15"></polyline>
                                                </svg>
                                                <ul>
                                                    <li id="note-force-and-motion" class="active">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="icon icon-tabler icon-tabler-chevron-right"
                                                            width="18" height="18" viewBox="0 0 24 24"
                                                            stroke-width="1.5" stroke="#02b4fe" fill="none"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                            <polyline points="9 6 15 12 9 18"></polyline>
                                                        </svg>
                                                        <a
                                                            href="https://saralmind.com/class-7/science-1/force-and-motion/force-and-motion">Force
                                                            and Motion</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li id="lesson-simple-machine-1" class="">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-point feather feather-check-circle"
                                                    width="30" height="30" viewBox="0 0 24 24" stroke-width="1.5"
                                                    stroke="#02b4fe" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="#02b4fe"></path>
                                                    <circle cx="12" cy="12" r="4"></circle>
                                                </svg>
                                                <a href="https://saralmind.com/class-7/science-1/simple-machine-1">Simple
                                                    Machine</a><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-chevron-up collapse-inner">
                                                    <polyline points="18 15 12 9 6 15"></polyline>
                                                </svg>
                                                <ul>
                                                    <li id="note-simple-machine-3" class=""><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="feather feather-circle">
                                                            <circle cx="12" cy="12" r="10"></circle>
                                                        </svg><a
                                                            href="https://saralmind.com/class-7/science-1/simple-machine-1/simple-machine-3">Simple
                                                            Machine</a></li>
                                                </ul>
                                            </li>
                                            <li id="lesson-pressure-2" class="">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-point feather feather-check-circle"
                                                    width="30" height="30" viewBox="0 0 24 24" stroke-width="1.5"
                                                    stroke="#02b4fe" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="#02b4fe"></path>
                                                    <circle cx="12" cy="12" r="4"></circle>
                                                </svg>
                                                <a
                                                    href="https://saralmind.com/class-7/science-1/pressure-2">Pressure</a><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-chevron-up collapse-inner">
                                                    <polyline points="18 15 12 9 6 15"></polyline>
                                                </svg>
                                                <ul>
                                                    <li id="note-pressure-2" class=""><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="feather feather-circle">
                                                            <circle cx="12" cy="12" r="10"></circle>
                                                        </svg><a
                                                            href="https://saralmind.com/class-7/science-1/pressure-2/pressure-2">Pressure</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li id="lesson-work-energy-and-power-1" class="">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-point feather feather-check-circle"
                                                    width="30" height="30" viewBox="0 0 24 24" stroke-width="1.5"
                                                    stroke="#02b4fe" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="#02b4fe"></path>
                                                    <circle cx="12" cy="12" r="4"></circle>
                                                </svg>
                                                <a
                                                    href="https://saralmind.com/class-7/science-1/work-energy-and-power-1">Work,
                                                    Energy and Power</a><svg xmlns="http://www.w3.org/2000/svg"
                                                    width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    class="feather feather-chevron-up collapse-inner">
                                                    <polyline points="18 15 12 9 6 15"></polyline>
                                                </svg>
                                                <ul>
                                                    <li id="note-work-energy-and-power-1" class=""><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="feather feather-circle">
                                                            <circle cx="12" cy="12" r="10"></circle>
                                                        </svg><a
                                                            href="https://saralmind.com/class-7/science-1/work-energy-and-power-1/work-energy-and-power-1">Work,
                                                            Energy and Power</a></li>
                                                </ul>
                                            </li>
                                            <li id="lesson-heat-2" class="">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-point feather feather-check-circle"
                                                    width="30" height="30" viewBox="0 0 24 24" stroke-width="1.5"
                                                    stroke="#02b4fe" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="#02b4fe"></path>
                                                    <circle cx="12" cy="12" r="4"></circle>
                                                </svg>
                                                <a href="https://saralmind.com/class-7/science-1/heat-2">Heat</a><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-chevron-up collapse-inner">
                                                    <polyline points="18 15 12 9 6 15"></polyline>
                                                </svg>
                                                <ul>
                                                    <li id="note-heat" class=""><svg xmlns="http://www.w3.org/2000/svg"
                                                            width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-circle">
                                                            <circle cx="12" cy="12" r="10"></circle>
                                                        </svg><a
                                                            href="https://saralmind.com/class-7/science-1/heat-2/heat">Heat</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li id="lesson-light-1" class="">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-point feather feather-check-circle"
                                                    width="30" height="30" viewBox="0 0 24 24" stroke-width="1.5"
                                                    stroke="#02b4fe" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="#02b4fe"></path>
                                                    <circle cx="12" cy="12" r="4"></circle>
                                                </svg>
                                                <a href="https://saralmind.com/class-7/science-1/light-1">Light</a><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-chevron-up collapse-inner">
                                                    <polyline points="18 15 12 9 6 15"></polyline>
                                                </svg>
                                                <ul>
                                                    <li id="note-light-2" class=""><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="feather feather-circle">
                                                            <circle cx="12" cy="12" r="10"></circle>
                                                        </svg><a
                                                            href="https://saralmind.com/class-7/science-1/light-1/light-2">Light</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li id="lesson-sound-2" class="">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-point feather feather-check-circle"
                                                    width="30" height="30" viewBox="0 0 24 24" stroke-width="1.5"
                                                    stroke="#02b4fe" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="#02b4fe"></path>
                                                    <circle cx="12" cy="12" r="4"></circle>
                                                </svg>
                                                <a href="https://saralmind.com/class-7/science-1/sound-2">Sound</a><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-chevron-up collapse-inner">
                                                    <polyline points="18 15 12 9 6 15"></polyline>
                                                </svg>
                                                <ul>
                                                    <li id="note-sound-2" class=""><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="feather feather-circle">
                                                            <circle cx="12" cy="12" r="10"></circle>
                                                        </svg><a
                                                            href="https://saralmind.com/class-7/science-1/sound-2/sound-2">Sound</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li id="lesson-magnetism-1" class="">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-point feather feather-check-circle"
                                                    width="30" height="30" viewBox="0 0 24 24" stroke-width="1.5"
                                                    stroke="#02b4fe" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="#02b4fe"></path>
                                                    <circle cx="12" cy="12" r="4"></circle>
                                                </svg>
                                                <a
                                                    href="https://saralmind.com/class-7/science-1/magnetism-1">Magnetism</a><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-chevron-up collapse-inner">
                                                    <polyline points="18 15 12 9 6 15"></polyline>
                                                </svg>
                                                <ul>
                                                    <li id="note-magnetism-2" class=""><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="feather feather-circle">
                                                            <circle cx="12" cy="12" r="10"></circle>
                                                        </svg><a
                                                            href="https://saralmind.com/class-7/science-1/magnetism-1/magnetism-2">Magnetism</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li id="lesson-electricity" class="">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-point feather feather-check-circle"
                                                    width="30" height="30" viewBox="0 0 24 24" stroke-width="1.5"
                                                    stroke="#02b4fe" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="#02b4fe"></path>
                                                    <circle cx="12" cy="12" r="4"></circle>
                                                </svg>
                                                <a
                                                    href="https://saralmind.com/class-7/science-1/electricity">Electricity</a><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-chevron-up collapse-inner">
                                                    <polyline points="18 15 12 9 6 15"></polyline>
                                                </svg>
                                                <ul>
                                                    <li id="note-electricity-2" class=""><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="feather feather-circle">
                                                            <circle cx="12" cy="12" r="10"></circle>
                                                        </svg><a
                                                            href="https://saralmind.com/class-7/science-1/electricity/electricity-2">Electricity</a>
                                                    </li>
                                                    <li id="note-current-electricity" class=""><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="feather feather-circle">
                                                            <circle cx="12" cy="12" r="10"></circle>
                                                        </svg><a
                                                            href="https://saralmind.com/class-7/science-1/electricity/current-electricity">Current
                                                            Electricity</a></li>
                                                </ul>
                                            </li>
                                            <li id="lesson-matter-1" class="">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-point feather feather-check-circle"
                                                    width="30" height="30" viewBox="0 0 24 24" stroke-width="1.5"
                                                    stroke="#02b4fe" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="#02b4fe"></path>
                                                    <circle cx="12" cy="12" r="4"></circle>
                                                </svg>
                                                <a
                                                    href="https://saralmind.com/class-7/science-1/matter-1">Matter</a><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-chevron-up collapse-inner">
                                                    <polyline points="18 15 12 9 6 15"></polyline>
                                                </svg>
                                                <ul>
                                                    <li id="note-introduction-to-matter-and-elements" class=""><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="feather feather-circle">
                                                            <circle cx="12" cy="12" r="10"></circle>
                                                        </svg><a
                                                            href="https://saralmind.com/class-7/science-1/matter-1/introduction-to-matter-and-elements">Introduction
                                                            to Matter and Elements</a></li>
                                                    <li id="note-composition-of-matter-and-change-in-matter" class="">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="feather feather-circle">
                                                            <circle cx="12" cy="12" r="10"></circle>
                                                        </svg><a
                                                            href="https://saralmind.com/class-7/science-1/matter-1/composition-of-matter-and-change-in-matter">Composition
                                                            of Matter and Change in Matter</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li id="lesson-metals-and-non-metals-1" class="">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-point feather feather-check-circle"
                                                    width="30" height="30" viewBox="0 0 24 24" stroke-width="1.5"
                                                    stroke="#02b4fe" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="#02b4fe"></path>
                                                    <circle cx="12" cy="12" r="4"></circle>
                                                </svg>
                                                <a
                                                    href="https://saralmind.com/class-7/science-1/metals-and-non-metals-1">Metals
                                                    and Non-Metals</a><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-chevron-up collapse-inner">
                                                    <polyline points="18 15 12 9 6 15"></polyline>
                                                </svg>
                                                <ul>
                                                    <li id="note-metals-and-non-metals" class=""><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="feather feather-circle">
                                                            <circle cx="12" cy="12" r="10"></circle>
                                                        </svg><a
                                                            href="https://saralmind.com/class-7/science-1/metals-and-non-metals-1/metals-and-non-metals">Metals
                                                            and Non- Metals</a></li>
                                                </ul>
                                            </li>
                                            <li id="lesson-some-useful-chemicals-1" class="">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-point feather feather-check-circle"
                                                    width="30" height="30" viewBox="0 0 24 24" stroke-width="1.5"
                                                    stroke="#02b4fe" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="#02b4fe"></path>
                                                    <circle cx="12" cy="12" r="4"></circle>
                                                </svg>
                                                <a
                                                    href="https://saralmind.com/class-7/science-1/some-useful-chemicals-1">Some
                                                    Useful Chemicals</a><svg xmlns="http://www.w3.org/2000/svg"
                                                    width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    class="feather feather-chevron-up collapse-inner">
                                                    <polyline points="18 15 12 9 6 15"></polyline>
                                                </svg>
                                                <ul>
                                                    <li id="note-some-useful-chemicals" class=""><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="feather feather-circle">
                                                            <circle cx="12" cy="12" r="10"></circle>
                                                        </svg><a
                                                            href="https://saralmind.com/class-7/science-1/some-useful-chemicals-1/some-useful-chemicals">Some
                                                            Useful Chemicals</a></li>
                                                </ul>
                                            </li>
                                            <li id="lesson-mixture-1" class="">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-point feather feather-check-circle"
                                                    width="30" height="30" viewBox="0 0 24 24" stroke-width="1.5"
                                                    stroke="#02b4fe" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="#02b4fe"></path>
                                                    <circle cx="12" cy="12" r="4"></circle>
                                                </svg>
                                                <a
                                                    href="https://saralmind.com/class-7/science-1/mixture-1">Mixture</a><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-chevron-up collapse-inner">
                                                    <polyline points="18 15 12 9 6 15"></polyline>
                                                </svg>
                                                <ul>
                                                    <li id="note-introduction-to-mixture-and-solution" class=""><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="feather feather-circle">
                                                            <circle cx="12" cy="12" r="10"></circle>
                                                        </svg><a
                                                            href="https://saralmind.com/class-7/science-1/mixture-1/introduction-to-mixture-and-solution">Introduction
                                                            to Mixture and Solution</a></li>
                                                    <li id="note-methods-of-separation-of-components-of-mixtures"
                                                        class=""><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-circle">
                                                            <circle cx="12" cy="12" r="10"></circle>
                                                        </svg><a
                                                            href="https://saralmind.com/class-7/science-1/mixture-1/methods-of-separation-of-components-of-mixtures">Methods
                                                            of Separation of Components of Mixtures</a></li>
                                                </ul>
                                            </li>
                                            <li id="lesson-living-beings-animal-life" class="">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-point feather feather-check-circle"
                                                    width="30" height="30" viewBox="0 0 24 24" stroke-width="1.5"
                                                    stroke="#02b4fe" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="#02b4fe"></path>
                                                    <circle cx="12" cy="12" r="4"></circle>
                                                </svg>
                                                <a
                                                    href="https://saralmind.com/class-7/science-1/living-beings-animal-life">Living
                                                    Beings : Animal Life</a><svg xmlns="http://www.w3.org/2000/svg"
                                                    width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    class="feather feather-chevron-up collapse-inner">
                                                    <polyline points="18 15 12 9 6 15"></polyline>
                                                </svg>
                                                <ul>
                                                    <li id="note-living-beings-animal-life" class=""><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="feather feather-circle">
                                                            <circle cx="12" cy="12" r="10"></circle>
                                                        </svg><a
                                                            href="https://saralmind.com/class-7/science-1/living-beings-animal-life/living-beings-animal-life">Living
                                                            Beings: Animal Life</a></li>
                                                </ul>
                                            </li>
                                            <li id="lesson-living-beings-plant-life" class="">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-point feather feather-check-circle"
                                                    width="30" height="30" viewBox="0 0 24 24" stroke-width="1.5"
                                                    stroke="#02b4fe" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="#02b4fe"></path>
                                                    <circle cx="12" cy="12" r="4"></circle>
                                                </svg>
                                                <a
                                                    href="https://saralmind.com/class-7/science-1/living-beings-plant-life">Living
                                                    Beings : Plant Life</a><svg xmlns="http://www.w3.org/2000/svg"
                                                    width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    class="feather feather-chevron-up collapse-inner">
                                                    <polyline points="18 15 12 9 6 15"></polyline>
                                                </svg>
                                                <ul>
                                                    <li id="note-parts-of-a-flowering-plants" class=""><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="feather feather-circle">
                                                            <circle cx="12" cy="12" r="10"></circle>
                                                        </svg><a
                                                            href="https://saralmind.com/class-7/science-1/living-beings-plant-life/parts-of-a-flowering-plants">Parts
                                                            of a Flowering Plants</a></li>
                                                    <li id="note-classification-of-plants-1" class=""><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="feather feather-circle">
                                                            <circle cx="12" cy="12" r="10"></circle>
                                                        </svg><a
                                                            href="https://saralmind.com/class-7/science-1/living-beings-plant-life/classification-of-plants-1">Classification
                                                            of Plants</a></li>
                                                </ul>
                                            </li>
                                            <li id="lesson-cell-and-tissue-1" class="">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-point feather feather-check-circle"
                                                    width="30" height="30" viewBox="0 0 24 24" stroke-width="1.5"
                                                    stroke="#02b4fe" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="#02b4fe"></path>
                                                    <circle cx="12" cy="12" r="4"></circle>
                                                </svg>
                                                <a href="https://saralmind.com/class-7/science-1/cell-and-tissue-1">Cell
                                                    and Tissue</a><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-chevron-up collapse-inner">
                                                    <polyline points="18 15 12 9 6 15"></polyline>
                                                </svg>
                                                <ul>
                                                    <li id="note-introduction-to-cell-1" class=""><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="feather feather-circle">
                                                            <circle cx="12" cy="12" r="10"></circle>
                                                        </svg><a
                                                            href="https://saralmind.com/class-7/science-1/cell-and-tissue-1/introduction-to-cell-1">Introduction
                                                            to Cell</a></li>
                                                    <li id="note-amoeba-and-hydra" class=""><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="feather feather-circle">
                                                            <circle cx="12" cy="12" r="10"></circle>
                                                        </svg><a
                                                            href="https://saralmind.com/class-7/science-1/cell-and-tissue-1/amoeba-and-hydra">Amoeba
                                                            and Hydra</a></li>
                                                </ul>
                                            </li>
                                            <li id="lesson-life-processes-1" class="">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-point feather feather-check-circle"
                                                    width="30" height="30" viewBox="0 0 24 24" stroke-width="1.5"
                                                    stroke="#02b4fe" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="#02b4fe"></path>
                                                    <circle cx="12" cy="12" r="4"></circle>
                                                </svg>
                                                <a href="https://saralmind.com/class-7/science-1/life-processes-1">Life
                                                    Processes</a><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-chevron-up collapse-inner">
                                                    <polyline points="18 15 12 9 6 15"></polyline>
                                                </svg>
                                                <ul>
                                                    <li id="note-life-processes-respiration-1" class=""><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="feather feather-circle">
                                                            <circle cx="12" cy="12" r="10"></circle>
                                                        </svg><a
                                                            href="https://saralmind.com/class-7/science-1/life-processes-1/life-processes-respiration-1">Life
                                                            Processes: Respiration</a></li>
                                                    <li id="note-life-processes-excretion-and-digestion" class=""><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="feather feather-circle">
                                                            <circle cx="12" cy="12" r="10"></circle>
                                                        </svg><a
                                                            href="https://saralmind.com/class-7/science-1/life-processes-1/life-processes-excretion-and-digestion">Life
                                                            Processes: Excretion and Digestion</a></li>
                                                </ul>
                                            </li>
                                            <li id="lesson-structure-of-earth-1" class="">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-point feather feather-check-circle"
                                                    width="30" height="30" viewBox="0 0 24 24" stroke-width="1.5"
                                                    stroke="#02b4fe" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="#02b4fe"></path>
                                                    <circle cx="12" cy="12" r="4"></circle>
                                                </svg>
                                                <a href="https://saralmind.com/class-7/science-1/structure-of-earth-1">Structure
                                                    of Earth</a><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-chevron-up collapse-inner">
                                                    <polyline points="18 15 12 9 6 15"></polyline>
                                                </svg>
                                                <ul>
                                                    <li id="note-structure-of-the-earth" class=""><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="feather feather-circle">
                                                            <circle cx="12" cy="12" r="10"></circle>
                                                        </svg><a
                                                            href="https://saralmind.com/class-7/science-1/structure-of-earth-1/structure-of-the-earth">Structure
                                                            of the Earth</a></li>
                                                </ul>
                                            </li>
                                            <li id="lesson-weather-and-climate-1" class="">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-point feather feather-check-circle"
                                                    width="30" height="30" viewBox="0 0 24 24" stroke-width="1.5"
                                                    stroke="#02b4fe" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="#02b4fe"></path>
                                                    <circle cx="12" cy="12" r="4"></circle>
                                                </svg>
                                                <a href="https://saralmind.com/class-7/science-1/weather-and-climate-1">Weather
                                                    and Climate</a><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-chevron-up collapse-inner">
                                                    <polyline points="18 15 12 9 6 15"></polyline>
                                                </svg>
                                                <ul>
                                                    <li id="note-weather-and-climate" class=""><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="feather feather-circle">
                                                            <circle cx="12" cy="12" r="10"></circle>
                                                        </svg><a
                                                            href="https://saralmind.com/class-7/science-1/weather-and-climate-1/weather-and-climate">Weather
                                                            and Climate</a></li>
                                                    <li id="note-information-regarding-the-weather" class=""><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="feather feather-circle">
                                                            <circle cx="12" cy="12" r="10"></circle>
                                                        </svg><a
                                                            href="https://saralmind.com/class-7/science-1/weather-and-climate-1/information-regarding-the-weather">Information
                                                            Regarding the Weather</a></li>
                                                </ul>
                                            </li>
                                            <li id="lesson-environment-and-its-balance-1" class="">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-point feather feather-check-circle"
                                                    width="30" height="30" viewBox="0 0 24 24" stroke-width="1.5"
                                                    stroke="#02b4fe" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="#02b4fe"></path>
                                                    <circle cx="12" cy="12" r="4"></circle>
                                                </svg>
                                                <a
                                                    href="https://saralmind.com/class-7/science-1/environment-and-its-balance-1">Environment
                                                    and its Balance</a><svg xmlns="http://www.w3.org/2000/svg"
                                                    width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    class="feather feather-chevron-up collapse-inner">
                                                    <polyline points="18 15 12 9 6 15"></polyline>
                                                </svg>
                                                <ul>
                                                    <li id="note-natural-resources-and-protected-areas-for-conservation-of-natural-resources-in-nepal"
                                                        class=""><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-circle">
                                                            <circle cx="12" cy="12" r="10"></circle>
                                                        </svg><a
                                                            href="https://saralmind.com/class-7/science-1/environment-and-its-balance-1/natural-resources-and-protected-areas-for-conservation-of-natural-resources-in-nepal">Natural
                                                            Resources and Protected Areas for Conservation of Natural
                                                            Resources in Nepal</a></li>
                                                    <li id="note-wildlife-reserve-and-conservation-area-of-nepal"
                                                        class=""><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-circle">
                                                            <circle cx="12" cy="12" r="10"></circle>
                                                        </svg><a
                                                            href="https://saralmind.com/class-7/science-1/environment-and-its-balance-1/wildlife-reserve-and-conservation-area-of-nepal">Wildlife
                                                            Reserve and Conservation Area of Nepal</a></li>
                                                    <li id="note-water-resources" class=""><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="feather feather-circle">
                                                            <circle cx="12" cy="12" r="10"></circle>
                                                        </svg><a
                                                            href="https://saralmind.com/class-7/science-1/environment-and-its-balance-1/water-resources">Water
                                                            Resources</a></li>
                                                    <li id="note-elements-of-environment" class=""><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="feather feather-circle">
                                                            <circle cx="12" cy="12" r="10"></circle>
                                                        </svg><a
                                                            href="https://saralmind.com/class-7/science-1/environment-and-its-balance-1/elements-of-environment">Elements
                                                            of Environment</a></li>
                                                </ul>
                                            </li>
                                            <li id="lesson-the-earth-and-space" class="">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-point feather feather-check-circle"
                                                    width="30" height="30" viewBox="0 0 24 24" stroke-width="1.5"
                                                    stroke="#02b4fe" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="#02b4fe"></path>
                                                    <circle cx="12" cy="12" r="4"></circle>
                                                </svg>
                                                <a href="https://saralmind.com/class-7/science-1/the-earth-and-space">The
                                                    Earth and Space</a><svg xmlns="http://www.w3.org/2000/svg"
                                                    width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    class="feather feather-chevron-up collapse-inner">
                                                    <polyline points="18 15 12 9 6 15"></polyline>
                                                </svg>
                                                <ul>
                                                    <li id="note-the-earth-and-space" class=""><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="feather feather-circle">
                                                            <circle cx="12" cy="12" r="10"></circle>
                                                        </svg><a
                                                            href="https://saralmind.com/class-7/science-1/the-earth-and-space/the-earth-and-space">The
                                                            Earth and Space</a></li>
                                                </ul>
                                            </li>
                                            <li id="lesson-environmental-degradation-and-its-conservation-1" class="">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-point feather feather-check-circle"
                                                    width="30" height="30" viewBox="0 0 24 24" stroke-width="1.5"
                                                    stroke="#02b4fe" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="#02b4fe"></path>
                                                    <circle cx="12" cy="12" r="4"></circle>
                                                </svg>
                                                <a
                                                    href="https://saralmind.com/class-7/science-1/environmental-degradation-and-its-conservation-1">Environmental
                                                    Degradation and Its Conservation</a><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-chevron-up collapse-inner">
                                                    <polyline points="18 15 12 9 6 15"></polyline>
                                                </svg>
                                                <ul>
                                                    <li id="note-environmental-degradation-and-its-conservation"
                                                        class=""><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-circle">
                                                            <circle cx="12" cy="12" r="10"></circle>
                                                        </svg><a
                                                            href="https://saralmind.com/class-7/science-1/environmental-degradation-and-its-conservation-1/environmental-degradation-and-its-conservation">Environmental
                                                            Degradation and its Conservation</a></li>
                                                    <li id="note-natural-disaster" class=""><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="feather feather-circle">
                                                            <circle cx="12" cy="12" r="10"></circle>
                                                        </svg><a
                                                            href="https://saralmind.com/class-7/science-1/environmental-degradation-and-its-conservation-1/natural-disaster">Natural
                                                            Disaster</a></li>
                                                    <li id="note-environmental-sanitation-and-organization-and-agencies-involved-in-environmental-conservation"
                                                        class=""><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-circle">
                                                            <circle cx="12" cy="12" r="10"></circle>
                                                        </svg><a
                                                            href="https://saralmind.com/class-7/science-1/environmental-degradation-and-its-conservation-1/environmental-sanitation-and-organization-and-agencies-involved-in-environmental-conservation">Environmental
                                                            Sanitation and Organization and Agencies Involved in
                                                            Environmental Conservation</a></li>
                                                    <li id="note-non-governmental-organization-involved-in-environmental-conservation"
                                                        class=""><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-circle">
                                                            <circle cx="12" cy="12" r="10"></circle>
                                                        </svg><a
                                                            href="https://saralmind.com/class-7/science-1/environmental-degradation-and-its-conservation-1/non-governmental-organization-involved-in-environmental-conservation">Non-
                                                            Governmental Organization Involved in Environmental
                                                            Conservation</a></li>
                                                </ul>
                                            </li>
                                            <li id="lesson-environment-and-sustainable-development-1" class="">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-point feather feather-check-circle"
                                                    width="30" height="30" viewBox="0 0 24 24" stroke-width="1.5"
                                                    stroke="#02b4fe" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="#02b4fe"></path>
                                                    <circle cx="12" cy="12" r="4"></circle>
                                                </svg>
                                                <a
                                                    href="https://saralmind.com/class-7/science-1/environment-and-sustainable-development-1">Environment
                                                    and Sustainable Development</a><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-chevron-up collapse-inner">
                                                    <polyline points="18 15 12 9 6 15"></polyline>
                                                </svg>
                                                <ul>
                                                    <li id="note-environment-and-sustainable-development" class=""><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="feather feather-circle">
                                                            <circle cx="12" cy="12" r="10"></circle>
                                                        </svg><a
                                                            href="https://saralmind.com/class-7/science-1/environment-and-sustainable-development-1/environment-and-sustainable-development">Environment
                                                            and Sustainable Development</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="overview-wrapper">
                    <h4 class="title m-0">Overview</h4>
                    <p>After completion of this chapter, students will be able to:</p>
                    <ul>
                        <li>find the cardinality of A U B, A ∩ B, A - B, (A U B)<sup>c</sup>, &nbsp;<span
                                class="MathJax_Preview" style="color: inherit; display: none;"></span><span
                                class="MathJax_Preview" style="color: inherit; display: none;"></span><span
                                class="MathJax_Preview" style="color: inherit; display: none;"></span><span
                                class="MathJax MathJax_Processing" id="MathJax-Element-1-Frame" tabindex="0"
                                data-mathml="<math xmlns=&quot;http://www.w3.org/1998/Math/MathML&quot;><mover><mi>A</mi><mo accent=&quot;false&quot;>&amp;#x00AF;</mo></mover></math>"
                                role="presentation" style="position: relative;">
                                <nobr aria-hidden="true"><span class="math" id="MathJax-Span-1"><span
                                            style="display: inline-block; position: relative; width: 0em; height: 0px; font-size: 127%;"><span
                                                style="position: absolute;"><span class="mrow" id="MathJax-Span-2"><span
                                                        class="munderover" id="MathJax-Span-3"><span
                                                            style="display: inline-block; position: relative; width: 0em; height: 0px;"><span
                                                                style="position: absolute;"><span class="mi"
                                                                    id="MathJax-Span-4"
                                                                    style="font-family: MathJax_Math-italic;">A</span></span><span
                                                                style="position: absolute;"><span class="mo"
                                                                    id="MathJax-Span-5"
                                                                    style="font-size: 70.7%; font-family: MathJax_Main;">¯</span></span></span></span></span></span></span></span>
                                </nobr><span class="MJX_Assistive_MathML" role="presentation"><math
                                        xmlns="http://www.w3.org/1998/Math/MathML">
                                        <mover>
                                            <mi>A</mi>
                                            <mo accent="false">¯</mo>
                                        </mover>
                                    </math></span>
                            </span><span class="MathJax_Error" id="MathJax-Element-1-Frame" tabindex="0"><span>[Math
                                    Processing Error]</span></span>
                            <script type="math/tex" id="MathJax-Element-1">\overline A</script>&nbsp;∩ B, A&nbsp;∩ <span
                                class="MathJax_Preview" style="color: inherit; display: none;"></span><span
                                class="MathJax_Preview" style="color: inherit; display: none;"></span><span
                                class="MathJax_Preview" style="color: inherit; display: none;"></span><span
                                class="MathJax MathJax_Processing" id="MathJax-Element-2-Frame" tabindex="0"
                                data-mathml="<math xmlns=&quot;http://www.w3.org/1998/Math/MathML&quot;><mover><mi>B</mi><mo accent=&quot;false&quot;>&amp;#x00AF;</mo></mover></math>"
                                role="presentation" style="position: relative;">
                                <nobr aria-hidden="true"><span class="math" id="MathJax-Span-6"><span
                                            style="display: inline-block; position: relative; width: 0em; height: 0px; font-size: 127%;"><span
                                                style="position: absolute;"><span class="mrow" id="MathJax-Span-7"><span
                                                        class="munderover" id="MathJax-Span-8"><span
                                                            style="display: inline-block; position: relative; width: 0em; height: 0px;"><span
                                                                style="position: absolute;"><span class="mi"
                                                                    id="MathJax-Span-9"
                                                                    style="font-family: MathJax_Math-italic;">B</span></span><span
                                                                style="position: absolute;"><span class="mo"
                                                                    id="MathJax-Span-10"
                                                                    style="font-size: 70.7%; font-family: MathJax_Main;">¯</span></span></span></span></span></span></span></span>
                                </nobr><span class="MJX_Assistive_MathML" role="presentation"><math
                                        xmlns="http://www.w3.org/1998/Math/MathML">
                                        <mover>
                                            <mi>B</mi>
                                            <mo accent="false">¯</mo>
                                        </mover>
                                    </math></span>
                            </span><span class="MathJax_Error" id="MathJax-Element-2-Frame" tabindex="0"><span>[Math
                                    Processing Error]</span></span>
                            <script type="math/tex" id="MathJax-Element-2">\overline B</script>, (A ∩ B)<sup>c</sup>
                            etc.
                        </li>
                        <li>solve the word problems of two sets using Venn- diagram.</li>
                        <li>get acquainted with word problems involving three sets using venn- diagram.</li>
                    </ul>
                </div>
                <div id="sticky-anchor"></div>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                            aria-orientation="vertical">
                            <button class="nav-link active" id="v-pills-home-tab" data-toggle="pill"
                                data-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home"
                                aria-selected="true">
                                <img height="20px" width="20px" src="{{asset('frontend/img/new-img/notes.png')}}"
                                    alt=""> Note
                            </button>
                            <button class="nav-link" id="v-pills-profile-tab" data-toggle="pill"
                                data-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile"
                                aria-selected="false">
                                <img height="20px" width="20px" src="{{asset('frontend/img/new-img/practicetest.png')}}"
                                    alt=""> Things To remember
                            </button>
                            <button class="nav-link" id="v-pills-messages-tab" data-toggle="pill"
                                data-target="#v-pills-messages" type="button" role="tab"
                                aria-controls="v-pills-messages" aria-selected="false">
                                <img height="20px" width="20px" src="{{asset('frontend/img/new-img/video.png')}}"
                                    alt=""> Videos
                            </button>
                            <button class="nav-link" id="v-pills-settings-tab" data-toggle="pill"
                                data-target="#v-pills-settings" type="button" role="tab"
                                aria-controls="v-pills-settings" aria-selected="false">
                                <img height="20px" width="20px" src="{{asset('frontend/img/new-img/exercises.png')}}"
                                    alt=""> Exercise
                            </button>
                            <button class="nav-link" id="v-pills-quiz-tab" data-toggle="pill"
                                data-target="#v-pills-quiz" type="button" role="tab" aria-controls="v-pills-settings"
                                aria-selected="false">
                                <img height="20px" width="20px" src="{{asset('frontend/img/new-img/skills.png')}}"
                                    alt=""> Quiz
                            </button>
                        </div>
                    </div>
                    <div class="col-sm-9">
                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                                aria-labelledby="v-pills-home-tab">
                                <div class="note-wrapper">
                                    <h5 class="title mb-2">Geographical Location of Nepal</h5>
                                    <p>The third planet from the Sun is our planet. Several pieces of evidence suggest
                                        that the Earth formed around 4.5 billion years ago. Tethys Sea existed in the
                                        current Himalayan region about 50 million years ago. Geological experts claim
                                        that due to geographic movements, the land has been rising or falling relative
                                        to the sea level. The medium Himalayas, Chure Mountains, and Plain Land had then
                                        developed. Various kinds of vegetation were also produced. Then, for settlement,
                                        came the human race along with other animals. Many nations had gathered in this
                                        area. Since countless years ago, Nepal has been dev<span data-toggle="tooltip"
                                            class="underline eloping" data-original-title="" title="">eloping</span>
                                        into a sovereign state.</p>

                                    <p>In regards to it's location in South Asia, Nepal is between China and India. Of
                                        all the places on Earth, Nepal has the biggest variation in altitude. The
                                        Himalayan mountains are the tallest in the world, while the lowlands are at sea
                                        level. The highest peak in the world is Mount Everest, which rises to a height
                                        of 8,850 meters.</p>

                                    <p>When India and Asia collided and the land was <span data-toggle="tooltip"
                                            class="underline force" data-original-title="" title="">force</span>d into
                                        high mountains, the Himalaya was created around 10–15 million years ago. Nepal
                                        is home to eight of the top ten highest mountain peaks in the world.</p>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                                aria-labelledby="v-pills-profile-tab">
                                <div class="note-wrapper">
                                    <h5 class="title mb-2">Things to remember</h5>

                                    <ul>
                                        <li>It includes every relationship which established among the people.</li>
                                        <li>There can be more than one community in a society. Community smaller than
                                            society.</li>
                                        <li>It is a net<span data-toggle="tooltip" class="underline work"
                                                data-original-title="" title="">work</span> of social relationships
                                            which cannot see or touched.</li>
                                        <li>common interests and common objectives are not necessary for society.</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-messages" role="tabpanel"
                                aria-labelledby="v-pills-messages-tab">
                                <div class="row">
                                    <div class="col-sm-6 mb-4">
                                        <iframe width="100%" height="100%"
                                            src="https://www.youtube.com/embed/1Jh1usCrClw"
                                            title="FLYING OVER MALDIVES (4K UHD) Beautiful Nature Scenery with Relaxing Music (4K Video Ultra HD)"
                                            frameborder="0"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                            allowfullscreen="" data-ex-slot-check="iframe_ex_slot_1"></iframe>
                                    </div>
                                    <div class="col-sm-6 mb-4">
                                        <iframe width="100%" height="100%"
                                            src="https://www.youtube.com/embed/1Jh1usCrClw"
                                            title="FLYING OVER MALDIVES (4K UHD) Beautiful Nature Scenery with Relaxing Music (4K Video Ultra HD)"
                                            frameborder="0"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                            allowfullscreen="" data-ex-slot-check="iframe_ex_slot_2"></iframe>
                                    </div>
                                    <div class="col-sm-6 mb-4">
                                        <iframe width="100%" height="100%"
                                            src="https://www.youtube.com/embed/1Jh1usCrClw"
                                            title="FLYING OVER MALDIVES (4K UHD) Beautiful Nature Scenery with Relaxing Music (4K Video Ultra HD)"
                                            frameborder="0"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                            allowfullscreen="" data-ex-slot-check="iframe_ex_slot_3"></iframe>
                                    </div>
                                    <div class="col-sm-6 mb-4">
                                        <iframe width="100%" height="100%"
                                            src="https://www.youtube.com/embed/1Jh1usCrClw"
                                            title="FLYING OVER MALDIVES (4K UHD) Beautiful Nature Scenery with Relaxing Music (4K Video Ultra HD)"
                                            frameborder="0"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                            allowfullscreen="" data-ex-slot-check="iframe_ex_slot_4"></iframe>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-settings" role="tabpanel"
                                aria-labelledby="v-pills-settings-tab">
                                <div class="row">
                                    <div class="col-sm-6 mb-4">
                                        <iframe width="100%" height="100%"
                                            src="https://www.youtube.com/embed/1Jh1usCrClw"
                                            title="FLYING OVER MALDIVES (4K UHD) Beautiful Nature Scenery with Relaxing Music (4K Video Ultra HD)"
                                            frameborder="0"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                            allowfullscreen="" data-ex-slot-check="iframe_ex_slot_5"></iframe>
                                    </div>
                                    <div class="col-sm-6 mb-4">
                                        <iframe width="100%" height="100%"
                                            src="https://www.youtube.com/embed/1Jh1usCrClw"
                                            title="FLYING OVER MALDIVES (4K UHD) Beautiful Nature Scenery with Relaxing Music (4K Video Ultra HD)"
                                            frameborder="0"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                            allowfullscreen="" data-ex-slot-check="iframe_ex_slot_6"></iframe>
                                    </div>
                                    <div class="col-sm-6 mb-4">
                                        <iframe width="100%" height="100%"
                                            src="https://www.youtube.com/embed/1Jh1usCrClw"
                                            title="FLYING OVER MALDIVES (4K UHD) Beautiful Nature Scenery with Relaxing Music (4K Video Ultra HD)"
                                            frameborder="0"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                            allowfullscreen="" data-ex-slot-check="iframe_ex_slot_7"></iframe>
                                    </div>
                                    <div class="col-sm-6 mb-4">
                                        <iframe width="100%" height="100%"
                                            src="https://www.youtube.com/embed/1Jh1usCrClw"
                                            title="FLYING OVER MALDIVES (4K UHD) Beautiful Nature Scenery with Relaxing Music (4K Video Ultra HD)"
                                            frameborder="0"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                            allowfullscreen="" data-ex-slot-check="iframe_ex_slot_8"></iframe>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-quiz" role="tabpanel"
                                aria-labelledby="v-pills-quiz-tab">
                                <div id="quiz" class="quiz-container quiz-start-state">
                                    <img src="{{asset('frontend/img/new-img/quiz.svg')}}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- <section id="lessons" class="lessons-list common-gap">
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
                </div>
            </div>
            <div class="col-lg-9">
                <div class="overview-wrapper">
                    <h4 class="title mb-2">Overview</h4>
                    <p>You can combine all the Saralmind into a single one, you can take a component from the
                        Application theme and use it in the Website.</p>
                    <p>All the Saralmind into a single one, you can take a component from the Application theme and use
                        it in the Website.</p>
                    <p>Using Saralmind to build your site means never worrying about designing another page or cross
                        browser compatibility. Our ever-growing library of components and pre-designed layouts will make
                        your life easier.</p>
                </div>
                <div class="list-tile">
                    <h4 class="mb-2">Lessons</h4>
                </div>
                <div class="lesson">
                    <div class="lesson-highlight">
                        <a href="javascript:void(0)" class="lesson-title">
                            <h3>We and Our Society</h3>
                        </a>
                        <div class="learn-action-wrapper">
                            <a href="{{url('/lessons/notes')}}">
                                <span>60</span>
                                <span class="learn-label">Notes</span>
                                <i data-feather="book-open"></i>
                            </a>
                            <a href="{{url('/lessons/notes/note-single')}}">
                                <span>85</span>
                                <span class="learn-label">Videos</span>
                                <i data-feather="youtube"></i>
                            </a>
                            <a href="{{url('/lessons/notes/note-single')}}">
                                <span>20</span>
                                <span class="learn-label">Exercises</span>
                                <i data-feather="pen-tool"></i>
                            </a>
                            <a href="{{url('/lessons/notes/note-single')}}">
                                <span>19</span>
                                <span class="learn-label">Practice Test</span>
                                <i data-feather="file-text"></i>
                            </a>
                        </div>
                    </div>
                    <div class="note-list-preview">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="note-block">
                                    <div class="note_block-img_wrapper">
                                        <img src="{{asset('frontend/img/notes/society.jpg')}}" alt="Note"
                                            class="img-fluid">
                                        <div class="note-meta-links">
                                            <a title="Exercises" href="{{url('/lessons/notes/note-single')}}"><i
                                                    data-feather="pen-tool"></i></a>
                                            <a title="Videos" href="#"><i data-feather="youtube"></i></a>
                                            <a title="Practice Test" href="#"><i data-feather="file-text"></i></a>
                                        </div>
                                    </div>
                                    <div class="note-desc">
                                        <h4><a href="{{url('/lessons/notes/note-single')}}">Community and Society</a>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="note-block">
                                    <div class="note_block-img_wrapper">
                                        <img src="{{asset('frontend/img/notes/globle.jpg')}}" alt="Note"
                                            class="img-fluid">
                                        <div class="note-meta-links">
                                            <a title="Exercises" href="{{url('/lessons/notes/note-single')}}"><i
                                                    data-feather="pen-tool"></i></a>
                                            <a title="Videos" href="#"><i data-feather="youtube"></i></a>
                                            <a title="Practice Test" href="#"><i data-feather="file-text"></i></a>
                                        </div>
                                    </div>
                                    <div class="note-desc">
                                        <h4><a href="{{url('/lessons/notes/note-single')}}">Origin and Formation of
                                                Society</a></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="note-block">
                                    <div class="note_block-img_wrapper">
                                        <img src="{{asset('frontend/img/notes/vdc.jpg')}}" alt="Note" class="img-fluid">
                                        <div class="note-meta-links">
                                            <a title="Exercises" href="{{url('/lessons/notes/note-single')}}"><i
                                                    data-feather="pen-tool"></i></a>
                                            <a title="Videos" href="#"><i data-feather="youtube"></i></a>
                                            <a title="Practice Test" href="#"><i data-feather="file-text"></i></a>
                                        </div>
                                    </div>
                                    <div class="note-desc">
                                        <h4><a href="{{url('/lessons/notes/note-single')}}">Our VDC And its
                                                Functions</a></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="note-block">
                                    <div class="note_block-img_wrapper">
                                        <img src="{{asset('frontend/img/notes/kmc.png')}}" alt="Note" class="img-fluid">
                                        <div class="note-meta-links">
                                            <a title="Exercises" href="{{url('/lessons/notes/note-single')}}"><i
                                                    data-feather="pen-tool"></i></a>
                                            <a title="Videos" href="#"><i data-feather="youtube"></i></a>
                                            <a title="Practice Test" href="#"><i data-feather="file-text"></i></a>
                                        </div>
                                    </div>
                                    <div class="note-desc">
                                        <h4><a href="{{url('/lessons/notes/note-single')}}">Our Municipality and its
                                                Functions </a></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="note-block">
                                    <div class="note_block-img_wrapper">
                                        <img src="{{asset('frontend/img/notes/infra.jpg')}}" alt="Note"
                                            class="img-fluid">
                                        <div class="note-meta-links">
                                            <a title="Exercises" href="{{url('/lessons/notes/note-single')}}"><i
                                                    data-feather="pen-tool"></i></a>
                                            <a title="Videos" href="#"><i data-feather="youtube"></i></a>
                                            <a title="Practice Test" href="#"><i data-feather="file-text"></i></a>
                                        </div>
                                    </div>
                                    <div class="note-desc">
                                        <h4><a href="{{url('/lessons/notes/note-single')}}">Our Infrastructure Of
                                                Development:Education</a></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="note-block">
                                    <div class="note_block-img_wrapper">
                                        <img src="{{asset('frontend/img/notes/last.jpg')}}" alt="Note"
                                            class="img-fluid">
                                        <div class="note-meta-links">
                                            <a title="Exercises" href="{{url('/lessons/notes/note-single')}}"><i
                                                    data-feather="pen-tool"></i></a>
                                            <a title="Videos" href="#"><i data-feather="youtube"></i></a>
                                            <a title="Practice Test" href="#"><i data-feather="file-text"></i></a>
                                        </div>
                                    </div>
                                    <div class="note-desc">
                                        <h4><a href="{{url('/lessons/notes/note-single')}}">Our Infrastructure of
                                                Development:Health</a></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="lesson">
                    <div class="lesson-highlight">
                        <a href="javascript:void(0)" class="lesson-title">
                            <h3>Our Social Values and Norms</h3>
                        </a>
                        <div class="learn-action-wrapper">
                            <a href="javascript:void(0)">
                                <span>60</span>
                                <span class="learn-label">Notes</span>
                                <i data-feather="book-open"></i>
                            </a>
                            <a href="javascript:void(0)">
                                <span>85</span>
                                <span class="learn-label">Videos</span>
                                <i data-feather="youtube"></i>
                            </a>
                            <a href="javascript:void(0)">
                                <span>20</span>
                                <span class="learn-label">Exercises</span>
                                <i data-feather="pen-tool"></i>
                            </a>
                            <a href="javascript:void(0)">
                                <span>19</span>
                                <span class="learn-label">Practice Test</span>
                                <i data-feather="file-text"></i>
                            </a>
                        </div>
                    </div>
                    <div class="note-list-preview">
                        sdj
                    </div>
                </div>
                <div class="lesson">
                    <div class="lesson-highlight">
                        <a href="javascript:void(0)" class="lesson-title">
                            <h3>Social Problems and Solutions</h3>
                        </a>
                        <div class="learn-action-wrapper">
                            <a href="javascript:void(0)">
                                <span>60</span>
                                <span class="learn-label">Notes</span>
                                <i data-feather="book-open"></i>
                            </a>
                            <a href="javascript:void(0)">
                                <span>85</span>
                                <span class="learn-label">Videos</span>
                                <i data-feather="youtube"></i>
                            </a>
                            <a href="javascript:void(0)">
                                <span>20</span>
                                <span class="learn-label">Exercises</span>
                                <i data-feather="pen-tool"></i>
                            </a>
                            <a href="javascript:void(0)">
                                <span>19</span>
                                <span class="learn-label">Practice Test</span>
                                <i data-feather="file-text"></i>
                            </a>
                        </div>
                    </div>
                    <div class="note-list-preview">
                        sdj
                    </div>
                </div>
                <div class="lesson">
                    <div class="lesson-highlight">
                        <a href="javascript:void(0)" class="lesson-title">
                            <h3>Civic Awareness</h3>
                        </a>
                        <div class="learn-action-wrapper">
                            <a href="javascript:void(0)">
                                <span>60</span>
                                <span class="learn-label">Notes</span>
                                <i data-feather="book-open"></i>
                            </a>
                            <a href="javascript:void(0)">
                                <span>85</span>
                                <span class="learn-label">Videos</span>
                                <i data-feather="youtube"></i>
                            </a>
                            <a href="javascript:void(0)">
                                <span>20</span>
                                <span class="learn-label">Exercises</span>
                                <i data-feather="pen-tool"></i>
                            </a>
                            <a href="javascript:void(0)">
                                <span>19</span>
                                <span class="learn-label">Practice Test</span>
                                <i data-feather="file-text"></i>
                            </a>
                        </div>
                    </div>

                    <div class="note-list-preview">
                        sdj
                    </div>
                </div>

                <div class="lesson">
                    <div class="lesson-highlight">
                        <a href="javascript:void(0)" class="lesson-title">
                            <h3>Our Earth</h3>
                        </a>
                        <div class="learn-action-wrapper">
                            <a href="javascript:void(0)">
                                <span>60</span>
                                <span class="learn-label">Notes</span>
                                <i data-feather="book-open"></i>
                            </a>
                            <a href="javascript:void(0)">
                                <span>85</span>
                                <span class="learn-label">Videos</span>
                                <i data-feather="youtube"></i>
                            </a>
                            <a href="javascript:void(0)">
                                <span>20</span>
                                <span class="learn-label">Exercises</span>
                                <i data-feather="pen-tool"></i>
                            </a>
                            <a href="javascript:void(0)">
                                <span>19</span>
                                <span class="learn-label">Practice Test</span>
                                <i data-feather="file-text"></i>
                            </a>
                        </div>
                    </div>

                    <div class="note-list-preview">
                        sdj
                    </div>
                </div>
                <div class="lesson">
                    <div class="lesson-highlight">
                        <a href="javascript:void(0)" class="lesson-title">
                            <h3>Population and Population Status</h3>
                        </a>
                        <div class="learn-action-wrapper">
                            <a href="javascript:void(0)">
                                <span>60</span>
                                <span class="learn-label">Notes</span>
                                <i data-feather="book-open"></i>
                            </a>
                            <a href="javascript:void(0)">
                                <span>85</span>
                                <span class="learn-label">Videos</span>
                                <i data-feather="youtube"></i>
                            </a>
                            <a href="javascript:void(0)">
                                <span>20</span>
                                <span class="learn-label">Exercises</span>
                                <i data-feather="pen-tool"></i>
                            </a>
                            <a href="javascript:void(0)">
                                <span>19</span>
                                <span class="learn-label">Practice Test</span>
                                <i data-feather="file-text"></i>
                            </a>
                        </div>
                    </div>
                    <div class="note-list-preview">
                        sdj
                    </div>
                </div>
                <div class="lesson">
                    <div class="lesson-highlight">
                        <a href="javascript:void(0)" class="lesson-title">
                            <h3>Population Growth and its Management</h3>
                        </a>
                        <div class="learn-action-wrapper">
                            <a href="javascript:void(0)">
                                <span>60</span>
                                <span class="learn-label">Notes</span>
                                <i data-feather="book-open"></i>
                            </a>
                            <a href="javascript:void(0)">
                                <span>85</span>
                                <span class="learn-label">Videos</span>
                                <i data-feather="youtube"></i>
                            </a>
                            <a href="javascript:void(0)">
                                <span>20</span>
                                <span class="learn-label">Exercises</span>
                                <i data-feather="pen-tool"></i>
                            </a>
                            <a href="javascript:void(0)">
                                <span>19</span>
                                <span class="learn-label">Practice Test</span>
                                <i data-feather="file-text"></i>
                            </a>
                        </div>
                    </div>

                    <div class="note-list-preview">
                        sdj
                    </div>
                </div>
                <div class="lesson">
                    <div class="lesson-highlight">
                        <a href="javascript:void(0)" class="lesson-title">
                            <h3>Our Economic Activities</h3>
                        </a>
                        <div class="learn-action-wrapper">
                            <a href="javascript:void(0)">
                                <span>60</span>
                                <span class="learn-label">Notes</span>
                                <i data-feather="book-open"></i>
                            </a>
                            <a href="javascript:void(0)">
                                <span>85</span>
                                <span class="learn-label">Videos</span>
                                <i data-feather="youtube"></i>
                            </a>
                            <a href="javascript:void(0)">
                                <span>20</span>
                                <span class="learn-label">Exercises</span>
                                <i data-feather="pen-tool"></i>
                            </a>
                            <a href="javascript:void(0)">
                                <span>19</span>
                                <span class="learn-label">Practice Test</span>
                                <i data-feather="file-text"></i>
                            </a>
                        </div>
                    </div>

                    <div class="note-list-preview">
                        sdj
                    </div>
                </div>
                <div class="lesson">
                    <div class="lesson-highlight">
                        <a href="javascript:void(0)" class="lesson-title">
                            <h3>Our International Relation and Cooperation</h3>
                        </a>
                        <div class="learn-action-wrapper">
                            <a href="javascript:void(0)">
                                <span>60</span>
                                <span class="learn-label">Notes</span>
                                <i data-feather="book-open"></i>
                            </a>
                            <a href="javascript:void(0)">
                                <span>85</span>
                                <span class="learn-label">Videos</span>
                                <i data-feather="youtube"></i>
                            </a>
                            <a href="javascript:void(0)">
                                <span>20</span>
                                <span class="learn-label">Exercises</span>
                                <i data-feather="pen-tool"></i>
                            </a>
                            <a href="javascript:void(0)">
                                <span>19</span>
                                <span class="learn-label">Practice Test</span>
                                <i data-feather="file-text"></i>
                            </a>
                        </div>
                    </div>

                    <div class="note-list-preview">
                        sdj
                    </div>
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