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
                <option value="{{ $key }}" @if(old('program_id',@$noteVideo->note->program_id)==$key) selected @endif>{{ $program }}</option>
                @endforeach
              </select>
              @if ($errors->has('program_id'))
                  <span class="text-red" role="alert">
                     <strong>{{ $errors->first('program_id') }}</strong>
                  </span>
              @endif
            </div>

            <div class="form-group col-md-6">
              <label for="inputClass {{ $errors->has('faculty_id')? 'has-danger': '' }}">Faculty<span class="help-block" style="color: #b30000">&nbsp;* </span></label>
              <select class="form-control select2" name="faculty_id">
                <option selected value="">Select Faculty</option>
               
              </select>
              @if ($errors->has('faculty_id'))
                  <span class="text-red" role="alert">
                     <strong>{{ $errors->first('faculty_id') }}</strong>
                  </span>
              @endif
            </div>

            <div class="form-group col-md-6">
              <label for="inputClass {{ $errors->has('grade_id')? 'has-danger': '' }}">Class<span class="help-block" style="color: #b30000">&nbsp;* </span></label>
              <select class="form-control select2" name="grade_id">
                <option selected value="">Select Class</option>
               
              </select>
              @if ($errors->has('grade_id'))
                  <span class="text-red" role="alert">
                     <strong>{{ $errors->first('grade_id') }}</strong>
                  </span>
              @endif
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputSubject {{ $errors->has('subject_id')? 'has-danger': '' }}">Subject<span class="help-block" style="color: #b30000">&nbsp;* </span></label>
              <select class="form-control select2" name="subject_id">
                <option selected value="">Select Subject</option>
               
              </select>
              @if ($errors->has('subject_id'))
                  <span class="text-red" role="alert">
                     <strong>{{ $errors->first('subject_id') }}</strong>
                  </span>
              @endif
            </div>
            <div class="form-group col-md-6">
              <label for="inputUnit {{ $errors->has('unit_id')? 'has-danger': '' }}">Unit</label>
              <select class="form-control select2" name="unit_id">
                <option selected value="">Select Unit</option>
               
              </select>
              @if ($errors->has('unit_id'))
                  <span class="text-red" role="alert">
                     <strong>{{ $errors->first('unit_id') }}</strong>
                  </span>
              @endif
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputLesson {{ $errors->has('lesson_id')? 'has-danger': '' }}">Lesson<span class="help-block" style="color: #b30000">&nbsp;* </span></label>
              <select class="form-control select2" name="lesson_id">
                <option selected value="">Select Lesson</option>
               
              </select>
              @if ($errors->has('lesson_id'))
                  <span class="text-red" role="alert">
                     <strong>{{ $errors->first('lesson_id') }}</strong>
                  </span>
              @endif
            </div>

            <div class="form-group col-md-6">
              <label for="inputNote {{ $errors->has('note_id')? 'has-danger': '' }}">Note<span class="help-block" style="color: #b30000">&nbsp;* </span></label>
              <select class="form-control select2" name="note_id">
                <option selected value="">Select Note</option>
               
              </select>
              @if ($errors->has('note_id'))
                  <span class="text-red" role="alert">
                     <strong>{{ $errors->first('note_id') }}</strong>
                  </span>
              @endif
            </div>
          </div>

           <div class="form-group {{ $errors->has('url')? 'has-danger': '' }}">
            <label for="url">URL
              <span class="help-block" style="color: #b30000">&nbsp;* </span></label>
              <input type="text" name="url" value="{{ old('url',$noteVideo->url) }}" placeholder="URL" class="form-control">
              @if ($errors->has('url'))
                  <span class="text-red" role="alert">
                      <strong>{{ $errors->first('url') }}</strong>
                  </span>
              @endif
          </div>

          <div class="form-group {{ $errors->has('key')? 'has-danger': '' }}">
            <label for="key">Video ID
              <span class="help-block" style="color: #b30000">&nbsp;* </span></label>
              <input type="text" name="key" value="{{ old('key',$noteVideo->key) }}" placeholder="Video ID" class="form-control" readonly="">
              @if ($errors->has('key'))
                  <span class="text-red" role="alert">
                      <strong>{{ $errors->first('key') }}</strong>
                  </span>
              @endif
          </div>

           <div class="form-group {{ $errors->has('title')? 'has-danger': '' }}">
            <label for="title">Title
              <span class="help-block" style="color: #b30000">&nbsp;* </span></label>
              <input type="text" name="title" value="{{ old('title',$noteVideo->title) }}" placeholder="Title" class="form-control">
              @if ($errors->has('title'))
                  <span class="text-red" role="alert">
                      <strong>{{ $errors->first('title') }}</strong>
                  </span>
              @endif
          </div>
  
          <div class="form-group {{ $errors->has('description')? 'has-danger': '' }}">
            <label for="description" class="control-label">Description</label>
              <textarea name="description" placeholder="Description" class="form-control simpleEditor" rows="4">{{ old('description',$noteVideo->description) }}</textarea>
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
              <option value="APPROVED" @if(old('status',$noteVideo->status)==='APPROVED') selected @endif>APPROVED</option>
              <option value="UNAPPROVED" @if(old('status',$noteVideo->status)==='UNAPPROVED') selected @endif>  UNAPPROVED
              </option>
              <option value="DISAPPROVED" @if(old('status',$noteVideo->status)==='DISAPPROVED') selected @endif>DISAPPROVED</option>
            </select>
            @if ($errors->has('status'))
                <span class="text-red" role="alert">
                   <strong>{{ $errors->first('status') }}</strong>
                </span>
            @endif
          </div>

     