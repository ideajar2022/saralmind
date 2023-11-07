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
          <div class="col-sm-6 text-right">
            <a href="{{route('mcq.create')}}" class="badge bg-success top-add-btn"><i class="fa fa-plus" title="Add Note Videos"></i></a>
            <a href="{{route('mcq.trash')}}" class="badge bg-primary top-add-btn"><i class="fa fa-eye" title="View Trashed"></i></a>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      @include('backend.flash.message')
      <div class="container-fluid">
        <div class="note-filter">
          
          <form action="">
            <div class="row">
              <div class="col-md-12">
                <div class="search-bar-wrapper">
                    <div class="input-group input-group-md">
                      <input class="form-control form-control-navbar" type="search" name="q" value="{{ request('q') }}" placeholder="Search" aria-label="Search">
                    </div>
                </div>
              </div>
              <div class="col-md-2 pr-0">
                <div class="form-group">
                  <select name="program_id" class="form-control select2" style="width: 100%;">
                    <option selected value="">Choose Program</option>
                    @foreach($programs as $key=>$program)
                    <option value="{{ $key }}" {{(request( 'program_id' ) == $key )? 'selected': ''}}>{{ $program }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-md-2 pr-0">
                <div class="form-group">
                  <select name="faculty_id" class="form-control select2" style="width: 100%;">
                    <option selected value="">Choose Faculty</option>
                  </select>
                </div>
              </div>
              <div class="col-md-2 pr-0">
                <div class="form-group">
                  <select name="grade_id" class="form-control select2" style="width: 100%;">
                    <option selected value="">Choose Grade</option>
                  </select>
                </div>
              </div>
              <div class="col-md-2 pr-0">
                <div class="form-group">
                  <select name="subject_id" class="form-control select2" style="width: 100%;">
                    <option selected value="">Choose Subject</option>
                  </select>
                </div>
              </div>
              <div class="col-md-2 pr-0">
                <div class="form-group">
                  <select name="unit_id" class="form-control select2" style="width: 100%;">
                    <option selected value="">Choose Unit</option>
                  </select>
                </div>
              </div>
              <div class="col-md-2 pr-0">
                <div class="form-group">
                  <select name="lesson_id" class="form-control select2" style="width: 100%;">
                    <option selected value="">Choose Lesson</option>
                  </select>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <select name="note_id" class="form-control select2" style="width: 100%;">
                    <option selected value="">Choose Note</option>
                  </select>
                </div>
              </div>
              <div class="col-md-2 pr-0">
                <div class="form-group">
                  <select name="status" class="form-control select2" style="width: 100%;">
                    <option selected value="">Choose Status</option>
                    <option value="APPROVED" {{(request( 'status' ) == 'APPROVED' )? 'selected': ''}}>APPROVED</option>
                    <option value="UNAPPROVED" {{(request( 'status' ) == 'UNAPPROVED' )? 'selected': ''}}>UNAPPROVED</option>
                    <option value="DISAPPROVED" {{(request( 'status' ) == 'DISAPPROVED' )? 'selected': ''}}>DISAPPROVED</option>
                  </select>
                </div>
              </div>
              <div class="input-group-append col-md-2">
                <button class="btn btn-success" type="submit" style="    border: 1px solid #ccc;">
                  <i class="fas fa-search"></i> Search
                </button>
              </div>
            </div>
          </div>
        </form>
        <div class="row">
          <!-- left column -->
          
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">{{ $title }} List</h3>
                <div class="card-tools">
                  <a href="{{ Request::url().'?'.@$_SERVER['QUERY_STRING'] }}&export=excel" class="btn btn-info btn-shadow"><i data-feather="download"></i>Download</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Question</th>
                      <th>Program</th>
                      <th>Faculty</th>
                      <th>Class</th>
                      <th>Subject</th>
                      <th>Unit</th>
                      <th>Lesson</th>
                      <th>Note</th>
                      <th style="width: 158px;">Status</th>
                      <th style="width: 100px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($objectiveQuestions as $key=>$objectiveQuestion)
                    <tr id="table-row-{{ $objectiveQuestion->id }}">
                        <td>{{ ($objectiveQuestions->currentpage()-1) * $objectiveQuestions->perpage() + $key + 1 }}</td>
                        <td>{{ $objectiveQuestion->question }}</td>
                        <td>{{ @$objectiveQuestion->note->program->name }}</td>
                        <td>{{ @$objectiveQuestion->note->faculty->name }}</td>
                        <td>{{ @$objectiveQuestion->note->grade->name }}</td>
                        <td>{{ @$objectiveQuestion->note->subject->name }}</td>
                        <td>{{ @$objectiveQuestion->note->unit->name }}</td>
                        <td>{{ @$objectiveQuestion->note->lesson->name }}</td>
                        <td>{{ @$objectiveQuestion->note->title }}</td>
                        <td>{{ $objectiveQuestion->status }}</td>
                        <td>
                          @can('edit-note-objective-question')
                          <a href="{{ route('mcq.edit',$objectiveQuestion->id) }}" class="badge bg-primary"><i class="fas fa-edit"></i></a>
                          @endcan

                          @can('delete-note-objective-question')
                          <a href="{{ route('mcq.destroy',$objectiveQuestion->id)}}" class="badge bg-danger delete-confirm"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Delete"></i></a>
                          @endcan
                        </td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                {{ $objectiveQuestions->links() }}
              </div>
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
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
        "{{ request('faculty_id') }}",
        "{{ request('grade_id') }}",
        "{{ request('subject_id') }}",
        "{{ request('unit_id') }}",
        "{{ request('lesson_id') }}",
        "{{ request('note_id') }}",
      ])

  }
</script>

@endsection