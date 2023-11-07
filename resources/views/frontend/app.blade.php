<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-NQDGW77');</script>
    <!-- End Google Tag Manager -->

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-15DRLT4LSG"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-15DRLT4LSG');
    </script>

    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('meta')

    <meta name="robots" content="INDEX,FOLLOW" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <meta name="" content="IE=edge,chrome=1" />

    
    <meta name="google-site-verification" content="" />
    <!--     <link rel="shortcut icon" type="image" href="https://th.bing.com/th/id/OIP.mi62bnmJVSrvma97kgmDqAHaHZ?w=220&h=219&c=7&r=0&o=5&pid=1.7"> -->
    <!-- <link rel="shortcut icon" type="image" href="https://www.saralmind.com/frontend/img/saralmind-logo.png"> -->

    <meta name="facebook-domain-verification" content="cbmnfbg7jrafb8l2pcajzjmlkqbyv7" />


    <link rel="icon" type="image/png" href="{{ asset('img/icons/fav-icon.png') }}">

    <!-- bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <link rel="stylesheet"
        href="https://fonts.sandbox.google.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('backend/plugins/select2/css/select2.min.css') }}">
    </script>
    <link rel="stylesheet" href="{{ asset('frontend/css/venobox.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/vendor/slick-slider/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/vendor/slick-slider/slick/slick-theme.css') }}">

    <!-- Styles -->
    <link href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/jquery.quiz.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/default.css') }}?sdd" rel="stylesheet">
    <link href="{{ asset('frontend/css/styles.css') }}?sdd" rel="stylesheet">
    <link href="{{ asset('frontend/css/owl.carousel.min.css') }}?sdd" rel="stylesheet">
    <link href="{{ asset('frontend/css/owl.theme.default.min.css') }}?sdd" rel="stylesheet">
    <script async src="https://cse.google.com/cse.js?cx=9771a4d70736ab870"></script>
    {{--    <link href="{{ asset('frontend/css/custom-style.css') }}" rel="stylesheet">--}}
    @yield('extra-css')
    <script type="text/x-mathjax-config">
        MathJax.Hub.Config({
        showProcessingMessages: false,
        tex2jax: { inlineMath: [['$','$'],['\\(','\\)']] }
      });
    </script>
    <script type="text/javascript" async src="https://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-AMS_HTML">
    </script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-15DRLT4LSG"></script>
    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-15DRLT4LSG');
    </script>

    <!-- Meta Pixel Code -->
    <script>
      !function(f,b,e,v,n,t,s)
      {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
      n.callMethod.apply(n,arguments):n.queue.push(arguments)};
      if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
      n.queue=[];t=b.createElement(e);t.async=!0;
      t.src=v;s=b.getElementsByTagName(e)[0];
      s.parentNode.insertBefore(t,s)}(window, document,'script',
      'https://connect.facebook.net/en_US/fbevents.js');
      fbq('init', '1223565068540284');
      fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
      src="https://www.facebook.com/tr?id=1223565068540284&ev=PageView&noscript=1"
    /></noscript>
    <!-- End Meta Pixel Code -->

    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7884450043218320"
         crossorigin="anonymous"></script>
</head>

<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NQDGW77"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous"
        src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v7.0&appId=1390823311105824&autoLogAppEvents=1">
    </script>
    <div id="app">

        @include('frontend.partials.header')

        @yield('content')

        @include('frontend.partials.footer')

        <div class="loader" style="display: none">
            <div class="loader-inner">
                <div class="cssload-loader"></div>
            </div>
        </div>
    </div>

    @guest
    <!-- Login -->
    <div class="modal fade" id="login-popup" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="loginLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg register-form-wrapper">
            <div class="modal-content pb-5">
                <div class="modal-header py-3 border-0">
                    <button type="button" class="close close-login-modal" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-0 col-sm-9 col-12 mx-auto">
                    <h5 class="modal-title" id="staticBackdropLabel">
                        <a class="logo" href="">
                            <span class="text-primary">LOGIN</span>
                        </a>
                    </h5>
                    <p class="alert-danger" id="login-error"></p>
                    <form method="post" action="#" id="login-form">
                        <label for="email">Email</label>
                        <input type="email" placeholder="Email" name="email" class="input" />
                        <label for="password">Password</label>
                        <div class="password-field-wrapper position-relative">
                            <input id="password-field" type="password" name="password" placeholder="Password" class="" />
                            <div class="position-absolute" id="eyeBtn" onclick="changeTypeLogin()">
                                <i class="fa fa-eye" id="eye"></i>
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-between check-box">
                            <div class=" d-flex align-items-centercheck">
                                <input type="checkbox" value="" id="">
                                <p>Remember Me</p>
                            </div>
                            <a class="showForgotPop" href="javascript:void(0)">Forgot Password</a>
                        </div>
                        <button class="bg-primary text-white w-100 border-0" id="login">Login</button>
                    </form>
                    <div class="text-center already-account">
                        <p>Doesn't have an account ?<a class="showRegisterPop" href="#"> Click Here</a></p>
                    </div>
                    <div class="row google-facebook">
                        
                        <a href="{{ url('/login/google') }}" class="col-sm-6 col-12 border-0 bg-transparent">
                            <img src="{{asset('frontend/img/new-img/google.png')}}" alt="">
                            Login with google
                        </a>
                       <!--  <a href="{{ url('/login/facebook') }}" class="col-sm-6 col-12 border-0 bg-transparent" id="facebookLogin">
                            <img src="{{asset('frontend/img/new-img/facebook.png')}}" alt="">
                            Login with facebook
                        </a> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="forgotPopup" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="fogotLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg register-form-wrapper">
            <div class="modal-content">
                <div class="modal-header py-3 border-0">
                    <button type="button" class="close close-forgot-modal" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-0 col-sm-9 col-12 mx-auto">
                    <h5 class="modal-title" id="staticBackdropLabel">
                        <a class="logo" href="">
                            <span class="text-primary">Forgot Password</span>
                        </a>
                    </h5>
                    <p id="password-reset-success"></p>
                    <p class="alert-danger" id="forgot-password-error"></p>
                    <form method="post" action="#" id="forgot-password-form">
                        <label for="email">Email</label>
                        <input type="email" placeholder="Email" name="email" class="input" />
                       
                        <button class="bg-primary text-white w-100 border-0" id="send-password-reset-link">Send Reset Link</button>
                    </form>
                    <div class="text-center already-account">
                        <p>Already have an account ?<a href="#" class="showLoginPop"> Click Here</a></p>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <!-- Register -->
    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg register-form-wrapper">
            <div class="modal-content pb-5">
                <div class="modal-header py-3 border-0">
                    <button type="button" class="close close-register-modal" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-0 col-sm-9 col-12 mx-auto">
                    <h5 class="modal-title" id="staticBackdropLabel">
                        <a class="logo" href="">
                            <span class="text-primary">REGISTER NOW</span>
                        </a>
                    </h5>
                    <div class="already-account">
                        <p>Already have an account ?<a href="#" class="showLoginPop"> Click Here To Login</a></p>
                    </div>
                    <div class="row google-facebook">
                        <a href="{{ url('/login/google') }}" class="col-sm-6 col-12 border-0 bg-transparent">
                            <img src="{{asset('frontend/img/new-img/google.png')}}" alt="">
                            Register with google
                        </a>
                        <!-- <a href="{{ url('/login/facebook') }}" class="col-sm-6 col-12 border-0 bg-transparent">
                            <img src="{{asset('frontend/img/new-img/facebook.png')}}" alt="">
                            Register with facebook
                        </a> -->
                        <br><br>
                    </div>
                    <p class="alert-danger" id="register-error"></p>
                    <form method="post" action="#" id="register-form">
                        <label for="username">Full Name *</label>
                        <input type="text" placeholder="Full Name" name="name" class="input" required />
                        <label for="username">Username *</label>
                        <input type="text" placeholder="Username" name="username" class="input" required />
                        <label for="exampleInputPassword1">Mobile/Whatsapp:</label>
                        <input type="text" placeholder="+977 - "  class="input" name="phone_no" id="phone">
                        <label for="email">Email *</label>
                        <input type="email" placeholder="Email" name="email" class="input" required />
                        <label for="">Password</label>
                        <div class="password-field-wrapper position-relative">
                            <input id="myInput" type="password" name="password" placeholder="Password" />
                            <div class="position-absolute" id="eyeBtn" onclick="changeTypeRegister()">
                                <i class="fa fa-eye" id="eyed"></i>
                            </div>
                        </div>
                        <label for="">Confirm Password</label>
                        <div class="password-field-wrapper position-relative">
                            <input id="myInputConform" type="password" name="password_confirmation" placeholder="Password" />
                            <div class="position-absolute" id="eyeBtn" onclick="changeTypeRegisterConform()">
                                <i class="fa fa-eye" id="eyes"></i>
                            </div>
                        </div>
                        <div class="d-flex align-items-center check-box">
                            <input type="checkbox" value="" id="">
                            <p>I agree with Terms and Privacy</p>
                        </div>
                        <button id= "register" class="bg-primary text-white w-100 border-0">Register</button>
                    </form>
                    <!-- <div class="text-center already-account">
                        <p>Already have an account ?<a href="#" class="showLoginPop"> Click Here</a></p>
                    </div>
                    <div class="row google-facebook">
                        <a href="{{ url('/login/google') }}" class="col-sm-6 col-12 border-0 bg-transparent">
                            <img src="{{asset('frontend/img/new-img/google.png')}}" alt="">
                            Register with google
                        </a>
                        <a href="{{ url('/login/facebook') }}" class="col-sm-6 col-12 border-0 bg-transparent">
                            <img src="{{asset('frontend/img/new-img/facebook.png')}}" alt="">
                            Register with facebook
                        </a>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
    @endguest

    <!-- Scripts -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <!-- <script src="{{ asset('frontend/js/jquery-3.5.0.min.js') }}"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>


    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.js"></script>
    <script src="{{ asset('frontend/vendor/slick-slider/slick/slick.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.matchHeight-min.js') }}"></script>
    <script src="{{ asset('frontend/js/venobox.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.quiz.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.quiz.js') }}"></script>
    <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <script src="{{ asset('frontend/js/typed.js') }}"></script>
    <script src="{{ asset('frontend/js/custom.js') }}"></script>

    <!-- Production -->
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://unpkg.com/tippy.js@6"></script>

    @yield('extra-js')
    <script type="text/javascript">
        var button = document.getElementById('googleLogin');
        // button.onclick = function() {}
        // location.assign('/')
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

        $(document).on('click',"#login",function(e){
            var page = $("form#login-form").find('input[name="page"]').val();
            e.preventDefault();
            var postData = {
                email: $("form#login-form").find('input[name="email"]').val(),
                password: $("form#login-form").find('input[name="password"]').val()
            };
            $('.loader').show();
            $('#login-error.alert-danger').html('');
            $('#login-error.alert-danger').hide();

            $.ajax({
                type: "POST",
                url: "{{ route('login') }}",
                data: postData,
                dataType: 'JSON',
                success: function(response) {
                   
                    if (response.status == 'success') {
                        if(page=='nnc'){
                            window.location = "/nnc-exam-guidelines"
                        }

                        else{
                            window.location.reload();
                        }
                    } 
                },
                error: function(request, status, error) {
                    $('.loader').hide();
                    var json = $.parseJSON(request.responseText);
                    $.each(json.errors, function(key, value) {
                        $('#login-error.alert-danger').show();
                        $('#login-error.alert-danger').append('<p>' + value + '</p>');
                    });
                }
            });

        });

        $(document).on('click',"#register",function(e){
            e.preventDefault();

            var postData = {
                name: $("form#register-form").find('input[name="name"]').val(),
                email: $("form#register-form").find('input[name="email"]').val(),
                phone_no: $("form#register-form").find('input[name="phone_no"]').val(),
                password: $("form#register-form").find('input[name="password"]').val(),
                password_confirmation: $("form#register-form").find('input[name="password_confirmation"]').val(),
                username: $("form#register-form").find('input[name="username"]').val()
            };
            $('.loader').show();
            $('#register-error.alert-danger').html('');
            $('#register-error.alert-danger').hide();

            $.ajax({
                type: "POST",
                url: "{{ route('register') }}",
                data: postData,
                dataType: 'JSON',
                success: function(response) {
                   
                    if (response.status == 'success') {
                       window.location.reload();
                    } 
                },
                error: function(request, status, error) {
                    $('.loader').hide();
                    var json = $.parseJSON(request.responseText);
                    $.each(json.errors, function(key, value) {
                        $('#register-error.alert-danger').show();
                        $('#register-error.alert-danger').append('<p>' + value + '</p>');
                    });
                }
            });

        });

        $("#send-password-reset-link").on('click',function(e){
            e.preventDefault();
            var postData = {
                email: $("form#forgot-password-form").find('input[name="email"]').val()
            };
            $('.loader').show();
            $('#forgot-password-error.alert-danger').html('');
            $('#forgot-password-error.alert-danger').hide();
            $('#password-reset-success').html('')
            $('#password-reset-success').hide()

            $.ajax({
                type: "POST",
                url: "{{ route('password.email') }}",
                data: postData,
                dataType: 'JSON',
                success: function(response) {
                    $('.loader').hide();
                    $('#password-reset-success').show()
                    $('#password-reset-success').html(response.message)
                },
                error: function(request, status, error) {
                    $('.loader').hide();
                    var json = $.parseJSON(request.responseText);
                    $.each(json.errors, function(key, value) {
                        $('#forgot-password-error.alert-danger').show();
                        $('#forgot-password-error.alert-danger').append('<p>' + value + '</p>');
                    });
                }
            });
        });

        $("#update-password").on('click',function(e){
            e.preventDefault();
            var postData = {
                email: $("form#password-update-form").find('input[name="email"]').val(),
                password: $("form#password-update-form").find('input[name="password"]').val(),
                password_confirmation: $("form#password-update-form").find('input[name="password_confirmation"]').val(),
                token: $("form#password-update-form").find('input[name="token"]').val(),

            };
            $('.loader').show();
            $('#update-password-error.alert-danger').html('');
            $('#update-password-error.alert-danger').hide();
            $('#update-password-success').html('')
            $('#update-password-success').hide()

          
        });

        $("#logout").on('click',function(e){
            e.preventDefault();
            $('.loader').show();
            $.ajax({
                type: "POST",
                url: "{{ route('logout') }}",
                data: {},
                dataType: 'JSON',
                success: function(response) {
                    if (response.status == 'success') {
                       window.location.reload();
                    } 
                },
                error: function(request, status, error) {

                }
            });

        });

        $("input[name='url']").val(window.location.href)

        $("form[name='report-bug']").on('submit',function(e){
            e.preventDefault();
           
            //$('.loader').show();
            $('#report-bug-error.alert-danger').html('');
            $('#report-bug-error.alert-danger').hide();
            $('#report-bug-success').html('')
            $('#report-bug-success').hide()

            var postData = {
                url: $("form[name='report-bug']").find('input[name="url"]').val(),
                bug: $("form[name='report-bug']").find('textarea[name="bug"]').val(),
            };

            $.ajax({
                type: "POST",
                url: "{{ route('bug.report') }}",
                data: postData,
                dataType: 'JSON',
                success: function(response) {
                    if (response.status == 'success') {
                       
                        $("form[name='report-bug']").find('input[name="url"]').val('');
                        $("form[name='report-bug']").find('textarea[name="bug"]').val('');

                        $('#report-bug-success').show()
                    
                        $('#report-bug-success').html(response.message)
                    
                    } 
                },
                error: function(request, status, error) {
                    var json = $.parseJSON(request.responseText);
                    $.each(json.errors, function(key, value) {
                        $('#report-bug-error.alert-danger').show();
                        $('#report-bug-error.alert-danger').append('<p>' + value + '</p>');
                    });
                }
            });

        });

        $("form[name='professional']").on('submit',function(e){
            e.preventDefault();
           
            //$('.loader').show();
            $('#professional-error.alert-danger').html('');
            $('#professional-error.alert-danger').hide();
            $('#professional-success').html('')
            $('#professional-success').hide()

            var postData = {
                profession: $("form[name='professional']").find('input[name="profession"]:checked').val(),
                grades: $("form[name='professional']").find('select[name="grades"]').val(),
                subjects: $("form[name='professional']").find('select[name="subjects"]').val(),
                phone_no: $("form[name='phone_no']").find('input[name="phone_no"]').val(),
            };

            
            $.ajax({
                type: "POST",
                url: "{{ route('profession.update') }}",
                data: postData,
                dataType: 'JSON',
                success: function(response) {
                    if (response.status == 'success') {
                       
                        
                        // $("form[name='professional']").find('select[name="grades"]').val('');
                        // $("form[name='professional']").find('select[name="subjects"]').val('');
                        // $("form[name='professional']").find('input[name="phone_no"]').val('');

                        $('#professional-success').show()
                    
                        $('#professional-success').html(response.message)
                        $('#appropriate-occupation').modal('hide');

                    
                    } 
                },
                error: function(request, status, error) {
                    var json = $.parseJSON(request.responseText);
                    $.each(json.errors, function(key, value) {
                        $('#professional-error.alert-danger').show();
                        $('#professional-error.alert-danger').append('<p>' + value + '</p>');
                    });
                }
            });

        });

        $("form[name='subscription-form']").on('submit',function(e){
            e.preventDefault();
        
            $('#subscribe-error.alert-danger').html('');
            $('#subscribe-error.alert-danger').hide();
            $('#subscribe-success').html('')
            $('#subscribe-success').hide()

            var postData = {
                email: $("form[name='subscription-form']").find('input[name="email"]').val(),
            };

            $.ajax({
                type: "POST",
                url: "{{ route('subscribe') }}",
                data: postData,
                dataType: 'JSON',
                success: function(response) {
                    if (response.status == 'success') {
                       
                        $("form[name='subscription-form']").find('input[name="email"]').val('')

                        $('#subscribe-success').show()
                    
                        $('#subscribe-success').html(response.message)
                    
                    } 
                },
                error: function(request, status, error) {
                    var json = $.parseJSON(request.responseText);
                    $.each(json.errors, function(key, value) {
                        $('#subscribe-error.alert-danger').show();
                        $('#subscribe-error.alert-danger').append('<p>' + value + '</p>');
                    });
                }
            });

        });
    @auth
        @if(is_null(auth()->user()->type))
            $('#appropriate-occupation').modal('show');
        @endif
    @endauth

    </script>
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<!-- <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-639bf6a58e4ac7a5"></script> -->
    
</body>

</html>