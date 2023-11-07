
<div class="row">
    <div class="col-md-12">
      <div class="card card-primary">
        <div class="card-body">
        	<div class="form-group {{ $errors->has('name')? 'has-danger': '' }}">
            <label for="name">Name
              <span class="help-block" style="color: #b30000">&nbsp;* </span></label>
              <input type="text" name="name" value="{{ old('name',$client->name) }}" placeholder="Name" class="form-control">
              @if ($errors->has('name'))
                  <span class="text-red" role="alert">
                      <strong>{{ $errors->first('name') }}</strong>
                  </span>
              @endif
            </div>          

          
          <div class="form-group {{ $errors->has('description')? 'has-danger': '' }}">
            <label for="description" class="control-label">Client Description</label>
              <textarea name="description" placeholder="description" class="form-control simpleEditor" rows="4">{{ old('description',$client->description) }}</textarea>
              @if ($errors->has('description'))
                  <span class="text-red" role="alert">
                    <strong>{{ $errors->first('description') }}</strong>      </span>
              @endif
            </div>
          
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputStatus {{ $errors->has('status')? 'has-danger': '' }}">Status<span class="help-block" style="color: #b30000">&nbsp;* </span></label>
              <select class="form-control select2" name="status">
                <option selected disabled value="">Select</option>
                <option value="ACTIVE" @if(old('status',$client->status)==='Active') selected @endif>ACTIVE</option>
                <option value="INACTIVE" @if(old('status',$client->status)==='Inactive') selected @endif>INACTIVE</option>
              </select>
              @if ($errors->has('status'))
                  <span class="text-red" role="alert">
                     <strong>{{ $errors->first('status') }}</strong>
                  </span>
              @endif
            </div>
          </div>

         

