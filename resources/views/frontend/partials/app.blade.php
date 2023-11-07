<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
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

    <link rel="icon" type="image/png" href="{{ asset('frontend/img/icons/saralmind_favicon.png') }}">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700&display=swap">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('backend/plugins/select2/css/select2.min.css') }}">
    </script>
    <link rel="stylesheet" href="{{ asset('frontend/css/venobox.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/vendor/slick-slider/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/vendor/slick-slider/slick/slick-theme.css') }}">

    <!-- Styles -->
    <link href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/jquery.quiz.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/default.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/styles.css') }}" rel="stylesheet">
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
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-50942427-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-50942427-1');
    </script>

    <!-- Start Alexa Certify Javascript -->
    <script type="text/javascript">
    _atrk_opts = {
        atrk_acct: "V0U/l1aQibl0Y8",
        domain: "saralmind.com",
        dynamic: true
    };
    (function() {
        var as = document.createElement('script');
        as.type = 'text/javascript';
        as.async = true;
        as.src = "https://certify-js.alexametrics.com/atrk.js";
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(as, s);
    })();
    </script>


</head>

<body>
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
    <div class="modal fade login-wrapper" id="login-popup" tabindex="-1" role="dialog" aria-labelledby="loginLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="wrapper" style="background-image: url({{asset('frontend/img/banner_1.jpg')}})">
                    <a href="#" class="close btn-close" data-dismiss="modal" aria-label="Close"></a>
                    <div class="container login-container">
                        <div class="row">
                            <div class="col-lg-5 offset-lg-8 col-md-4 offset-md-8">
                                <div class="inner-wrapper">
                                    <div class="flip-wrapper login-wrapper">
                                        <div class="logo-wrapper">
                                            <a href="#">
                                                <img class="img-fluid"
                                                    src="{{asset('frontend/img/saralmind-logo.png')}}" alt="">
                                            </a>
                                        </div>
                                        <div class="form-wrapper">
                                            <div class="geetings">
                                                <h1>Hello,</h1>
                                                <h1>Welcome Back</h1>
                                            </div>
                                            <h2>Please log in with your Saralmind ID and password</h2>
                                            <form id="login-form" action="#" method="post">
                                                <div id="login-error" class="alert alert-danger" style="display:none">
                                                </div>
                                                <div class="form-group">
                                                    <label for="username">Email</label>
                                                    <input type="email" class="form-control" required="" id="email"
                                                        name="email" placeholder="Enter your Email">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Password</label>
                                                    <input type="password" name="password" required=""
                                                        class="form-control" id="exampleInputPassword1"
                                                        placeholder="Enter your Password">
                                                    <a class="forgot-password" href="javascript:void(0)">Forgotten
                                                        password?</a>
                                                </div>
                                                <div class="submit-wrapper">
                                                    <a href="javascript:void(0)" class="btn btn-primary"
                                                        id="login">Login</a>

                                                </div>
                                                <div class="optional-login">
                                                    <span class="divider-login"><i>or</i></span>
                                                    <p class="text-center">Login with</p>
                                                    <div class="login-option-logos">
                                                        <a href="{{ route('social.login','google') }}"
                                                            class="btn btn-primary btn-google"><img
                                                                src="{{asset('frontend/img/icons/google_icon.png')}}">
                                                            Google</a>
                                                        <a href="{{ route('social.login','facebook') }}"
                                                            class="btn btn-primary btn-facebook"><img
                                                                src="{{asset('frontend/img/icons/facebook_icon.svg')}}">
                                                            Facebook</a>
                                                    </div>
                                                </div>
                                            </form>
                                            <div class="new-account">
                                                <p>Don't have an account? </p><a href="javascript:void(0)"
                                                    class="btn-flip">Click here</a>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Register Client -->
                                    <div class="flip-wrapper register-wrapper">
                                        <div class="logo-wrapper">
                                            <a href="#">
                                                <img class="img-fluid"
                                                    src="{{asset('frontend/img/saralmind-logo.png')}}"
                                                    alt="Primary Logo">
                                            </a>
                                        </div>
                                        <div class="form-wrapper">
                                            <div class="geetings">
                                                <h1>Register to Learn</h1>
                                            </div>
                                            <h2>Please fill up the form to begin learning.</h2>
                                            <form id="register-form" action="#" method="post">
                                                <div id="register-error" class="alert alert-danger"
                                                    style="display:none"></div>
                                                <div class="form-group">
                                                    <label for="username">Full Name</label>
                                                    <input type="text" class="form-control" required="" id="name"
                                                        name="name" placeholder="Enter your full name">
                                                </div>
                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input type="email" class="form-control" required="" id="email"
                                                        name="email" placeholder="Enter your email">
                                                </div>
                                                <div class="form-group">
                                                    <label for="phone_no">Phone no.</label>
                                                    <input type="phone_no" class="form-control" required=""
                                                        id="phone_no" name="phone_no"
                                                        placeholder="Enter your phone no.">
                                                </div>
                                                <div class="form-group">
                                                    <label for="password">Password</label>
                                                    <input type="password" name="password" required=""
                                                        class="form-control" id="password"
                                                        placeholder="Enter your password">
                                                </div>
                                                <div class="form-group">
                                                    <label for="password_confirm">Confirm Password</label>
                                                    <input type="password" name="password_confirmation" required=""
                                                        class="form-control" id="password_confirm"
                                                        placeholder="Confirm your password">
                                                </div>
                                                <div class="submit-wrapper">
                                                    <a href="javascript:void(0)" class="btn btn-primary"
                                                        id="register">Register</a>
                                                </div>
                                                <div class="optional-login">
                                                    <span class="divider-login"><i>or</i></span>
                                                    <p class="text-center">Register with</p>
                                                    <div class="login-option-logos">
                                                        <a href="{{ route('social.login','google') }}"
                                                            class="btn btn-primary btn-google"><img
                                                                src="{{asset('frontend/img/icons/google_icon.png')}}">
                                                            Google</a>
                                                        <a href="{{ route('social.login','facebook') }}"
                                                            class="btn btn-primary btn-facebook"><img
                                                                src="{{asset('frontend/img/icons/facebook_icon.svg')}}">
                                                            Facebook</a>
                                                    </div>
                                                </div>
                                            </form>
                                            <div class="new-account">
                                                <p>Already have an account? </p><a href="javascript:void(0)"
                                                    class="btn-flip">Click here</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="forgot_password-wrapper" id="forgot_password">
                                        <div class="logo-wrapper">
                                            <a href="#">
                                                <img class="img-fluid"
                                                    src="{{asset('frontend/img/saralmind-logo.png')}}" alt="">
                                            </a>
                                        </div>
                                        <div class="form-wrapper">
                                            <div class="geetings">
                                                <h1>Forgot Password</h1>
                                            </div>
                                            <h2>Enter the email you used when you joined and we'll send you temporary
                                                password.</h2>
                                            <form id="forgot-password-form" action="#" method="post">

                                                <div id="password-reset-success" class="alert alert-success"
                                                    style="display:none"></div>
                                                <div id="forgot-password-error" class="alert alert-danger"
                                                    style="display:none"></div>
                                                <div class="form-group">
                                                    <label for="username">Email</label>
                                                    <input type="email" class="form-control" required="" id="email"
                                                        name="email" placeholder="Enter your email">
                                                </div>
                                                <div class="submit-wrapper">
                                                    <a id="send-password-reset-link" href="javascript:void(0)"
                                                        class="btn btn-primary">Reset Email</a>
                                                </div>
                                            </form>
                                            <div class="new-account">
                                                <p>I remembered my password.</p><a href="javascript:void(0)"
                                                    class="btn-flip-back">Go back</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endguest
    <!-- Scripts -->
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
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <script src="{{ asset('frontend/js/typed.js') }}"></script>
    <script src="{{ asset('frontend/js/custom.js') }}"></script>

    <!-- Production -->
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://unpkg.com/tippy.js@6"></script>

    @yield('extra-js')
    <script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $("#login").on('click', function(e) {
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
                    window.location.reload();
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

    $("#register").on('click', function(e) {
        e.preventDefault();

        var postData = {
            name: $("form#register-form").find('input[name="name"]').val(),
            email: $("form#register-form").find('input[name="email"]').val(),
            phone_no: $("form#register-form").find('input[name="phone_no"]').val(),
            password: $("form#register-form").find('input[name="password"]').val(),
            password_confirmation: $("form#register-form").find('input[name="password_confirmation"]').val()
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

    $("#send-password-reset-link").on('click', function(e) {
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

    $("#update-password").on('click', function(e) {
        e.preventDefault();
        var postData = {
            email: $("form#password-update-form").find('input[name="email"]').val(),
            password: $("form#password-update-form").find('input[name="password"]').val(),
            password_confirmation: $("form#password-update-form").find(
                'input[name="password_confirmation"]').val(),
            token: $("form#password-update-form").find('input[name="token"]').val(),

        };
        $('.loader').show();
        $('#update-password-error.alert-danger').html('');
        $('#update-password-error.alert-danger').hide();
        $('#update-password-success').html('')
        $('#update-password-success').hide()

        $.ajax({
            type: "POST",
            url: "{{ route('password.update') }}",
            data: postData,
            dataType: 'JSON',
            success: function(response) {

                //$('#update-password-success').show()
                //$('#update-password-success').html(response.message)
                window.location.href = "{{ route('user.profile') }}";
                $('.loader').hide();
            },
            error: function(request, status, error) {
                $('.loader').hide();
                var json = $.parseJSON(request.responseText);
                $.each(json.errors, function(key, value) {
                    $('#update-password-error.alert-danger').show();
                    $('#update-password-error.alert-danger').append('<p>' + value + '</p>');
                });
            }
        });
    });

    $("#logout").on('click', function(e) {
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

    $("form[name='report-bug']").on('submit', function(e) {
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

    $("form[name='professional']").on('submit', function(e) {
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


    $("form[name='subscription-form']").on('submit', function(e) {
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
    @if(is_null(auth() - > user() - > type))
    $('#appropriate-occupation').modal('show');
    @endif
    @endauth
    </script>
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-639bf6a58e4ac7a5"></script>
</body>

</html>