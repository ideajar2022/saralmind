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
                <a href="{{ route('video.index') }}">Note Videos</a>
              </li>
              <li class="breadcrumb-item active">Edit</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
       <form method="POST" action="{{ route('video.update',$noteVideo->id) }}" class="form-horizontal" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        @include('backend.note-video.form')
              
        <div class="row">
          <div class="col-12">
            <div class="text-left">
              <button type="submit" class="btn btn-success">Update</button>
            </div>
          </div>
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
    $("select[name='program_id']").trigger('change',
      [
      "{{ old('faculty_id',@$noteVideo->note->faculty_id) }}",
      "{{ old('grade_id',@$noteVideo->note->grade_id) }}",
      "{{ old('subject_id',@$noteVideo->note->subject_id) }}",
      "{{ old('unit_id',@$noteVideo->note->unit_id) }}",
      "{{ old('lesson_id',@$noteVideo->note->lesson_id) }}",
      "{{ old('note_id',@$noteVideo->note_id) }}",
      ]
    );
  }
 
</script>

@endsection