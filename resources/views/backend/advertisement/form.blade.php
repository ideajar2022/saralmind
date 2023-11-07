
<div class="row">
    <div class="col-md-12">
      <div class="card card-primary">
        <div class="card-body">
          <div class="form-group {{ $errors->has('name')? 'has-danger': '' }}">
            <label for="title">Ad Title
              <span class="help-block" style="color: #b30000">&nbsp;* </span></label>
              <input type="text" name="name" value="{{ old('name',$advertisement->name) }}" placeholder="Name" class="form-control">
              @if ($errors->has('name'))
                  <span class="text-red" role="alert">
                      <strong>{{ $errors->first('name') }}</strong>
                  </span>
              @endif
            
          </div>          

        <div class="form-group {{ $errors->has('client')? 'has-danger': '' }}">
            <label for="inputClass">Client Name<span class="help-block" style="color: #b30000">&nbsp;* </span></label>
            <select class="form-control select2" name="client">
              <option selected disabled value="">Choose Client</option>
              @foreach($clients as $key=>$client)
              <option value="{{ $key }}" @if(old('client',$advertisement->client_id)==$key) selected @endif>{{ $client }}</option>
              @endforeach
            </select>
            @if ($errors->has('client'))
                <span class="text-red" role="alert">
                   <strong>{{ $errors->first('client') }}</strong>
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
              <input type="file" name="image" class="form-control-file hidden" id="icon">
              <label for="icon" class="upload-label"><i data-feather="upload"></i> Upload Icon</label>
              <input type="hidden" name="icon" value="{{ old('image',$advertisement->image) }}" >
            
              @if ($errors->has('image'))
                <span class="text-red" role="alert">
                  <strong>{{ $errors->first('image') }}</strong>
                </span>
              @endif
          </div>
          
          </div>
          <div class="form-group {{ $errors->has('content')? 'has-danger': '' }}">
            <label for="content" class="control-label">Ad Content</label>
              <textarea name="content" placeholder="content" class="form-control simpleEditor" rows="4">{{ old('content',$advertisement->content) }}</textarea>
              @if ($errors->has('content'))
                  <span class="text-red" role="alert">
                    <strong>{{ $errors->first('content') }}</strong>                </span>
              @endif
            </div>
          

         <div class="form-row">
          <div class="form-group col-md-6 {{ $errors->has('link')? 'has-danger': '' }}">
            <label for="link">Link
              <span class="help-block" style="color: #b30000">&nbsp;* </span></label>
              <input type="text" name="link" value="{{ old('link',$advertisement->link) }}" placeholder="Link" class="form-control">
              @if ($errors->has('link'))
                  <span class="text-red" role="alert">
                      <strong>{{ $errors->first('link') }}</strong>
                  </span>
              @endif
          </div>
            <div class="form-group col-md-6">
              <label for="status {{ $errors->has('status')? 'has-danger': '' }}">Status<span class="help-block" style="color: #b30000">&nbsp;* </span></label>
              <select class="form-control select2" name="status">
                <option selected disabled value="">Select</option>
                <option value="ACTIVE" @if(old('status',$advertisement->status)==='Active') selected @endif>ACTIVE</option>
                <option value="INACTIVE" @if(old('status',$advertisement->status)==='Inactive') selected @endif>INACTIVE</option>
              </select>
              @if ($errors->has('status'))
                  <span class="text-red" role="alert">
                     <strong>{{ $errors->first('status') }}</strong>
                  </span>
              @endif
            </div>
          </div>

         

