<div class="row">
    <div class="col-md-12">
      <div class="card card-primary">
        <div class="card-body">
            <div class="form-group {{ $errors->has('name')? 'has-danger': '' }}">
              <label for="name">Name
                <span class="help-block" style="color: #b30000">&nbsp;* </span></label>
                <input type="text" name="name" value="{{ old('name',$role->name)  }}" placeholder="Name" class="form-control">
                @if ($errors->has('name'))
                    <span class="text-red" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group {{ $errors->has('slug')? 'has-danger': '' }}">
              <label for="title">Slug
                <span class="help-block" style="color: #b30000">&nbsp;* </span></label>
                <input type="text" name="slug" value="{{ old('slug',$role->slug) }}" placeholder="Slug" class="form-control">
                @if ($errors->has('slug'))
                    <span class="text-red" role="alert">
                        <strong>{{ $errors->first('slug') }}</strong>
                    </span>
                @endif
            </div>
             <div class="card">
              <div class="card-header">
                <h3 class="card-title">Access Control List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div id="accordion" class="access-control-wrapper">
                  <!-- we are adding the .class so bootstrap.js collapse plugin detects it -->
                  <div class="row">

                  
                  @foreach($modules as $key=>$module)
                  <div class="col-md-4">
                  <div class="card card-primary">
                    <div class="card-header">
                      <h4 class="card-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{$module->slug}}">
                          {{ $module->name }}
                        </a>
                      </h4>
                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$module->slug}}" ><i data-feather="chevron-down"></i></button>
                      </div>
                    </div>
                    <div id="collapse{{$module->slug}}" class="panel-collapse collapse in">
                      <div class="card-body">
                        <div class="row">
                          @foreach($module->permissions->pluck('name','id') as $key=>$permission)
                          <div class="col-md-6">
                            <div class="icheck-primary">
                              <input type="checkbox" name="permissions[]" value="{{ $key }}" id="permissionCheck{{$key}}" {{ (in_array($key, old('permissions',$role->permissions->pluck('id')->toArray())) ) ? 'checked' : '' }} />
                              <label for="permissionCheck{{$key}}"> {{ $permission }}</label>
                            </div>
                          </div>
                          @endforeach
                        </div>
                      </div>
                    </div>
                  </div>
                  </div>
                @endforeach
                </div>
                </div>
              </div>
            </div>
      
