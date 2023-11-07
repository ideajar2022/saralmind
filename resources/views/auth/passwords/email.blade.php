@extends('frontend.app')
@section('title', 'Forgot Password')
@section('content')
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->


<!-- <div class="wrapper page_login-wrapper" style="background-image: url({{asset('frontend/img/banner_1.jpg')}})"> -->
<div class="wrapper page_login-wrapper">
    <div class="container login-container">
        <div class="row">
            <div class="col-lg-5 offset-lg-8 col-md-4 offset-md-8">
                <div class="inner-wrapper">
                    <div class="forgot_password-wrapper" id="forgot_password">
                        <div class="logo-wrapper">
                            <a href="#">
                                <img class="img-fluid" src="http://saralmind.test/frontend/img/saralmind-logo.png" alt="">
                            </a>
                        </div>
                        <div class="form-wrapper">
                            <div class="geetings">
                                <h1>Forgot Password</h1>
                            </div>
                            <h2>Enter the email you used when you joined and we'll send you temporary password.</h2>
                            <form id="forgot-password-form" action="#" method="post">
                                
                                    <div id="password-reset-success" class="alert alert-success" style="display:none"></div>
                                <div id="forgot-password-error" class="alert alert-danger" style="display:none"></div>
                                <div class="form-group">
                                    <label for="username">Email</label>
                                    <input type="email" class="form-control" required="" id="email" name="email" placeholder="Enter your email">
                                </div>
                                <div class="submit-wrapper">						  
                                    <a id="send-password-reset-link" href="javascript:void(0)" class="btn btn-primary">Reset Email</a>
                                </div>
                            </form>
                            <div class="new-account">
                                <p>I remembered my password.</p><a href="{{url('/login')}}" class="btn-flip-back">Go back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
