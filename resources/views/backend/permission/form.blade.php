<div class="row">
    <div class="col-md-12">
      <div class="card card-primary">
        <div class="card-body">
            <div class="form-group {{ $errors->has('name')? 'has-danger': '' }}">
              <label for="name">Name
                <span class="help-block" style="color: #b30000">&nbsp;* </span></label>
                <input type="text" name="name" value="{{ old('name',$permission->name) }}" placeholder="Name" class="form-control">
                @if ($errors->has('name'))
                    <span class="text-red" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group {{ $errors->has('slug')? 'has-danger': '' }}">
              <label for="title">Slug
                <span class="help-block" style="color: #b30000">&nbsp;* </span></label>
                <input type="text" name="slug" value="{{ old('slug',$permission->slug) }}" placeholder="Slug" class="form-control">
                @if ($errors->has('slug'))
                    <span class="text-red" role="alert">
                        <strong>{{ $errors->first('slug') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="inputModule {{ $errors->has('module_id')? 'has-danger': '' }}">Module<span class="help-block" style="color: #b30000">&nbsp;* </span></label>
                <select class="form-control select2" name="module_id">
                  <option selected disabled value="">Select Module</option>
                  @foreach($modules as $key=>$module)
                    <option value="{{ $key }}" @if(old('module_id',$permission->module_id)==$key) selected @endif>{{ $module }}</option>
                  @endforeach
                </select>
                @if ($errors->has('module_id'))
                    <span class="text-red" role="alert">
                       <strong>{{ $errors->first('module_id') }}</strong>
                    </span>
                @endif
                </div>
    


