@extends('frontend.app')

@section('meta')

    <meta name="title" content="Settings | Saralmind.com"/>
    <meta name="description" content="User Settings for Saralmind.com"/>
    <meta name="keywords" content="Nepal online education portal, Nepal education, nepal curriculum, Saralmind"/>
    <title>{{$user->name}} | {{$user->type}} | SARALMIND</title>
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


                <div class="card border-0 rounded shadow">
                    <div class="card-body">
                        <h5 class="text-md-left">Personal Detail :</h5>
                        <form id="form" method="POST" action="{{ route('user.setting') }}" class="form-horizontal" enctype="multipart/form-data">

                        @csrf
                        <div class="profile-wrapper avatar-upload">
                            <div class="avatar-edit">
                                <input type='file' name="file" id="imageUpload" accept=".png, .jpg, .jpeg" />
                                <label for="imageUpload"></label>
                                <input type="hidden" name="image" value="{{ old('image',$user->image) }}" >
                            </div>
                            <div class="avatar-preview">
                                <div id="imagePreview">
                                </div>
                            </div>
                        </div>



                            <div class="row mt-4">
                                <div class="col-md-6">
                                    <div class="form-group position-relative">
                                        <label>Full Name</label>
                                        <i data-feather="user" class="icon-sm icons"></i>
                                        <input name="name" id="name" type="text" class="form-control pl-5" placeholder="Full Name :" value="{{ old('name',$user->name) }}">
                                        @if ($errors->has('name'))
                                          <span class="text-red" role="alert">
                                              <strong>{{ $errors->first('name') }}</strong>
                                          </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group position-relative">
                                        <label>Username *</label>
                                        <i data-feather="user" class="icon-sm icons"></i>
                                        <input name="username" id="username" type="text" class="form-control pl-5" placeholder="Username :" value="{{ old('username',$user->username) }}">
                                        @if ($errors->has('username'))
                                          <span class="text-red" role="alert">
                                              <strong>{{ $errors->first('username') }}</strong>
                                          </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group position-relative">
                                        <label>Your Email</label>
                                        <i data-feather="mail" class="icon-sm icons"></i>
                                        <input name="email" id="email" type="email" class="form-control pl-5" placeholder="Your email :" value="{{ old('email',$user->email) }}">
                                        @if ($errors->has('email'))
                                          <span class="text-red" role="alert">
                                              <strong>{{ $errors->first('email') }}</strong>
                                          </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group position-relative">
                                        <label>Profession</label>
                                        <i data-feather="bookmark" class="icon-sm icons"></i>
                                        <select class="form-control select2" name="profession" id="profession">
                                            <option value="Student" @if(old('type',$user->type)==='Student') selected @endif>Student</option>
                                            <option value="Teacher" @if(old('type',$user->type)==='Teacher') selected @endif>Teacher</option>
                                        </select>
                                        @if ($errors->has('type'))
                                          <span class="text-red" role="alert">
                                              <strong>{{ $errors->first('type') }}</strong>
                                          </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group position-relative">
                                        <label>Date of Birth. :</label>
                                        <i data-feather="gift" class="icon-sm icons"></i>
                                        <input name="dob" id="dob" type="date" class="form-control pl-5" placeholder="Date of Birth :" value="{{ old('dob',$user->dob) }}">
                                        @if ($errors->has('dob'))
                                          <span class="text-red" role="alert">
                                              <strong>{{ $errors->first('dob') }}</strong>
                                          </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group position-relative">
                                        <label>Phone No. :</label>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone fea icon-sm icons"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                                        <input name="phone_no" id="number" type="number" class="form-control pl-5" placeholder="Phone :" value="{{ old('phone_no',$user->phone_no) }}">
                                        @if ($errors->has('phone_no'))
                                          <span class="text-red" role="alert">
                                              <strong>{{ $errors->first('phone_no') }}</strong>
                                          </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group position-relative">
                                        <label>Address :</label>
                                        <i data-feather="map-pin" class="icon-sm icons"></i>
                                        <input name="address" id="address" type="text" class="form-control pl-5" placeholder="Address :" value="{{ old('address',$user->address) }}">
                                        @if ($errors->has('address'))
                                          <span class="text-red" role="alert">
                                              <strong>{{ $errors->first('address') }}</strong>
                                          </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group position-relative">
                                        <label>School Name :</label>
                                        <i data-feather="map-pin" class="icon-sm icons"></i>
                                        <input name="school_name" id="school_name" type="text" class="form-control pl-5" placeholder="School Name :" value="{{ old('school_name',$user->school_name) }}">
                                        @if ($errors->has('school_name'))
                                            <span class="text-red" role="alert">
                                              <strong>{{ $errors->first('school_name') }}</strong>
                                          </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-12" id="classes-associated-form-group">
                                    <div class="form-group position-relative associated_classes-wrapper">
                                        <label>Classes Associated :</label>
                                        <i data-feather="home" class="icon-sm icons"></i>
                                        <select class="form-control select2" multiple="multiple" name="grades[]" id="classes">
                                        @foreach($grades as $grade)
                                            <option value="{{ $grade->id }}" @if(in_array($grade->id, old('grades',$user->grades->pluck('id')->toArray()))) selected @endif>{{ $grade->name }}</option>
                                        @endforeach
                                        </select>
                                        @if ($errors->has('grades'))
                                          <span class="text-red" role="alert">
                                              <strong>{{ $errors->first('grades') }}</strong>
                                          </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-12" id="subjects-associated-form-group">
                                    <div class="form-group position-relative associated_classes-wrapper">
                                        <label>Subjects Associated :</label>
                                        <i data-feather="home" class="icon-sm icons"></i>
                                        <select class="form-control select2" multiple="multiple" name="subjects[]" id="subjects">
                                        @foreach($grades as $grade)
                                          <optgroup label="{{ $grade->name }}">
                                            @foreach($grade->subjects as $subject)
                                            <option value="{{ $subject->id}}" @if(in_array($subject->id, old('subjects',$user->subjects->pluck('id')->toArray()))) selected @endif>{!! $subject->name !!}</option>
                                            @endforeach
                                          </optgroup>

                                        @endforeach
                                        </select>
                                        @if ($errors->has('subjects'))
                                          <span class="text-red" role="alert">
                                              <strong>{{ $errors->first('subjects') }}</strong>
                                          </span>
                                        @endif
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <input type="submit" id="submit" name="send" class="btn btn-primary" value="Save Changes">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('extra-js')
<script type="text/javascript">
    var url  = "{{ asset(config('uploads.directory')['user'].'/'.old('image',$user->image)) }}";

    $('#imagePreview').css('background-image', 'url('+url+')' );

    $("#classes-associated-form-group").css("display","none");
    $("#subjects-associated-form-group").css("display","none");

    refresh();

    function refresh()
    {
        $("#classes-associated-form-group").css("display","none");
        $("#subjects-associated-form-group").css("display","none");

        var profession = $('#profession :selected').val();
        if (profession == 'Student') {
            $("#classes-associated-form-group").css("display","block");
        }else if (profession == 'Teacher') {
            $("#subjects-associated-form-group").css("display","block");
        }
    }

    $("#profession").on('change',function(e){
        e.preventDefault()
        refresh();
    })
</script>
@endsection
