@extends('frontend.app')

@section('content')
        <!-- <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
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

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
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
        </div> -->
        <div class="modal-dialog modal-dialog-centered modal-lg register-form-wrapper">
            <div class="modal-content">
                <div class="modal-header py-3 border-0">
                </div>
                <div class="modal-body p-0 col-sm-9 col-12 mx-auto">
                    <h5 class="modal-title" id="staticBackdropLabel">
                        <a class="logo" href="">
                            <span class="text-primary">LOGIN</span>
                        </a>
                    </h5>
                    <form method="post" action="#" id="login-form">
                        <label for="email">Email</label>
                        <input type="email" placeholder="Email" name="email" class="input" />
                        <label for="password">Password</label>
                        <div class="password-field-wrapper position-relative">
                            <input id="password-field" type="password" name="password" placeholder="Password" class="" />
                            <div class="position-absolute" id="eyeBtn" onclick="changeTypeLogin()">
                                <i class="fas fa-eye" id="eye"></i>
                            </div>
                        </div>
                        <input type="hidden" name="page" value="nnc">
                        <div class="d-flex align-items-center justify-content-between check-box">
                            <div class=" d-flex align-items-centercheck">
                                <input type="checkbox" value="" id="">
                                <p>Remember Me</p>
                            </div>
                            <a href="">Forgot Password</a>
                        </div>
                        <button class="bg-primary text-white w-100 border-0" id="login">Login</button>
                    </form>
                    <div class="row google-facebook">
                        <a href="{{ url('/login/google') }}"class="col-sm-6 col-12 border-0 bg-transparent">
                            <img src="{{asset('frontend/img/new-img/google.png')}}" alt="">
                            Login with google
                        </a>
                        <a href="{{ url('/login/google') }}" class="col-sm-6 col-12 border-0 bg-transparent">
                            <img src="{{asset('frontend/img/new-img/facebook.png')}}" alt="">
                            Login with facebook
                        </a>
                    </div>
                </div>
            </div>
        </div>
@endsection
