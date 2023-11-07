@extends('frontend.app')

@section('meta')

    <meta name="title" content="Change Password | Saralmind.com"/>
    <meta name="description" content="Change your Saralmind.com Password from here."/>
    <meta name="keywords" content="Nepal online education portal, Nepal education, nepal curriculum, Saralmind"/>
    <title>{{auth()->user()->name}} | {{auth()->user()->type}} | Change Password | SARALMIND</title>
@endsection

@section('content')
<section class="inner-header profile-header"  style="background-image: url({{asset('frontend/img/inner-banner_bg.svg')}}),linear-gradient(359.93deg,#ddeffd -44.48%,#e5f1fb 102.88%);">
</section>

<section class="bg-profile d-table w-100 mb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                      <strong>{{ $message }}</strong>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                </div>
            @endif
                @foreach ($errors->all() as $error)
                    <p class="text-danger">{{ $error }}</p>
                 @endforeach
                <div class="card border-0 rounded shadow">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mt-4 pt-2">
                                <h5>Change password :</h5>
                                <form id="form" method="POST" action="{{ route('user.change-password') }}">

                                @csrf
                                <input type="hidden" name="show_password" value="{{ $show_old_password }}">
                                    <div class="row mt-4">
                                        @if($show_old_password)
                                        <div class="col-lg-12">
                                            <div class="form-group position-relative">
                                                <label>Old password :</label>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-key fea icon-sm icons"><path d="M21 2l-2 2m-7.61 7.61a5.5 5.5 0 1 1-7.778 7.778 5.5 5.5 0 0 1 7.777-7.777zm0 0L15.5 7.5m0 0l3 3L22 7l-3-3m-3.5 3.5L19 4"></path></svg>
                                                <input type="password" name="current_password" class="form-control pl-5" placeholder="Old password" required="">
                                                @if ($errors->has('current_password'))
                                                  <span class="text-red" role="alert">
                                                      <strong>{{ $errors->first('current_password') }}</strong>
                                                  </span>
                                                @endif
                                            </div>
                                        </div>
                                        @endif

                                        <div class="col-lg-12">
                                            <div class="form-group position-relative">
                                                <label>New password :</label>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-key fea icon-sm icons"><path d="M21 2l-2 2m-7.61 7.61a5.5 5.5 0 1 1-7.778 7.778 5.5 5.5 0 0 1 7.777-7.777zm0 0L15.5 7.5m0 0l3 3L22 7l-3-3m-3.5 3.5L19 4"></path></svg>
                                                <input type="password" name="new_password" class="form-control pl-5" placeholder="New password" required="">
                                                @if ($errors->has('new_password'))
                                                  <span class="text-red" role="alert">
                                                      <strong>{{ $errors->first('new_password') }}</strong>
                                                  </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group position-relative">
                                                <label>Re-type New password :</label>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-key fea icon-sm icons"><path d="M21 2l-2 2m-7.61 7.61a5.5 5.5 0 1 1-7.778 7.778 5.5 5.5 0 0 1 7.777-7.777zm0 0L15.5 7.5m0 0l3 3L22 7l-3-3m-3.5 3.5L19 4"></path></svg>
                                                <input type="password" name="new_confirm_password" class="form-control pl-5" placeholder="Re-type New password" required="">
                                                @if ($errors->has('new_confirm_password'))
                                                  <span class="text-red" role="alert">
                                                      <strong>{{ $errors->first('new_confirm_password') }}</strong>
                                                  </span>
                                                @endif
                                            </div>
                                        </div>


                                        <div class="col-lg-12 mt-2 mb-0">
                                            <button class="btn btn-primary">Save password</button>
                                        </div>
                                    </div>
                                </form>
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
