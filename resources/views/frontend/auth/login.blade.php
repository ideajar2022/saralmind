@extends('frontend.app')

@section('content')<!-- Login -->
<div class="modal fade login-wrapper" id="login-popup" tabindex="-1" role="dialog" aria-labelledby="loginLabel" aria-hidden="true">
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
                                            <img class="img-fluid" src="{{asset('frontend/img/saralmind-logo.png')}}" alt="">
                                        </a>
                                    </div>
                                    <div class="form-wrapper">
                                        <div class="geetings">
                                            {{-- <h1>Hello,</h1> --}}
                                            <h1>Welcome to the ??? World</h1>
                                        </div>
                                        <h2>Please log in with your Saralmind ID and password or Register from here</h2>
                                        <form action="#" method="post">
                                            <div class="form-group">
                                                <label for="username">I.D. / Username</label>
                                                <input type="text" class="form-control" required="" id="username" name="username" placeholder="Enter your Username">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Password</label>
                                                <input type="password" name="password" required="" class="form-control" id="exampleInputPassword1" placeholder="Enter your Password">
                                                <a class="forgot-password" href="javascript:void(0)">Forgot password? Click Here</a>
                                            </div>
                                            <div class="submit-wrapper">						  
                                                <a href="javascript:void(0)" target="_blank" class="btn btn-primary">Login</a>
                                            </div>
                                            <div class="optional-login">
                                                <span class="divider-login"><i>or</i></span>
                                                <a href="javascript:void(0)" class="btn btn-primary btn-google" target="_blank"><img src="{{asset('frontend/img/icons/google_icon.png')}}"> Login with Google</a>
                                                <a href="javascript:void(0)" class="btn btn-primary btn-facebook" target="_blank"><img src="{{asset('frontend/img/icons/facebook_icon.svg')}}"> Login with Facebook</a>
                                            </div>
                                        </form>
                                        <div class="new-account">
                                            <p>Don't have an account? </p><a href="javascript:void(0)" class="btn-flip">Click here</a>
                                        </div>
                                    </div>
                                </div>

                                <!-- Register Client -->
                                <div class="flip-wrapper register-wrapper">
                                    <div class="logo-wrapper">
                                        <a href="#">
                                            <img class="img-fluid" src="{{asset('frontend/img/saralmind-logo.png')}}" alt="Primary Logo">
                                        </a>
                                    </div>
                                    <div class="form-wrapper">
                                        <div class="geetings">
                                            <h1>Register to Learn</h1>
                                        </div>
                                        <h2>Please fill up the form to begin learning.</h2>
                                        <form action="#" method="post">
                                            <div class="form-row">
                                                <div class="form-group col-12 col-sm-6">
                                                    <label for="username">First Name</label>
                                                    <input type="text" class="form-control" required="" id="firstname" name="username" placeholder="Enter your first name">
                                                </div>
                                                <div class="form-group col-12 col-sm-6">
                                                    <label for="username">Last Name</label>
                                                    <input type="text" class="form-control" required="" id="lastname" name="username" placeholder="Enter your last name">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="username">Email</label>
                                                <input type="email" class="form-control" required="" id="email" name="username" placeholder="Enter your email">
                                            </div>
                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <input type="password" name="password" required="" class="form-control" id="password" placeholder="Enter your password">
                                            </div>
                                            <div class="form-group">
                                                <label for="password_confirm">Confirm Password</label>
                                                <input type="password" name="password" required="" class="form-control" id="password_confirm" placeholder="Confirm your password">
                                            </div>
                                            <div class="submit-wrapper">						  
                                                <a href="javascript:void(0)" target="_blank" class="btn btn-primary">Register</a>
                                            </div>
                                            <div class="optional-login">
                                                <span class="divider-login"><i>or</i></span>
                                                <a href="javascript:void(0)" class="btn btn-primary btn-google" target="_blank"><img src="{{asset('frontend/img/icons/google_icon.png')}}"> Register with Google</a>
                                                <a href="javascript:void(0)" class="btn btn-primary btn-facebook" target="_blank"><img src="{{asset('frontend/img/icons/facebook_icon.svg')}}"> Register with Facebook</a>
                                            </div>
                                        </form>
                                        <div class="new-account">
                                            <p>Already have an account? </p><a href="javascript:void(0)" class="btn-flip">Click here</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="forgot_password-wrapper" id="forgot_password">
                                    <div class="logo-wrapper">
                                        <a href="#">
                                            <img class="img-fluid" src="{{asset('frontend/img/saralmind-logo.png')}}" alt="">
                                        </a>
                                    </div>
                                    <div class="form-wrapper">
                                        <div class="geetings">
                                            <h1>Forgot Password</h1>
                                        </div>
                                        <h2>Enter the email you used when you joined and we'll send you temporary password.</h2>
                                        <form action="#" method="post">
                                            <div class="form-group">
                                                <label for="username">Email</label>
                                                <input type="email" class="form-control" required="" id="email" name="username" placeholder="Enter your email">
                                            </div>
                                            <div class="submit-wrapper">						  
                                                <a href="javascript:void(0)" target="_blank" class="btn btn-primary">Reset Email</a>
                                            </div>
                                        </form>
                                        <div class="new-account">
                                            <p>I remembered my password.</p><a href="javascript:void(0)" class="btn-flip-back">Go back</a>
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
@endsection

@section('extra-js')
<script type="text/javascript">

  
  
</script>
@endsection