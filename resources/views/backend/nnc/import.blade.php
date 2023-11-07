@extends('backend.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{ $title }}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">
                <a href="{{ route('admin.dashboard') }}">Home</a>
              </li>
              <li class="breadcrumb-item">
                <a href="{{ route('nnc.index') }}">NNC</a>
              </li>
              <li class="breadcrumb-item active">Import</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                @include('backend.flash.message')
                <h3 class="card-title">Import Options</h3>
                <div class="card-tools">
                  <a href="{{ Request::url().'?'.@$_SERVER['QUERY_STRING'] }}&sample=excel" class="btn btn-info btn-shadow"><i data-feather="download"></i>Download Sample</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form method="POST" action="{{ route('nnc.import') }}" enctype="multipart/form-data" class="form-horizontal">@csrf
                  <div class="container-fluid">
                    <div class="row">
                      <div class="col-md-6">
                      <div class="form-group">
                        <label>Choose Category</label>
                        <select name="category_id" class="form-control select2" style="width: 100%;">
                          <option selected disabled value="">Select</option>
                          @foreach($categories as $key=>$category)
                          <option value="{{ $key }}" @if(old('category_id')==$key) selected @endif>{{ $category }}</option>
                          @endforeach
                        </select>
                        @if ($errors->has('category_id'))
                            <span class="text-red" role="alert">
                              <strong>{{ $errors->first('category_id') }}</strong>
                            </span>
                        @endif
                      </div>
                    </div>

            
                    <div class="col-md-6">
                      <div class="form-group">
                          <div class="icon-upload-wrapper">
                            <label>Choose Excel File</label>
                            <input type="file" name="import_file">
                        
                          @if ($errors->has('import_file'))
                            <span class="help-block">
                              <strong>{{ $errors->first('import_file') }}</strong>
                            </span>
                          @endif
                        </div>
                      </div>
                      </div>
                      <div class="row">
                        <div class="col-12">
                          <div class="text-left mt-3">
                            <button type="submit" class="btn btn-success">Import</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
@section('extra-css')
  <style>
    .icon-upload-wrapper {
      display: block;
      width: 126px;
      background: transparent;
      padding: 0;
      text-align: left;
    }
  </style>
@endsection
@section('extra-js')

<script type="text/javascript">
  
</script>

@endsection