@extends('backend.app')
@section('extra-css')

@endsection
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
                <a href="{{ route('subject.index') }}">subjects</a>
              </li>
              <li class="breadcrumb-item active">Add</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <form id="form" method="POST" id="form" action="{{ route('subject.store') }}" enctype="multipart/form-data" class="form-horizontal">
        <div class="container-fluid">
        @csrf
        @include('backend.subject.form')
              
                          <div class="row">
                            <div class="col-12">
                              <div class="text-left">
                                <button type="submit" class="btn btn-success">Create</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                  </div><!-- /.col -->
              </div><!-- /.row -->
            </div>
          </form>
      </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
@section('extra-js')

<script type="text/javascript">
  if($("select[name='program_id']").val() != null){
    $("select[name='program_id']").trigger('change',"{{ old('grade_id',$subject->grade_id) }}")

  }
  
  if ("{{ old('image',$subject->image) }}") {
    $('img#image').attr("src", "{{ asset(config('uploads.directory')['subject'].'/'.old('image',$subject->image)) }}")
  }
</script>

@endsection