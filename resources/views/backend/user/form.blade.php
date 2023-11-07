<div class="row">
    <div class="col-md-12">
      <div class="card card-primary">
        <div class="card-body">
            <div class="form-group {{ $errors->has('name')? 'has-danger': '' }}">
              <label for="name">Name
                <span class="help-block" style="color: #b30000">&nbsp;* </span></label>
                <input type="text" name="name" value="{{ old('name',$user->name)  }}" placeholder="Name" class="form-control">
                @if ($errors->has('name'))
                    <span class="text-red" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-row">
              <div class="form-group col-md-6 {{ $errors->has('email')? 'has-danger': '' }}">
                <label for="title">Email
                  <span class="help-block" style="color: #b30000">&nbsp;* </span></label>
                  <input type="email" name="email" value="{{ old('email',$user->email) }}" placeholder="Email" class="form-control">
                  @if ($errors->has('email'))
                      <span class="text-red" role="alert">
                          <strong>{{ $errors->first('email') }}</strong>
                      </span>
                  @endif
              </div>
               <div class="form-group col-md-6 {{ $errors->has('phone_no')? 'has-danger': '' }}">
                <label for="title">Phone No</label>
                  <input type="text" name="phone_no" value="{{ old('phone_no',$user->phone_no) }}" placeholder="Phone No" class="form-control">
                  @if ($errors->has('phone_no'))
                      <span class="text-red" role="alert">
                          <strong>{{ $errors->first('phone_no') }}</strong>
                      </span>
                  @endif
              </div>
            </div>

            @if(request()->route()->named('front-user.edit'))
            <div class="form-group">
                <div class="icheck-primary">
                  <input type="checkbox" name="update_password_check" id="changePasswordInfo" value="yes" {{ old('update_password_check' ) ? 'checked' : '' }} />
                  <label for="changePasswordInfo">Change Password?</label>
                </div>
            </div>
            <div class="password-wrapper">
                <div class="form-group {{ $errors->has('password')? 'has-danger': '' }}">
                <label for="title">Password
                    <span class="help-block" style="color: #b30000">&nbsp;* </span></label>
                    <input type="password" name="password" value="" placeholder="Password" class="form-control">
                    @if ($errors->has('password'))
                        <span class="text-red" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group {{ $errors->has('password_confirmation')? 'has-danger': '' }}">
                <label for="title">Confirm Password
                    <span class="help-block" style="color: #b30000">&nbsp;* </span></label>
                    <input type="password" name="password_confirmation" value="" placeholder="Confirm Password" class="form-control">
                    @if ($errors->has('password_confirmation'))
                        <span class="text-red" role="alert">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            @else

                <div class="form-group {{ $errors->has('password')? 'has-danger': '' }}">
                <label for="title">Password
                    <span class="help-block" style="color: #b30000">&nbsp;* </span></label>
                    <input type="password" name="password" value="" placeholder="Password" class="form-control">
                    @if ($errors->has('password'))
                        <span class="text-red" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group {{ $errors->has('password_confirmation')? 'has-danger': '' }}">
                <label for="title">Confirm Password
                    <span class="help-block" style="color: #b30000">&nbsp;* </span></label>
                    <input type="password" name="password_confirmation" value="" placeholder="Confirm Password" class="form-control">
                    @if ($errors->has('password_confirmation'))
                        <span class="text-red" role="alert">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                    @endif
                </div>
            @endif

<!--             <div class="form-group">
                <label for="inputStatus {{ $errors->has('account_type')? 'has-danger': '' }}">Account Type<span class="help-block" style="color: #b30000">&nbsp;* </span></label>
                <select class="form-control select2" name="account_type">
                  <option selected disabled value="">Select Account Type</option>
                  <option value="FREE" @if(old('account_type',$user->account_type)==='FREE') selected @endif>FREE</option>
                  <option value="PREMIUM" @if(old('account_type',$user->account_type)==='PREMIUM') selected @endif>  PREMIUM
                  </option>
                </select>
                @if ($errors->has('account_type'))
                    <span class="text-red" role="alert">
                       <strong>{{ $errors->first('account_type') }}</strong>
                    </span>
                @endif
            </div> -->

             <div class="form-group">
                <label for="inputStatus {{ $errors->has('status')? 'has-danger': '' }}">Status<span class="help-block" style="color: #b30000">&nbsp;* </span></label>
                <select class="form-control select2" name="status">
                  <option selected disabled value="">Select Status</option>
                  <option value="Active" @if(old('status',$user->status)==='Active') selected @endif>Active</option>
                  <option value="Inactive" @if(old('status',$user->status)==='Inactive') selected @endif>  Inactive
                  </option>
                </select>
                @if ($errors->has('status'))
                    <span class="text-red" role="alert">
                       <strong>{{ $errors->first('status') }}</strong>
                    </span>
                @endif
            </div>

             <div class="form-group">
                <label for="inputStatus {{ $errors->has('account_type')? 'has-danger': '' }}">Account Type<span class="help-block" style="color: #b30000">&nbsp;* </span></label>
                <select class="form-control select2" name="account_type">
                  <option selected disabled value="">Select account type</option>
                  
                  <option value="FREE" @if(old('account_type',$user->account_type)==='FREE') selected @endif>FREE</option>
                  <option value="PREMIUM" @if(old('account_type',$user->account_type)==='PREMIUM') selected @endif>  PREMIUM
                  </option>
                </select>
                @if ($errors->has('account_type'))
                    <span class="text-red" role="alert">
                       <strong>{{ $errors->first('account_type') }}</strong>
                    </span>
                @endif
            </div>
    
