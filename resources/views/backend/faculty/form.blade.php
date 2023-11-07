<div class="row">
    <div class="col-md-12">
      <div class="card card-primary">
        <div class="card-body">

          <div class="form-group">
            <label for="inputProgram {{ $errors->has('program_id')? 'has-danger': '' }}">Program<span class="help-block" style="color: #b30000">&nbsp;* </span></label>
            <select class="form-control select2" name="program_id">
              <option selected disabled value="">Select Program</option>
              @foreach($programs as $key=>$program)
              <option value="{{ $key }}" @if(old('program_id',$faculty->program_id)==$key) selected @endif>{{ $program }}</option>
              @endforeach
            </select>
            @if ($errors->has('program_id'))
                <span class="text-red" role="alert">
                   <strong>{{ $errors->first('program_id') }}</strong>
                </span>
            @endif
          </div>

          <div class="form-group {{ $errors->has('name')? 'has-danger': '' }}">
            <label for="name">Name
              <span class="help-block" style="color: #b30000">&nbsp;* </span></label>
              <input type="text" name="name" value="{{ old('name',$faculty->name) }}" placeholder="Name" class="form-control">
              @if ($errors->has('name'))
                  <span class="text-red" role="alert">
                      <strong>{{ $errors->first('name') }}</strong>
                  </span>
              @endif
          </div>

          <div class="form-group {{ $errors->has('slug')? 'has-danger': '' }}">
            <label for="title">Slug
              <span class="help-block" style="color: #b30000">&nbsp;* </span></label>
              <input type="text" name="slug" value="{{ old('slug',$faculty->slug) }}" placeholder="Slug" class="form-control">
              @if ($errors->has('slug'))
                  <span class="text-red" role="alert">
                      <strong>{{ $errors->first('slug') }}</strong>
                  </span>
              @endif
          </div>

          <div class="form-group">
            <label for="exampleInputFile">Icon <span class="small"> (200x200)</span></label>
              <div class="icon-upload-wrapper">
              <div class="img-icon-wr">
                <img id="image" width="100px" class="table-team-img" src="">
                <div id="progressBar"></div>
              </div>
              <input type="file" name="file" class="form-control-file hidden" id="icon">
              <label for="icon" class="upload-label"><i data-feather="upload"></i> Upload Icon</label>
              <input type="hidden" name="image" value="{{ old('image',$faculty->image) }}" >
            
              @if ($errors->has('image'))
                <span class="help-block">
                  <strong>{{ $errors->first('image') }}</strong>
                </span>
              @endif
            </div>
          </div>
          
          <div class="form-group {{ $errors->has('description')? 'has-danger': '' }}">
            <label for="description" class="control-label">Description</label>
              <textarea name="description" placeholder="Description" class="form-control simpleEditor" rows="4">{{ old('description',$faculty->description) }}</textarea>
              @if ($errors->has('description'))
                  <span class="text-red" role="alert">
                     <strong>{{ $errors->first('description') }}</strong>
                  </span>
              @endif
            </div>
          
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputStudyPeriod {{ $errors->has('study_period_parent_id')? 'has-danger': '' }}">Course Timeline Parent<span class="help-block" style="color: #b30000">&nbsp;* </span></label>
            <select class="form-control select2" name="study_period_parent_id">
              <option selected disabled value="">Select Course Timeline Parent</option>
              @foreach($courseTimelines as $key=>$courseTimeline)
              <option value="{{ $key }}"  @if(old('study_period_parent_id',$faculty->study_period_parent_id)==$key) selected @endif>{{ $courseTimeline }}</option>
              @endforeach
            </select>
            @if ($errors->has('study_period_parent_id'))
                <span class="text-red" role="alert">
                   <strong>{{ $errors->first('study_period_parent_id') }}</strong>
                </span>
            @endif
          </div>


        </div>
         <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputStatus {{ $errors->has('status')? 'has-danger': '' }}">Status<span class="help-block" style="color: #b30000">&nbsp;* </span></label>
              <select class="form-control select2" name="status">
                <option selected disabled value="">Select</option>
                <option value="APPROVED" @if(old('status',$faculty->status)==='APPROVED') selected @endif>COMPLETED</option>
                <option value="UNAPPROVED" @if(old('status',$faculty->status)==='UNAPPROVED') selected @endif>  UNAPPROVED
                </option>
                <option value="DISAPPROVED" @if(old('status',$faculty->status)==='DISAPPROVED') selected @endif>DISAPPROVED</option>
              </select>
              @if ($errors->has('status'))
                  <span class="text-red" role="alert">
                     <strong>{{ $errors->first('status') }}</strong>
                  </span>
              @endif
            </div>
          </div>
          <div class="form-group {{ $errors->has('meta_keyword')? 'has-danger': '' }}">
            <label for="meta_keyword" class="control-label">Meta Keyword</label>
              <textarea name="meta_keyword" placeholder="Meta Keyword" class="form-control simpleEditor" rows="4">{{ old('meta_keyword',$faculty->meta_keyword) }}</textarea>
              @if ($errors->has('meta_keyword'))
                  <span class="text-red" role="alert">
                     <strong>{{ $errors->first('meta_keyword') }}</strong>
                  </span>
              @endif
            </div>
            <div class="form-group {{ $errors->has('meta_title')? 'has-danger': '' }}">
            <label for="meta_title" class="control-label">Meta Title</label>
              <textarea name="meta_title" placeholder="Meta Title" class="form-control simpleEditor" rows="4">{{ old('meta_title',$faculty->meta_title) }}</textarea>
              @if ($errors->has('meta_title'))
                  <span class="text-red" role="alert">
                     <strong>{{ $errors->first('meta_title') }}</strong>
                  </span>
              @endif
            </div>
            <div class="form-group {{ $errors->has('meta_description')? 'has-danger': '' }}">
            <label for="meta_description" class="control-label">Meta Description</label>
              <textarea name="meta_description" placeholder="Meta Description" class="form-control simpleEditor" rows="4">{{ old('meta_description',$faculty->meta_description) }}</textarea>
              @if ($errors->has('meta_description'))
                  <span class="text-red" role="alert">
                     <strong>{{ $errors->first('meta_description') }}</strong>
                  </span>
              @endif
            </div>
         

