<div class="row">
    <div class="col-md-12">
      <div class="card card-primary">
        <div class="card-body">
            <div class="form-group {{ $errors->has('name')? 'has-danger': '' }}">
              <label for="name">Name
                <span class="help-block" style="color: #b30000">&nbsp;* </span></label>
                <input type="text" name="name" value="{{ old('name',$module->name) }}" placeholder="Name" class="form-control">
                @if ($errors->has('name'))
                    <span class="text-red" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group {{ $errors->has('slug')? 'has-danger': '' }}">
              <label for="title">Slug
                <span class="help-block" style="color: #b30000">&nbsp;* </span></label>
                <input type="text" name="slug" value="{{ old('slug',$module->slug) }}" placeholder="Slug" class="form-control">
                @if ($errors->has('slug'))
                    <span class="text-red" role="alert">
                        <strong>{{ $errors->first('slug') }}</strong>
                    </span>
                @endif
            </div>
       

