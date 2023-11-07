<div class="row">
    <div class="col-md-12">
      <div class="card card-primary">
        <div class="card-body">
      
          <div class="form-group {{ $errors->has('title')? 'has-danger': '' }}">
            <label for="title">Title
              <span class="help-block" style="color: #b30000">&nbsp;* </span></label>
              <input type="text" name="title" value="{{ old('title',$award->title) }}" placeholder="Title" class="form-control">
              @if ($errors->has('title'))
                  <span class="text-red" role="alert">
                      <strong>{{ $errors->first('title') }}</strong>
                  </span>
              @endif
          </div>
           <div class="form-group {{ $errors->has('slug')? 'has-danger': '' }}">
            <label for="slug">Slug
              <span class="help-block" style="color: #b30000">&nbsp;* </span></label>
              <input type="text" name="slug" value="{{ old('slug',$award->slug) }}" placeholder="Slug" class="form-control">
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
              <input type="hidden" name="image" value="{{ old('image',$award->image) }}" >
            
              @if ($errors->has('image'))
                <span class="help-block">
                  <strong>{{ $errors->first('image') }}</strong>
                </span>
              @endif
            </div>
          </div>
           <div class="form-group {{ $errors->has('awarded_at')? 'has-danger': '' }}">
            <label for="awarded_at">Awarded At
              <span class="help-block" style="color: #b30000">&nbsp;* </span></label>
              <input type="date" name="awarded_at" value="{{ old('awarded_at',$award->awarded_at) }}" placeholder="Awarded At" class="form-control">
              @if ($errors->has('awarded_at'))
                  <span class="text-red" role="alert">
                      <strong>{{ $errors->first('awarded_at') }}</strong>
                  </span>
              @endif
          </div>
           
          <div class="form-group {{ $errors->has('description')? 'has-danger': '' }}">
            <label for="description" class="control-label">Description</label>
              <textarea name="description" placeholder="Description" class="form-control simpleEditor" rows="4">{{ old('description',$award->description) }}</textarea>
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
              <option value="APPROVED" @if(old('status',$award->status)==='APPROVED') selected @endif>APPROVED</option>
              <option value="UNAPPROVED" @if(old('status',$award->status)==='UNAPPROVED') selected @endif>  UNAPPROVED
              </option>
              <option value="DISAPPROVED" @if(old('status',$award->status)==='DISAPPROVED') selected @endif>DISAPPROVED</option>
            </select>
            @if ($errors->has('status'))
                <span class="text-red" role="alert">
                   <strong>{{ $errors->first('status') }}</strong>
                </span>
            @endif
          </div>

