@extends('frontend.app')

@section('meta')

<meta name="title" content="{{$user->name}} | {{$user->type}} | SARALMIND.COM" />
<meta name="description"
    content="Saralmind.com user Profile for {{$user->name}} " />
<meta name="keywords" content="Nepal online education portal, Nepal education, nepal curriculum, Saralmind" />

<title>{{$user->name}} | {{$user->type}} | SARALMIND</title>

@endsection


@section('content')
<!-- <section class="inner-header profile-header"  style="background-image: url({{asset('frontend/img/inner-banner_bg.svg')}}),linear-gradient(359.93deg,#ddeffd -44.48%,#e5f1fb 102.88%);">
    </section> -->
<section class="bg-profile d-table w-100">
    <div class="container m-0 p-0">
        <div class="row">
            <div class="d-lg-flex">
                <div class="col-lg-4 border-end">
                    <div class="card public-profile border-0">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-12 text-md-left text-center">
                                    <div class="avatar">
                                        <img src="{{ $user->image_url }}" class="rounded-circle shadow d-block mx-auto"
                                            alt="">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="row justify-content-center align-items-end">
                                        <div class="col-md-8 text-center mt-4 mt-sm-0">
                                            <h3 class="title mb-0">{{ $user->name }}</h3>

                                            <small class="text-muted h6 mr-2">{{ $user->type }}</small>
                                            @if($original_user)
                                            <ul class="list-unstyled social-icon social-icon-wrapper  social mb-0 mt-2">
                                                <li class="list-inline-item"><a href="{{url('/setting')}}"
                                                        class="rounded" data-toggle="tooltip" data-placement="bottom"
                                                        title="" data-original-title="Settings"> <span
                                                            style="font-size:16px;">Edit</span><i data-feather="tool"
                                                            class="icon-sm fea-social"></i></a></li>
                                            </ul>
                                            @else

                                            <br><br>
                                            <form
                                                action="{{ route('user.follow', ['username'=> collect(request()->segments())->last()]) }}"
                                                method="post"> @csrf

                                                <button type="submit" class="btn btn-danger btn-sm">Follow</button>

                                            </form>

                                            @endif
                                            <br>

                                            Profile Link :
                                            www.saralmind.com/profile/{{collect(request()->segments())->last() }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="pt-3">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="col-12">
                        <div class="sidebar p-4 pb-0 mb-2" style="padding-bottom:0 !important;">
                            <div class="widget pt-2">
                                <h2 class="widget-title">Welcome {{ $user->username }},</h2>
                            </div>
                        </div>
                        @if($original_user)
                        <div class="sidebar p-4 mb-4 border-bottom">
                            <div class="widget pt-2">
                                <h5 class="widget-title">NNC mock exam summary :</h5>
                                <div class="short-desc">

                                    <!-- <div class="basic-single-block">
                                        <h4>Passed : {{ $pass_count }}</h4>
                                        <h4>Failed : {{ $fail_count }}</h4>
                                        <h4>Extraordinary : {{ $extraOrdinary_count }}</h4>
                                        <h4>Total Exams : {{ $total_exams_given }}</h4>
                                    </div> -->
                                    <div class="row mt-3">
                                        <div class="col-xl-3 col-lg-4 col-sm-6 mb-lg-0 mb-3 data-box-card">
                                            <div
                                                class="content-wrapper bg-white br-12 d-flex align-items-center justify-content-left position-relative">
                                                <div class="icon">
                                                    <img src="{{asset('frontend/img/happy.svg')}}" alt="">
                                                </div>
                                                <div class="text">
                                                    <span class="font-20 fw-700 d-block">{{ $pass_count }}</span>
                                                    <span class="font-14 text-light2 d-block">Passed</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-sm-6 mb-lg-0 mb-3 data-box-card">
                                            <div
                                                class="content-wrapper bg-white br-12 d-flex align-items-center justify-content-left position-relative">
                                                <div class="icon">
                                                    <img src="{{asset('frontend/img/sweat.svg')}}" alt="">
                                                </div>
                                                <div class="text">
                                                    <span class="font-20 fw-700 d-block">{{ $fail_count }}</span>
                                                    <span class="font-14 text-light2 d-block">Failed</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-sm-6 mb-lg-0 mb-3 data-box-card">
                                            <div
                                                class="content-wrapper bg-white br-12 d-flex align-items-center justify-content-left position-relative">
                                                <div class="icon">
                                                    <img src="{{asset('frontend/img/cool.svg')}}" alt="">
                                                </div>
                                                <div class="text">
                                                    <span
                                                        class="font-20 fw-700 d-block">{{ $extraOrdinary_count }}</span>
                                                    <span class="font-14 text-light2 d-block">Extraordinary</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-sm-6 mb-lg-0 mb-3 data-box-card">
                                            <div
                                                class="content-wrapper bg-white br-12 d-flex align-items-center justify-content-left position-relative">
                                                <div class="icon">
                                                    <img src="{{asset('frontend/img/test.svg')}}" alt="">
                                                </div>
                                                <div class="text">
                                                    <span class="font-20 fw-700 d-block">{{ $total_exams_given }}</span>
                                                    <span class="font-14 text-light2 d-block">Total Exams</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            
                            <br>
                            <!-- NNC leaderboard -->
                            <h5>Nepal Nursing Council Exam Leaderboard :</h5>
                            <div class="widget pt-2">
                                <div class="short-desc">
                                    <div class="row mt-3">
                                        @foreach($nnc_top_scorers as $key=>$top_scorer)
                                        <div class="col-xl-3 col-lg-4 col-sm-6 mb-lg-0 mb-3 data-box-card" style="text-align:center;">
                                            <div
                                                class="content-wrapper bg-white br-12 d-flex align-items-center justify-content-left position-relative">
                                                
                                                <div class="text">
                                                    <span class="font-15 fw-500 d-block">
                                                        @if($key+1 == 1)
                                                            {{ $key+1 }}st<br>
                                                        @elseif($key+1 == 2)
                                                            {{ $key+1 }}nd<br>
                                                        @elseif($key+1 == 3)
                                                            {{ $key+1 }}rd<br>
                                                        @else
                                                        {{ $key+1 }}th<br>
                                                        
                                                        @endif
                                                        
                                                    </span>
                                                    <div style="font-size:20px; font-weight: bold;">
                                                        {{ @$top_scorer->user->name }}
                                                    </div>   

                                                    <div style="margin-top: 20px; font-size: 18px;"> 
                                                        {{ $top_scorer->percentage }} %
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                            
                                    </div>
                                </div>
                            </div> 
                        </div>
                        @endif
                    </div>
                    <div class="col-12">
                        <div class="sidebar p-4 mb-5 border-bottom">
                            <div class="widget pt-2">
                                <h5 class="widget-title">Personal Details :</h5>

                                <div class="media align-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"
                                        class="feather feather-mail fea icon-ex-md text-muted mr-3">
                                        <path
                                            d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
                                        </path>
                                        <polyline points="22,6 12,13 2,6"></polyline>
                                    </svg>

                                    @if(!$original_user && $user->profile_privacy_status[0]==0)
                                    <div class="media-body">
                                        <h6 class="text-primary mb-0">Username :</h6>
                                        <a class="text-muted"><i>Private</i></a>
                                    </div>
                                    @else
                                    <div class="media-body">
                                        <h6 class="text-primary mb-0">Username :</h6>
                                        <a class="text-muted">{{ $user->username }}</a>
                                    </div>
                                    @endif

                                    @if($original_user)
                                    <form method="post"
                                        action="{{ route('user.privacy', ['username'=>auth()->user()->username ]) }}">
                                        @csrf
                                        <div class="button-conf">
                                            @if( auth()->user()->profile_privacy_status[0]==1 )
                                            <button type="submit" class="btn btn-danger" name="userPrivacy"
                                                value="username-private">Make Private</button>
                                            @else
                                            <button type="submit" class="btn btn-danger" name="userPrivacy"
                                                value="username-public">Make Public</button>
                                            @endif
                                        </div>
                                        @endif
                                </div>

                                <div class="media align-items-center mt-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"
                                        class="feather feather-mail fea icon-ex-md text-muted mr-3">
                                        <path
                                            d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
                                        </path>
                                        <polyline points="22,6 12,13 2,6"></polyline>
                                    </svg>

                                    @if(!$original_user && $user->profile_privacy_status[1]==0)
                                    <div class="media-body">
                                        <h6 class="text-primary mb-0">Email : </h6>
                                        <a class="text-muted"><i>Private</i></a>
                                    </div>
                                    @else
                                    <div class="media-body">
                                        <h6 class="text-primary mb-0">Email : </h6>
                                        <a href="mailto:{{$user->email}}" class="text-muted">{{ $user->email }}</a>
                                    </div>
                                    @endif

                                    @if($original_user)
                                    <form method="post"
                                        action="{{ route('user.privacy', ['username'=>auth()->user()->username ]) }}">
                                        @csrf
                                        <div class="button-conf">
                                            @if( auth()->user()->profile_privacy_status[1]==1 )
                                            <button type="submit" class="btn btn-danger" name="userPrivacy"
                                                value="email-private">Make Private</button>
                                            @else
                                            <button type="submit" class="btn btn-danger" name="userPrivacy"
                                                value="email-public">Make Public</button>
                                            @endif
                                        </div>

                                        @endif
                                </div>

                                <div class="media align-items-center mt-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"
                                        class="feather feather-gift fea icon-ex-md text-muted mr-3">
                                        <polyline points="20 12 20 22 4 22 4 12"></polyline>
                                        <rect x="2" y="7" width="20" height="5"></rect>
                                        <line x1="12" y1="22" x2="12" y2="7"></line>
                                        <path d="M12 7H7.5a2.5 2.5 0 0 1 0-5C11 2 12 7 12 7z"></path>
                                        <path d="M12 7h4.5a2.5 2.5 0 0 0 0-5C13 2 12 7 12 7z"></path>
                                    </svg>

                                    @if(!$original_user && $user->profile_privacy_status[2]==0)
                                    <div class="media-body">
                                        <h6 class="text-primary mb-0">Date of Birth :</h6>
                                        <p class="text-muted mb-0"><i>Private</i></p>
                                    </div>
                                    @else
                                    <div class="media-body">
                                        <h6 class="text-primary mb-0">Date of Birth :</h6>
                                        <p class="text-muted mb-0">{{ $user->dob }}</p>
                                    </div>
                                    @endif
                                    @if($original_user)

                                    <div class="button-conf">
                                        @if( auth()->user()->profile_privacy_status[2]==1 )
                                        <button type="submit" class="btn btn-danger" name="userPrivacy"
                                            value="dob-private">Make
                                            Private</button>
                                        @else
                                        <button type="submit" class="btn btn-danger" name="userPrivacy"
                                            value="dob-public">Make
                                            Public</button>
                                        @endif
                                    </div>
                                    @endif
                                </div>

                                <div class="media align-items-center mt-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"
                                        class="feather feather-map-pin fea icon-ex-md text-muted mr-3">
                                        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                        <circle cx="12" cy="10" r="3"></circle>
                                    </svg>
                                    @if(!$original_user && $user->profile_privacy_status[3]==0)
                                    <div class="media-body">
                                        <h6 class="text-primary mb-0">Address :</h6>
                                        <a class="text-muted"><i>Private</i></a>
                                    </div>
                                    @else
                                    <div class="media-body">
                                        <h6 class="text-primary mb-0">Address :</h6>
                                        <a href="javascript:void(0)" class="text-muted">{{ $user->address }}</a>
                                    </div>
                                    @endif
                                    @if($original_user)
                                    <div class="button-conf">
                                        @if( auth()->user()->profile_privacy_status[3]==1 )
                                        <button type="submit" class="btn btn-danger" name="userPrivacy"
                                            value="address-private">Make Private</button>
                                        @else
                                        <button type="submit" class="btn btn-danger" name="userPrivacy"
                                            value="address-public">Make Public</button>
                                        @endif
                                    </div>
                                    @endif
                                </div>

                                <div class="media align-items-center mt-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"
                                        class="feather feather-phone fea icon-ex-md text-muted mr-3">
                                        <path
                                            d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                        </path>
                                    </svg>

                                    @if(!$original_user && $user->profile_privacy_status[3]==0)
                                    <div class="media-body">
                                        <h6 class="text-primary mb-0">Contact No :</h6>
                                        <a class="text-muted"><i>Private</i></a>
                                    </div>
                                    @else
                                    <div class="media-body">
                                        <h6 class="text-primary mb-0">Contact No :</h6>
                                        <a href="tel:{{ $user->phone_no }}" class="text-muted">{{ $user->phone_no }}</a>
                                    </div>
                                    @endif
                                    @if($original_user)

                                    <div class="button-conf">
                                        @if( auth()->user()->profile_privacy_status[4]==1 )
                                        <button type="submit" class="btn btn-danger" name="userPrivacy"
                                            value="contact-private">Make Private</button>
                                        @else
                                        <button type="submit" class="btn btn-danger" name="userPrivacy"
                                            value="contact-public">Make Public</button>
                                        @endif
                                    </div>
                                    </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="sidebar p-4 mb-5">
                            <div class="widget pt-2">
                                <h5 class="widget-title">Basic Info :</h5>
                                <div class="short-desc">

                                    <div class="basic-single-block">
                                        <h4>Classes Associated:</h4>
                                        <p>
                                            @php
                                            $classes = '';
                                            @endphp
                                            @foreach($user->grades as $key=>$grade)

                                            @php
                                            $classes .= '<a href="'. route('class',[$grade->program->slug,$grade->faculty->slug,$grade->slug]).'">'.
                                                $grade->name.'</a>, ';
                                            @endphp

                                            @endforeach
                                            {!! rtrim($classes,', ') !!}
                                        </p>
                                        <i>{{ $user->school_name }}</i>
                                    </div>
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
@endsection