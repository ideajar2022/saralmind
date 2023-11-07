@extends('frontend.app')

@section('content')
<section class="inner-header profile-header"
    style="background-image: url({{asset('frontend/img/inner-banner_bg.svg')}}),linear-gradient(359.93deg,#ddeffd -44.48%,#e5f1fb 102.88%);">
</section>
<section class="bg-profile d-table w-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card public-profile border-0 rounded shadow">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-lg-2 col-md-3 text-md-left text-center">
                                <div class="avatar">
                                    <img src="{{asset('frontend/img/team_member.jpg')}}"
                                        class="rounded-circle shadow d-block mx-auto" alt="">
                                </div>
                            </div>

                            <div class="col-lg-10 col-md-9">
                                <div class="row align-items-end">
                                    <div class="col-md-8 text-md-left text-center mt-4 mt-sm-0">
                                        <h3 class="title mb-0">Sajan Grg</h3>
                                        <small class="text-muted h6 mr-2">Student</small>
                                        <ul class="list-unstyled social-icon social-icon-wrapper  social mb-0 mt-2">
                                            <li class="list-inline-item"><a href="{{url('/setting')}}" class="rounded"
                                                    data-toggle="tooltip" data-placement="bottom" title=""
                                                    data-original-title="Settings"><i data-feather="tool"
                                                        class="icon-sm fea-social"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="pt-3">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="pb-5">
    <div class="container mt-lg-5">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-12">
                <div class="sidebar p-4 mb-5 rounded shadow">

                    <div class="widget pt-2">
                        <h5 class="widget-title">Basic Info :</h5>
                        <div class="short-desc">
                            <div class="basic-single-block">
                                <h4>School Name:</h4>
                                <p>Marvellous English Boarding School</p>
                            </div>
                            <div class="basic-single-block">
                                <h4>School Address:</h4>
                                <p>Maitidevi, Kathmandu, Nepal</p>
                            </div>
                            <div class="basic-single-block">
                                <h4>Classes Associated:</h4>
                                <p><a href="{{url('/classes')}}">Grade 6</a>, <a href="{{url('/classes')}}">Grade 9</a>
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-6">
                <div class="sidebar p-4 mb-5 rounded shadow">
                    <div class="widget pt-2">
                        <h5 class="widget-title">Personal Details :</h5>
                        <div class="media align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-mail fea icon-ex-md text-muted mr-3">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
                                </path>
                                <polyline points="22,6 12,13 2,6"></polyline>
                            </svg>
                            <div class="media-body">
                                <h6 class="text-primary mb-0">Email :</h6>
                                <a href="mailto:youremail@mail.com" class="text-muted">youremail@mail.com</a>
                            </div>
                        </div>
                        <div class="media align-items-center mt-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-globe fea icon-ex-md text-muted mr-3">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="2" y1="12" x2="22" y2="12"></line>
                                <path
                                    d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z">
                                </path>
                            </svg>
                            <div class="media-body">
                                <h6 class="text-primary mb-0">Website :</h6>
                                <a href="https://www.siteown.com" target="_blank" class="text-muted">www.siteown.com</a>
                            </div>
                        </div>
                        <div class="media align-items-center mt-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-gift fea icon-ex-md text-muted mr-3">
                                <polyline points="20 12 20 22 4 22 4 12"></polyline>
                                <rect x="2" y="7" width="20" height="5"></rect>
                                <line x1="12" y1="22" x2="12" y2="7"></line>
                                <path d="M12 7H7.5a2.5 2.5 0 0 1 0-5C11 2 12 7 12 7z"></path>
                                <path d="M12 7h4.5a2.5 2.5 0 0 0 0-5C13 2 12 7 12 7z"></path>
                            </svg>
                            <div class="media-body">
                                <h6 class="text-primary mb-0">Data of Birth :</h6>
                                <p class="text-muted mb-0">2nd March, 1996</p>
                            </div>
                        </div>
                        <div class="media align-items-center mt-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-map-pin fea icon-ex-md text-muted mr-3">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                <circle cx="12" cy="10" r="3"></circle>
                            </svg>
                            <div class="media-body">
                                <h6 class="text-primary mb-0">Location :</h6>
                                <a href="javascript:void(0)" class="text-muted">Battisputali, Kathmandu</a>
                            </div>
                        </div>
                        <div class="media align-items-center mt-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-phone fea icon-ex-md text-muted mr-3">
                                <path
                                    d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                </path>
                            </svg>
                            <div class="media-body">
                                <h6 class="text-primary mb-0">Cell No :</h6>
                                <a href="tel:(+12) 1254-56-4896" class="text-muted">(+12) 1254-56-4896</a>
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