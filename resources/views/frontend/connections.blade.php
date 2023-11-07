@extends('frontend.app')

@section('content')
<section class="inner-header profile-header"  style="background-image: url({{asset('frontend/img/inner-banner_bg.svg')}}),linear-gradient(359.93deg,#ddeffd -44.48%,#e5f1fb 102.88%);">
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
                                    <img src="{{asset('frontend/img/team_member.jpg')}}" class="rounded-circle shadow d-block mx-auto" alt="">
                                </div>
                            </div>

                            <div class="col-lg-10 col-md-9">
                                <div class="row align-items-end">
                                    <div class="col-md-8 text-md-left text-center mt-4 mt-sm-0">
                                        <h3 class="title mb-0">Sajan Grg</h3>
                                        <small class="text-muted h6 mr-2">Student</small>
                                        <ul class="list-unstyled social-icon social-icon-wrapper  social mb-0 mt-2">
                                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Notifications"><i data-feather="user-plus"></i></a></li>
                                            <li class="list-inline-item"><a href="{{url('/setting')}}" class="rounded" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Settings"><i data-feather="tool"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="search_connection-wrapper">
                                        <form>
                                            <div class="form-group mb-0 position-relative">
                                                <div class="input-group">
                                                    <input name="email" id="email2" type="email" class="form-control" placeholder="Search connections" required="" aria-describedby="newssubscribebtn">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-primary submitBnt" type="submit" id="newssubscribebtn"><i data-feather="search"></i> Search</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
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
        <h5>Users:</h5>
        <div class="connections-wrapper">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="profile-notes-wrapper p-3 rounded shadow">
                        <div class="media key-feature align-items-center ">
                            <a href="javascript:void(0)" class="avatar">
                                <img src="{{asset('frontend/img/team_member.jpg')}}" class="rounded-circle mt-3" title="" alt="">
                            </a>
                            <div class="media-body content ml-3">
                                <h4>Kendra B. Mukhia</h4>
                                <p>Teacher for <span>Social Studies</span></p>
                                <p>Grade 6<p> 
                            </div>
                        </div>
                        <div class="follow-wrapper">
                            <a href="javascript:void(0)" class="follow-btn">Follow Me</a>  
                            <!-- <a href="javascript:void(0)" class="unfollow-btn">Unfollow Me</a>   -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="profile-notes-wrapper p-3 rounded shadow">
                        <div class="media key-feature align-items-center ">
                            <a href="javascript:void(0)" class="avatar">
                                <img src="{{asset('frontend/img/team_member.jpg')}}" class="rounded-circle mt-3" title="" alt="">
                            </a>
                            <div class="media-body content ml-3">
                                <h4>Kendra B. Mukhia</h4>
                                <p>Teacher for <span>Social Studies</span></p>
                                <p>Grade 6<p> 
                            </div>
                        </div>
                        <div class="follow-wrapper">
                            <!-- <a href="javascript:void(0)" class="follow-btn">Follow Me</a>   -->
                            <a href="javascript:void(0)" class="unfollow-btn">Unfollow Me</a>  
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="profile-notes-wrapper p-3 rounded shadow">
                        <div class="media key-feature align-items-center ">
                            <a href="javascript:void(0)" class="avatar">
                                <img src="{{asset('frontend/img/team_member.jpg')}}" class="rounded-circle mt-3" title="" alt="">
                            </a>
                            <div class="media-body content ml-3">
                                <h4>Kendra B. Mukhia</h4>
                                <p>Teacher for <span>Social Studies</span></p>
                                <p>Grade 6<p> 
                            </div>
                        </div>
                        <div class="follow-wrapper">
                            <!-- <a href="javascript:void(0)" class="follow-btn">Follow Me</a>   -->
                            <a href="javascript:void(0)" class="unfollow-btn">Unfollow Me</a>  
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="profile-notes-wrapper p-3 rounded shadow">
                        <div class="media key-feature align-items-center ">
                            <a href="javascript:void(0)" class="avatar">
                                <img src="{{asset('frontend/img/team_member.jpg')}}" class="rounded-circle mt-3" title="" alt="">
                            </a>
                            <div class="media-body content ml-3">
                                <h4>Kendra B. Mukhia</h4>
                                <p>Teacher for <span>Social Studies</span></p>
                                <p>Grade 6<p> 
                            </div>
                        </div>
                        <div class="follow-wrapper">
                            <!-- <a href="javascript:void(0)" class="follow-btn">Follow Me</a>   -->
                            <a href="javascript:void(0)" class="unfollow-btn">Unfollow Me</a>  
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="profile-notes-wrapper p-3 rounded shadow">
                        <div class="media key-feature align-items-center ">
                            <a href="javascript:void(0)" class="avatar">
                                <img src="{{asset('frontend/img/team_member.jpg')}}" class="rounded-circle mt-3" title="" alt="">
                            </a>
                            <div class="media-body content ml-3">
                                <h4>Kendra B. Mukhia</h4>
                                <p>Teacher for <span>Social Studies</span></p>
                                <p>Grade 6<p> 
                            </div>
                        </div>
                        <div class="follow-wrapper">
                            <a href="javascript:void(0)" class="follow-btn">Follow Me</a>  
                            <!-- <a href="javascript:void(0)" class="unfollow-btn">Unfollow Me</a>   -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="profile-notes-wrapper p-3 rounded shadow">
                        <div class="media key-feature align-items-center ">
                            <a href="javascript:void(0)" class="avatar">
                                <img src="{{asset('frontend/img/team_member.jpg')}}" class="rounded-circle mt-3" title="" alt="">
                            </a>
                            <div class="media-body content ml-3">
                                <h4>Kendra B. Mukhia</h4>
                                <p>Teacher for <span>Social Studies</span></p>
                                <p>Grade 6<p> 
                            </div>
                        </div>
                        <div class="follow-wrapper">
                            <a href="javascript:void(0)" class="follow-btn">Follow Me</a>  
                            <!-- <a href="javascript:void(0)" class="unfollow-btn">Unfollow Me</a>   -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="profile-notes-wrapper p-3 rounded shadow">
                        <div class="media key-feature align-items-center ">
                            <a href="javascript:void(0)" class="avatar">
                                <img src="{{asset('frontend/img/team_member.jpg')}}" class="rounded-circle mt-3" title="" alt="">
                            </a>
                            <div class="media-body content ml-3">
                                <h4>Kendra B. Mukhia</h4>
                                <p>Teacher for <span>Social Studies</span></p>
                                <p>Grade 6<p> 
                            </div>
                        </div>
                        <div class="follow-wrapper">
                            <a href="javascript:void(0)" class="follow-btn">Follow Me</a>  
                            <!-- <a href="javascript:void(0)" class="unfollow-btn">Unfollow Me</a>   -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="profile-notes-wrapper p-3 rounded shadow">
                        <div class="media key-feature align-items-center ">
                            <a href="javascript:void(0)" class="avatar">
                                <img src="{{asset('frontend/img/team_member.jpg')}}" class="rounded-circle mt-3" title="" alt="">
                            </a>
                            <div class="media-body content ml-3">
                                <h4>Kendra B. Mukhia</h4>
                                <p>Teacher for <span>Social Studies</span></p>
                                <p>Grade 6<p> 
                            </div>
                        </div>
                        <div class="follow-wrapper">
                            <!-- <a href="javascript:void(0)" class="follow-btn">Follow Me</a>   -->
                            <a href="javascript:void(0)" class="unfollow-btn">Unfollow Me</a>  
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="profile-notes-wrapper p-3 rounded shadow">
                        <div class="media key-feature align-items-center ">
                            <a href="javascript:void(0)" class="avatar">
                                <img src="{{asset('frontend/img/team_member.jpg')}}" class="rounded-circle mt-3" title="" alt="">
                            </a>
                            <div class="media-body content ml-3">
                                <h4>Kendra B. Mukhia</h4>
                                <p>Teacher for <span>Social Studies</span></p>
                                <p>Grade 6<p> 
                            </div>
                        </div>
                        <div class="follow-wrapper">
                            <a href="javascript:void(0)" class="follow-btn">Follow Me</a>  
                            <!-- <a href="javascript:void(0)" class="unfollow-btn">Unfollow Me</a>   -->
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