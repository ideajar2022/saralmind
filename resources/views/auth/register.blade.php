<head>
    <title>
        Register For Free | Saralmind
    </title>
</head>

@extends('frontend.app')

@section('content')
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->
<div class="modal-dialog modal-dialog-centered modal-lg register-form-wrapper">
            <div class="modal-content">
                <div class="modal-header py-3 border-0">
                </div>
                <div class="modal-body p-0 col-sm-9 col-12 mx-auto">
                    <h5 class="modal-title" id="staticBackdropLabel">
                        <a class="logo" href="">
                            <span class="text-primary">REGISTER NOW</span>
                        </a>
                    </h5>
                    <form method="post" action="#" id="register-form">
                        <label for="username">Full Name</label>
                        <input type="text" placeholder="Full Name" name="name" class="input" />
                        <label for="username">Username</label>
                        <input type="text" placeholder="Username" name="username" class="input" />
                        <label for="exampleInputPassword1">Mobile/Whatsapp:</label>
                        <input type="text" placeholder="+977 - "  class="input" name="phone_no" id="phone">
                        <label for="email">Email</label>
                        <input type="email" placeholder="Email" name="email" class="input" />
                        <label for="">Password</label>
                        <div class="password-field-wrapper position-relative">
                            <input id="myInput" type="password" name="password" placeholder="Password" />
                            <div class="position-absolute" id="eyeBtn" onclick="changeTypeRegister()">
                                <i class="fas fa-eye" id="eyed"></i>
                            </div>
                        </div>
                        <div class="password-field-wrapper position-relative">
                            <input id="myInput" type="password" name="password_confirmation" placeholder="Password" />
                            <div class="position-absolute" id="eyeBtn" onclick="changeTypeRegister()">
                                <i class="fas fa-eye" id="eyed"></i>
                            </div>
                        </div>
                        <div class="d-flex align-items-center check-box">
                            <input type="checkbox" value="" id="">
                            <p>I agree with Terms and Privacy</p>
                        </div>
                        <button id= "register" class="bg-primary text-white w-100 border-0">Register</button>
                    </form>
                    <div class="text-center already-account">
                        <p>Already have an account ?<a href=""> Click Here</a></p>
                    </div>
                    <div class="row google-facebook">
                        <button class="col-sm-6 col-12 border-0 bg-transparent">
                            <img src="{{asset('frontend/img/new-img/google.png')}}" alt="">
                            Register with google
                        </button>
                        <button class="col-sm-6 col-12 border-0 bg-transparent">
                            <img src="{{asset('frontend/img/new-img/facebook.png')}}" alt="">
                            Register with facebook
                        </button>
                    </div>
                </div>
            </div>
        </div>
@endsection
