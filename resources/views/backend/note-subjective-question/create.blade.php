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
                <a href="{{ route('exercise.index') }}">Note Subjective Questions</a>
              </li>
              <li class="breadcrumb-item active">Add</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <form method="POST" action="{{ route('exercise.store') }}" enctype="multipart/form-data" class="form-horizontal">
      <div class="container-fluid">
        @csrf
        @include('backend.note-subjective-question.form')
              
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
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
@section('extra-js')

<script type="text/javascript">
  if($("select[name='program_id']").val() != null){
    $("select[name='program_id']").trigger('change',
      [
      "{{ old('faculty_id',@$subjectiveQuestion->note->faculty_id) }}",
      "{{ old('grade_id',@$subjectiveQuestion->note->grade_id) }}",
      "{{ old('subject_id',@$subjectiveQuestion->note->subject_id) }}",
      "{{ old('unit_id',@$subjectiveQuestion->note->unit_id) }}",
      "{{ old('lesson_id',@$subjectiveQuestion->note->lesson_id) }}",
      "{{ old('note_id',@$subjectiveQuestion->note_id) }}",
      ]
    );
  }
 </script>

@endsection