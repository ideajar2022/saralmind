@extends('backend.app')

@section('content')
 <div class="content-wrapper">
<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{ $title }}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{route('note.index')}}">Notes</a></li>
              <li class="breadcrumb-item active">Add</li>
            </ol>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content note-wrapper">
      <form id="form" method="POST" action="{{ route('note.store') }}" enctype="multipart/form-data" class="form-horizontal">
        @csrf
        @include('backend.note.form')
        <div class="container-fluid offbtn-pos">
          <div class="row">
            <div class="col-12">
              <div class="text-left">
                <button type="submit" class="btn btn-success">Create</button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </section>
  </div>
     
  <!-- /.content-wrapper -->
@endsection
@section('extra-js')

<script type="text/javascript">
  if($("select[name='program_id']").val() != null){

    $("select[name='program_id']").trigger('change',
      [
        "{{ old('faculty_id',$note->faculty_id) }}",
        "{{ old('grade_id',$note->grade_id) }}",
        "{{ old('subject_id',$note->subject_id) }}",
        "{{ old('unit_id',$note->unit_id) }}",
        "{{ old('lesson_id',$note->lesson_id) }}",
      ]
    )

  }

  // var url  = "{{ asset(config('uploads.directory')['note'].'/'.old('image',$note->image)) }}";

  //  $('.uploadpreview.01').css('background-image', 'url('+url+')' );
 
</script>

@endsection