@extends('frontend.app')

@section('content')
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Confirm Password') }}</div>

                <div class="card-body">
                    {{ __('Please confirm your password before continuing.') }}

                    <form method="POST" action="{{ route('password.confirm') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Confirm Password') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->

<div class="wrapper page_login-wrapper" style="background-image: url({{asset('frontend/img/banner_1.jpg')}})">
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
                                <h1>Confirm Password</h1>
                            </div>
                            <h2>Cofirm your password providing your password details. Once confirmed, it will be set as your login password for Saralmind.</h2>
                            <form id="forgot-password-form" action="#" method="post">
                                
                                    <div id="password-reset-success" class="alert alert-success" style="display:none"></div>
                                <div id="forgot-password-error" class="alert alert-danger" style="display:none"></div>
                                <div class="form-group">
                                    <label for="username">Password</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                </div>
                                <div class="submit-wrapper">						  
                                    <a id="send-password-reset-link" href="javascript:void(0)" class="btn btn-primary">{{ __('Confirm Password') }}</a>
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
