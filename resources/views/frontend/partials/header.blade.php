<header id="topnav" class="defaultscroll sticky nav-sticky">
    <div class="container">
        <!-- Logo container-->
        <div>
            <!-- <a class="logo" href="index.html">Saralmind<span class="text-primary">.</span></a> -->
            <a class="logo" href="{{url('/')}}">
                <img class="img-fluid" src="{{asset('frontend/img/saralmind-logo.png')}}" alt="Primary Logo">
                <!-- <span class="text-primary">SARALMIND</span> -->
            </a>
        </div>
        <div class="d-flex align-items-center buy-button">
            @auth
            <!-- User Buttons -->
            <div class="user-wrapper">
                <span class="user"><img src="{{ auth()->user()->image_url }}" alt=""
                        class="img-fluid">{{ auth()->user()->name }}</span>
                <div class="dropdown-list">
                    <a href="{{ route('user.profile', ['username' => auth()->user()->username ]) }}"><i data-feather="user"></i> Dashboard</a>

                    <a href="{{url('/setting')}}"><i data-feather="settings"></i> Setting</a>

                    <a href="{{url('/change-password')}}"><i data-feather="key"></i> Change Password</a>

                    <a id="logout" href="javascript:void(0)"><i data-feather="log-out"></i> Logout</a>
                </div>
            </div>
            @endauth
            @guest
            <!-- Login Buttons -->
            <a href="javascript:void(0)" target="_blank" class="btn btn-register showRegisterPop">Register</a>
            <a href="javascript:void(0)" target="_blank" class="btn btn-primary showLoginPop" >Login</a>
            @endguest
            <div id="search-icon" onclick="showSearch()">
                <img src="{{asset('frontend/img/new-img/search.svg')}}" height="30" width="30" alt="">
            </div>
            @include('frontend.partials.search-old')
        </div>
        <div class="menu-extras">
            <div class="menu-item">
                <!-- Mobile menu toggle-->
                <a class="navbar-toggle">
                    <div class="lines">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </a>
            </div>
        </div>

        <div id="navigation">
            <!-- Navigation Menu-->
            <ul class="navigation-menu">
                <li><a href="{{url('/')}}">Home</a></li>

                <!-- {!! cache('categories_view') !!} -->

                <!-- <li>
                    <a href="{{url('/about')}}">About</a>
                </li> -->
                <li>
                    <a href="{{url('/blogs')}}">Blogs</a>
                </li>
                <li>
                    <a href="{{url('/contact-us')}}">Contact</a>
                </li>
                <li>
                    <a href="{{url('/about')}}">About Us</a>
                </li>
                <li>
                    <a href="{{url('/courses')}}">Courses</a>
                </li>
                
                <li>
                    <a href="{{url('/nnc-exam')}}">Nursing Council</a>
                </li>
                

            </ul>
            @guest
            <div class="buy-menu-btn d-none">
                <a href="javascript:void(0)" target="_blank" class="btn btn-primary" data-toggle="modal" data-target="#login-popup">Login</a>
            </div>
            @endguest
        </div>
    </div>
</header>