<div class="row">
    <div class="col-md-12">
      <div class="card card-primary">
        <div class="card-body">
      
          <div class="form-group {{ $errors->has('title')? 'has-danger': '' }}">
            <label for="title">Title
              <span class="help-block" style="color: #b30000">&nbsp;* </span></label>
              <input type="text" name="title" value="{{ old('title',$mediaFeed->title) }}" placeholder="Ritle" class="form-control">
              @if ($errors->has('title'))
                  <span class="text-red" role="alert">
                      <strong>{{ $errors->first('title') }}</strong>
                  </span>
              @endif
          </div>
          <div class="form-group {{ $errors->has('media')? 'has-danger': '' }}">
            <label for="title">Media
              <span class="help-block" style="color: #b30000">&nbsp;* </span></label>
              <input type="text" name="media" value="{{ old('media',$mediaFeed->media) }}" placeholder="Media" class="form-control">
              @if ($errors->has('media'))
                  <span class="text-red" role="alert">
                      <strong>{{ $errors->first('media') }}</strong>
                  </span>
              @endif
          </div>
          <div class="form-group {{ $errors->has('url')? 'has-danger': '' }}">
            <label for="title">URL
              <span class="help-block" style="color: #b30000">&nbsp;* </span></label>
              <input type="text" name="url" value="{{ old('url',$mediaFeed->url) }}" placeholder="URL" class="form-control">
              @if ($errors->has('url'))
                  <span class="text-red" role="alert">
                      <strong>{{ $errors->first('url') }}</strong>
                  </span>
              @endif
          </div>
          <div class="form-group {{ $errors->has('published_at')? 'has-danger': '' }}">
            <label for="title">Published At
              <span class="help-block" style="color: #b30000">&nbsp;* </span></label>
              <input type="date" name="published_at" value="{{ old('published_at',$mediaFeed->published_at) }}" placeholder="Published Date" class="form-control">
              @if ($errors->has('published_at'))
                  <span class="text-red" role="alert">
                      <strong>{{ $errors->first('published_at') }}</strong>
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
              <input type="hidden" name="image" value="{{ old('image',$mediaFeed->image) }}" >
            
              @if ($errors->has('image'))
                <span class="help-block">
                  <strong>{{ $errors->first('image') }}</strong>
                </span>
              @endif
            </div>
          </div>
           
          <div class="form-group {{ $errors->has('description')? 'has-danger': '' }}">
            <label for="description" class="control-label">Description</label>
              <textarea name="description" placeholder="Description" class="form-control simpleEditor" rows="4">{{ old('description',$mediaFeed->description) }}</textarea>
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
              <option value="APPROVED" @if(old('status',$mediaFeed->status)==='APPROVED') selected @endif>APPROVED</option>
              <option value="UNAPPROVED" @if(old('status',$mediaFeed->status)==='UNAPPROVED') selected @endif>  UNAPPROVED
              </option>
              <option value="DISAPPROVED" @if(old('status',$mediaFeed->status)==='DISAPPROVED') selected @endif>DISAPPROVED</option>
            </select>
            @if ($errors->has('status'))
                <span class="text-red" role="alert">
                   <strong>{{ $errors->first('status') }}</strong>
                </span>
            @endif
          </div>

