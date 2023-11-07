<div class="row">
    <div class="col-md-12">
      <div class="card card-primary">
        <div class="card-body">
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputProgram {{ $errors->has('program_id')? 'has-danger': '' }}">Program<span class="help-block" style="color: #b30000">&nbsp;* </span></label>
            <select class="form-control select2" name="program_id">
              <option selected disabled value="">Select Program</option>
              @foreach($programs as $key=>$program)
              <option value="{{ $key }}" @if(old('program_id',$subject->program_id)==$key) selected @endif>{{ $program }}</option>
              @endforeach
            </select>
            @if ($errors->has('program_id'))
                <span class="text-red" role="alert">
                   <strong>{{ $errors->first('program_id') }}</strong>
                </span>
            @endif
          </div>


          <div class="form-group col-md-6">
            <label for="inputFaculty {{ $errors->has('faculty_id')? 'has-danger': '' }}">Faculty<span class="help-block" style="color: #b30000">&nbsp;* </span></label>
            <select class="form-control select2" name="faculty_id">
              <option selected value="{{ $key }}" @if(old('faculty_id',$subject->faculty_id)==$key) selected @endif">Select Faculty</option>
            </select>
          </div>

          <div class="form-group col-md-6">
            <label for="inputProgram {{ $errors->has('grade_id')? 'has-danger': '' }}">Grade<span class="help-block" style="color: #b30000">&nbsp;* </span></label>
            <select class="form-control select2" name="grade_id">
              <option selected value="">Select Grade</option>
            </select>
            @if ($errors->has('grade_id'))
                <span class="text-red" role="alert">
                   <strong>{{ $errors->first('grade_id') }}</strong>
                </span>
            @endif
          </div>
          </div>

          <div class="form-group {{ $errors->has('name')? 'has-danger': '' }}">
            <label for="name">Name
              <span class="help-block" style="color: #b30000">&nbsp;* </span></label>
              <input type="text" name="name" value="{{ old('name',$subject->name) }}" placeholder="Name" class="form-control">
              @if ($errors->has('name'))
                  <span class="text-red" role="alert">
                      <strong>{{ $errors->first('name') }}</strong>
                  </span>
              @endif
          </div>
          <div class="form-group {{ $errors->has('slug')? 'has-danger': '' }}">
            <label for="title">Slug
              <span class="help-block" style="color: #b30000">&nbsp;* </span></label>
              <input type="text" name="slug" value="{{ old('slug',$subject->slug) }}" placeholder="Slug" class="form-control">
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
              <input type="hidden" name="image" value="{{ old('image',$subject->image) }}" >
            
              @if ($errors->has('image'))
                <span class="help-block">
                  <strong>{{ $errors->first('image') }}</strong>
                </span>
              @endif
            </div>
          </div>
           
          <div class="form-group {{ $errors->has('description')? 'has-danger': '' }}">
            <label for="description" class="control-label">Description</label>
              <textarea name="description" placeholder="Description" class="form-control simpleEditor" rows="4">{{ old('description',$subject->description) }}</textarea>
              @if ($errors->has('description'))
                  <span class="text-red" role="alert">
                     <strong>{{ $errors->first('description') }}</strong>
                  </span>
              @endif
            </div>
          <div class="form-group">
            <label for="inputStatus {{ $errors->has('status')? 'has-danger': '' }}">Status<span class="help-block" style="color: #b30000">&nbsp;* </span></label>
            <select class="form-control select2" name="status">
              <option selected disabled value="">Select Status</option>
              <option value="APPROVED" @if(old('status',$subject->status)==='APPROVED') selected @endif>COMPLETED</option>
              <option value="UNAPPROVED" @if(old('status',$subject->status)==='UNAPPROVED') selected @endif>  UNAPPROVED
              </option>
              <option value="DISAPPROVED" @if(old('status',$subject->status)==='DISAPPROVED') selected @endif>DISAPPROVED</option>
            </select>
            @if ($errors->has('status'))
                <span class="text-red" role="alert">
                   <strong>{{ $errors->first('status') }}</strong>
                </span>
            @endif
          </div>

         
          <div class="form-group">
            <label for="inputStudyPeriod {{ $errors->has('code')? 'has-danger': '' }}">Code<span class="help-block" style="color: #b30000">&nbsp;* </span></label>
            <input type="text" name="code" value="{{ old('code',$subject->code) }}" placeholder="Code" class="form-control">
            @if ($errors->has('code'))
                <span class="text-red" role="alert">
                   <strong>{{ $errors->first('code') }}</strong>
                </span>
            @endif
            </div>

            <div class="form-group {{ $errors->has('meta_keyword')? 'has-danger': '' }}">
            <label for="meta_keyword" class="control-label">Meta Keyword</label>
              <textarea name="meta_keyword" placeholder="Meta Keyword" class="form-control simpleEditor" rows="4">{{ old('meta_keyword',$subject->meta_keyword) }}</textarea>
              @if ($errors->has('meta_keyword'))
                  <span class="text-red" role="alert">
                     <strong>{{ $errors->first('meta_keyword') }}</strong>
                  </span>
              @endif
            </div>
            <div class="form-group {{ $errors->has('meta_title')? 'has-danger': '' }}">
            <label for="meta_title" class="control-label">Meta Title</label>
              <textarea name="meta_title" placeholder="Meta Title" class="form-control simpleEditor" rows="4">{{ old('meta_title',$subject->meta_title) }}</textarea>
              @if ($errors->has('meta_title'))
                  <span class="text-red" role="alert">
                     <strong>{{ $errors->first('meta_title') }}</strong>
                  </span>
              @endif
            </div>
            <div class="form-group {{ $errors->has('meta_description')? 'has-danger': '' }}">
            <label for="meta_description" class="control-label">Meta Description</label>
              <textarea name="meta_description" placeholder="Meta Description" class="form-control simpleEditor" rows="4">{{ old('meta_description',$subject->meta_description) }}</textarea>
              @if ($errors->has('meta_description'))
                  <span class="text-red" role="alert">
                     <strong>{{ $errors->first('meta_description') }}</strong>
                  </span>
              @endif
            </div>

