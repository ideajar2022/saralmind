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
                <option value="{{ $key }}" @if(old('program_id',$unit->program_id)==$key) selected @endif>{{ $program }}</option>
                @endforeach
              </select>
              @if ($errors->has('program_id'))
                  <span class="text-red" role="alert">
                     <strong>{{ $errors->first('program_id') }}</strong>
                  </span>
              @endif
            </div>

            <div class="form-group col-md-6">
              <label for="inputClass {{ $errors->has('class_id')? 'has-danger': '' }}">Grade<span class="help-block" style="color: #b30000">&nbsp;* </span></label>
              <select class="form-control select2" name="class_id">
                <option selected value="">Select Grade</option>
               
              </select>
              @if ($errors->has('class_id'))
                  <span class="text-red" role="alert">
                     <strong>{{ $errors->first('class_id') }}</strong>
                  </span>
              @endif
            </div>
          </div>
          <div class="form-group">
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

          <div class="form-group {{ $errors->has('name')? 'has-danger': '' }}">
            <label for="name">Name
              <span class="help-block" style="color: #b30000">&nbsp;* </span></label>
              <input type="text" name="name" value="{{ old('name',$unit->name) }}" placeholder="Name" class="form-control">
              @if ($errors->has('name'))
                  <span class="text-red" role="alert">
                      <strong>{{ $errors->first('name') }}</strong>
                  </span>
              @endif
          </div>
          <div class="form-group {{ $errors->has('slug')? 'has-danger': '' }}">
            <label for="title">Slug
              <span class="help-block" style="color: #b30000">&nbsp;* </span></label>
              <input type="text" name="slug" value="{{ old('slug',$unit->slug) }}" placeholder="Slug" class="form-control">
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
              <input type="hidden" name="image" value="{{ old('image',$unit->image) }}" >
            
              @if ($errors->has('image'))
                <span class="help-block">
                  <strong>{{ $errors->first('image') }}</strong>
                </span>
              @endif
            </div>
          </div>
           
          <div class="form-group {{ $errors->has('description')? 'has-danger': '' }}">
            <label for="description" class="control-label">Description</label>
              <textarea name="description" placeholder="Description" class="form-control simpleEditor" rows="4">{{ old('description',$unit->description) }}</textarea>
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
              <option value="APPROVED" @if(old('status',$unit->status)==='APPROVED') selected @endif>APPROVED</option>
              <option value="UNAPPROVED" @if(old('status',$unit->status)==='UNAPPROVED') selected @endif>  UNAPPROVED
              </option>
              <option value="DISAPPROVED" @if(old('status',$unit->status)==='DISAPPROVED') selected @endif>DISAPPROVED</option>
            </select>
            @if ($errors->has('status'))
                <span class="text-red" role="alert">
                   <strong>{{ $errors->first('status') }}</strong>
                </span>
            @endif
          </div>

          <div class="form-group {{ $errors->has('meta_keyword')? 'has-danger': '' }}">
            <label for="meta_keyword" class="control-label">Meta Keyword</label>
              <textarea name="meta_keyword" placeholder="Meta Keyword" class="form-control simpleEditor" rows="4">{{ old('meta_keyword',$unit->meta_keyword) }}</textarea>
              @if ($errors->has('meta_keyword'))
                  <span class="text-red" role="alert">
                     <strong>{{ $errors->first('meta_keyword') }}</strong>
                  </span>
              @endif
            </div>
            <div class="form-group {{ $errors->has('meta_title')? 'has-danger': '' }}">
            <label for="meta_title" class="control-label">Meta Title</label>
              <textarea name="meta_title" placeholder="Meta Title" class="form-control simpleEditor" rows="4">{{ old('meta_title',$unit->meta_title) }}</textarea>
              @if ($errors->has('meta_title'))
                  <span class="text-red" role="alert">
                     <strong>{{ $errors->first('meta_title') }}</strong>
                  </span>
              @endif
            </div>
            <div class="form-group {{ $errors->has('meta_description')? 'has-danger': '' }}">
            <label for="meta_description" class="control-label">Meta Description</label>
              <textarea name="meta_description" placeholder="Meta Description" class="form-control simpleEditor" rows="4">{{ old('meta_description',$unit->meta_description) }}</textarea>
              @if ($errors->has('meta_description'))
                  <span class="text-red" role="alert">
                     <strong>{{ $errors->first('meta_description') }}</strong>
                  </span>
              @endif
            </div>
