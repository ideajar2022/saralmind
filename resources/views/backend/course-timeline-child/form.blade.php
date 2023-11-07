<div class="row">
    <div class="col-md-6">
      <div class="card card-primary">
        <div class="card-body">
            <div class="form-group {{ $errors->has('name')? 'has-danger': '' }}">
              <label for="name">Name
                <span class="help-block" style="color: #b30000">&nbsp;* </span></label>
                <input type="text" name="name" value="{{ old('name',$studyPeriodChild->name) }}" placeholder="Name" class="form-control">
                @if ($errors->has('name'))
                    <span class="text-red" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="inputstudyPeriod {{ $errors->has('study_period_id')? 'has-danger': '' }}">Study Period<span class="help-block" style="color: #b30000">&nbsp;* </span></label>
                <select class="form-control select2" name="study_period_id">
                  <option selected disabled value="">Select</option>
                  @foreach($studyPeriods as $key=>$studyPeriod)
                    <option value="{{ $key }}" @if(old('study_period_id',$studyPeriodChild->study_period_id)==$key) selected @endif>{{ $studyPeriod }}</option>
                  @endforeach
                </select>
                @if ($errors->has('study_period_id'))
                    <span class="text-red" role="alert">
                       <strong>{{ $errors->first('study_period_id') }}</strong>
                    </span>
                @endif
            </div>
             <div class="form-group">
                <label for="inputStatus {{ $errors->has('status')? 'has-danger': '' }}">Status<span class="help-block" style="color: #b30000">&nbsp;* </span></label>
                <select class="form-control select2" name="status">
                  <option selected disabled value="">Select</option>
                  <option value="Active" @if(old('status',$studyPeriodChild->status)==='Active') selected @endif>Active</option>
                  <option value="Inactive" @if(old('status',$studyPeriodChild->status)==='Inactive') selected @endif>  Inactive
                  </option>
                </select>
                @if ($errors->has('status'))
                    <span class="text-red" role="alert">
                       <strong>{{ $errors->first('status') }}</strong>
                    </span>
                @endif
            </div>
        </div>
      </div>
    </div><!-- /.col -->
</div><!-- /.row -->


