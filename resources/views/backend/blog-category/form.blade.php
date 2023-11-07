<div class="row">
    <div class="col-md-12">
      <div class="card card-primary">
        <div class="card-body">
            <div class="form-group {{ $errors->has('name')? 'has-danger': '' }}">
              <label for="name">Name
                <span class="help-block" style="color: #b30000">&nbsp;* </span></label>
                <input type="text" name="name" value="{{ old('name',$blogCategory->name) }}" placeholder="Name" class="form-control">
                @if ($errors->has('name'))
                    <span class="text-red" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group {{ $errors->has('slug')? 'has-danger': '' }}">
              <label for="title">Slug
                <span class="help-block" style="color: #b30000">&nbsp;* </span></label>
                <input type="text" name="slug" value="{{ old('slug',$blogCategory->slug) }}" placeholder="Slug" class="form-control">
                @if ($errors->has('slug'))
                    <span class="text-red" role="alert">
                        <strong>{{ $errors->first('slug') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group col-md-6">
              <label for="inputStatus {{ $errors->has('status')? 'has-danger': '' }}">Status<span class="help-block" style="color: #b30000">&nbsp;* </span></label>
              <select class="form-control select2" name="status">
                <option selected disabled value="">Select</option>
                <option value="APPROVED" @if(old('status',$blogCategory->status)==='APPROVED') selected @endif>APPROVED</option>
                <option value="UNAPPROVED" @if(old('status',$blogCategory->status)==='UNAPPROVED') selected @endif>  UNAPPROVED
                </option>
                <option value="DISAPPROVED" @if(old('status',$blogCategory->status)==='DISAPPROVED') selected @endif>DISAPPROVED</option>
              </select>
              @if ($errors->has('status'))
                  <span class="text-red" role="alert">
                     <strong>{{ $errors->first('status') }}</strong>
                  </span>
              @endif
            </div>
       

