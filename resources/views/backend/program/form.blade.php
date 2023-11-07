<div class="row">
    <div class="col-md-12">
      <div class="card card-primary">
        <div class="card-body">
          <div class="form-group {{ $errors->has('name')? 'has-danger': '' }}">
            <label for="name">Name
              <span class="help-block" style="color: #b30000">&nbsp;* </span></label>
              <input type="text" name="name" value="{{ old('name',$program->name) }}" placeholder="Name" class="form-control">
              @if ($errors->has('name'))
                  <span class="text-red" role="alert">
                      <strong>{{ $errors->first('name') }}</strong>
                  </span>
              @endif
          </div>
          <div class="form-group {{ $errors->has('slug')? 'has-danger': '' }}">
            <label for="title">Slug
              <span class="help-block" style="color: #b30000">&nbsp;* </span></label>
              <input type="text" name="slug" value="{{ old('slug',$program->slug) }}" placeholder="Slug" class="form-control">
              @if ($errors->has('slug'))
                  <span class="text-red" role="alert">
                      <strong>{{ $errors->first('slug') }}</strong>
                  </span>
              @endif
          </div>
          <div class="form-group {{ $errors->has('description')? 'has-danger': '' }}">
            <label for="description" class="control-label">Description</label>
              <textarea name="description" placeholder="Description" class="form-control simpleEditor" rows="4">{{ old('description',$program->description) }}</textarea>
              @if ($errors->has('description'))
                  <span class="text-red" role="alert">
                     <strong>{{ $errors->first('description') }}</strong>
                  </span>
              @endif
            </div>
          <div class="form-group">
            <label for="inputStatus {{ $errors->has('status')? 'has-danger': '' }}">Status<span class="help-block" style="color: #b30000">&nbsp;* </span></label>
            <select class="form-control select2" name="status">
              <option selected disabled value="">Select</option>
              <option value="APPROVED" @if(old('status',$program->status)==='APPROVED') selected @endif>COMPLETED</option>
              <option value="UNAPPROVED" @if(old('status',$program->status)==='UNAPPROVED') selected @endif>  UNAPPROVED
              </option>
              <option value="DISAPPROVED" @if(old('status',$program->status)==='DISAPPROVED') selected @endif>DISAPPROVED</option>
            </select>
            @if ($errors->has('status'))
                <span class="text-red" role="alert">
                   <strong>{{ $errors->first('status') }}</strong>
                </span>
            @endif
            </div>
            <div class="form-group {{ $errors->has('meta_keyword')? 'has-danger': '' }}">
            <label for="meta_keyword" class="control-label">Meta Keyword</label>
              <textarea name="meta_keyword" placeholder="Meta Keyword" class="form-control simpleEditor" rows="4">{{ old('meta_keyword',$program->meta_keyword) }}</textarea>
              @if ($errors->has('meta_keyword'))
                  <span class="text-red" role="alert">
                     <strong>{{ $errors->first('meta_keyword') }}</strong>
                  </span>
              @endif
            </div>
            <div class="form-group {{ $errors->has('meta_title')? 'has-danger': '' }}">
            <label for="meta_title" class="control-label">Meta Title</label>
              <textarea name="meta_title" placeholder="Meta Title" class="form-control simpleEditor" rows="4">{{ old('meta_title',$program->meta_title) }}</textarea>
              @if ($errors->has('meta_title'))
                  <span class="text-red" role="alert">
                     <strong>{{ $errors->first('meta_title') }}</strong>
                  </span>
              @endif
            </div>
            <div class="form-group {{ $errors->has('meta_description')? 'has-danger': '' }}">
            <label for="meta_description" class="control-label">Meta Description</label>
              <textarea name="meta_description" placeholder="Meta Description" class="form-control simpleEditor" rows="4">{{ old('meta_description',$program->meta_description) }}</textarea>
              @if ($errors->has('meta_description'))
                  <span class="text-red" role="alert">
                     <strong>{{ $errors->first('meta_description') }}</strong>
                  </span>
              @endif
            </div>

