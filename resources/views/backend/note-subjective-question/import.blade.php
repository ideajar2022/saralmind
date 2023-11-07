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
                <a href="{{ route('exercise.index') }}">Exercises</a>
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
                <form method="POST" action="{{ route('exercise.import') }}" enctype="multipart/form-data" class="form-horizontal">
                  <div class="container-fluid">
                    @csrf
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Choose Program</label>
                          <select name="program_id" class="form-control select2" style="width: 100%;">
                            <option selected disabled value="">Select</option>
                            @foreach($programs as $key=>$program)
                            <option value="{{ $key }}" @if(old('program_id')==$key) selected @endif>{{ $program }}</option>
                            @endforeach
                          </select>
                          @if ($errors->has('program_id'))
                              <span class="text-red" role="alert">
                                <strong>{{ $errors->first('program_id') }}</strong>
                              </span>
                          @endif
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Choose Faculty</label>
                          <select name="faculty_id" class="form-control select2" style="width: 100%;">
                            <option selected value="">Select</option>
                          </select>
                          @if ($errors->has('faculty_id'))
                              <span class="text-red" role="alert">
                                <strong>{{ $errors->first('faculty_id') }}</strong>
                              </span>
                          @endif
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Choose Grade</label>
                          <select name="grade_id" class="form-control select2" style="width: 100%;">
                            <option selected value="">Select</option>
                          </select>
                          @if ($errors->has('grade_id'))
                              <span class="text-red" role="alert">
                                <strong>{{ $errors->first('grade_id') }}</strong>
                              </span>
                          @endif
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Choose Subject</label>
                          <select name="subject_id" class="form-control select2" style="width: 100%;">
                            <option selected value="">Select</option>
                          </select>
                          @if ($errors->has('subject_id'))
                              <span class="text-red" role="alert">
                                <strong>{{ $errors->first('subject_id') }}</strong>
                              </span>
                          @endif
                        </div>
                      </div>
<!--                       <div class="col-md-6">
                        <div class="form-group">
                          <label>Choose Unit</label>
                          <select name="unit_id" class="form-control select2" style="width: 100%;">
                            <option selected value="">Select Unit</option>
                          </select>
                          @if ($errors->has('unit_id'))
                              <span class="text-red" role="alert">
                                <strong>{{ $errors->first('unit_id') }}</strong>
                              </span>
                          @endif
                        </div>
                      </div> -->
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Choose Lesson</label>
                          <select name="lesson_id" class="form-control select2" style="width: 100%;">
                            <option selected value="">Select Lesson</option>
                          </select>
                          @if ($errors->has('lesson_id'))
                              <span class="text-red" role="alert">
                                <strong>{{ $errors->first('lesson_id') }}</strong>
                              </span>
                          @endif
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Choose Note</label>
                          <select name="note_id" class="form-control select2" style="width: 100%;">
                            <option selected value="">Select Note</option>
                          </select>
                          @if ($errors->has('note_id'))
                              <span class="text-red" role="alert">
                                <strong>{{ $errors->first('note_id') }}</strong>
                              </span>
                          @endif
                        </div>
                      </div>
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