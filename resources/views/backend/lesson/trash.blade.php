@extends('backend.app')

@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{ $title }}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6 text-right">
            <a href="{{route('lesson.create')}}" class="badge bg-success top-add-btn"><i class="fa fa-plus" title="Add Lesson"></i></a>
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
              <div class="col-md-12 pr-0">
                <div class="search-bar-wrapper">
                    <div class="input-group input-group-md">
                      <input class="form-control form-control-navbar" type="search" name="q" value="{{ request('q') }}" placeholder="Search" aria-label="Search">
                    </div>
                </div>
              </div>
               <div class="col-md-2 pr-0 ">
                <div class="form-group">
                  <select name="program_id" class="form-control select2" style="width: 100%;">
                    <option selected value="">Choose Program</option>
                    @foreach($programs as $key=>$program)
                    <option value="{{ $key }}" {{(request( 'program_id' ) == $key )? 'selected': ''}}>{{ $program }}</option>
                    @endforeach
                  
                  </select>
                </div>
              </div>

              <div class="col-md-2 pr-0 ">
                <div class="form-group">
                  <select name="faculty_id" class="form-control select2" style="width: 100%;">
                    <option selected value="">Choose Faculty</option>
                  </select>
                </div>
              </div>
              <div class="col-md-2 pr-0 ">
                <div class="form-group">
                  <select name="grade_id" class="form-control select2" style="width: 100%;">
                    <option selected value="">Choose Grade</option>
                  </select>
                </div>
              </div>
              <div class="col-md-2 pr-0 ">
                <div class="form-group">
                  <select name="subject_id" class="form-control select2" style="width: 100%;">
                    <option selected value="">Choose Subject</option>
                  </select>
                </div>
              </div>
              <div class="col-md-2 pr-0 ">
                <div class="form-group">
                  <select name="unit_id" class="form-control select2" style="width: 100%;">
                    <option selected value="">Choose Unit</option>
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
              <div class="input-group-append col-md-2 pr-0">
                <button class="btn btn-success" type="submit" style="    border: 1px solid #ccc;">
                  <i class="fas fa-search"></i> Search
                </button>
              </div>
            </div>
          </form>
        </div>
        
        <div class="row">
          <!-- left column -->
          
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">{{ $title }} List</h3>
                
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th style="width: 50px">#</th>
                      <th>Icon</th>
                      <th>Lesson</th>
                      <th>Program</th>
                      <th>Class</th>
                      <th>Subject</th>
                      <th>Unit</th>
                      <th>Status</th>
                      <th style="width: 150px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($lessons as $key=>$lesson)
                    <tr id="table-row-{{ $lesson->id }}">
                        <td>{{ ($lessons->currentpage()-1) * $lessons->perpage() + $key + 1 }}</td>
                        <td>
                          <img width="100px" class="table-team-img" src="{{ ($lesson->image_url) }}">
                        </td>
                        <td>{{ $lesson->name }}</td>
                        <td>{{ @$lesson->program->name }}</td>
                        <td>{{ @$lesson->grade->name }}</td>
                        <td>{{ @$lesson->subject->name }}</td>
                        <td>{{ @@$lesson->unit->name }}</td>
                        <td>{{ $lesson->status }}</td>
                        <td>
                          <a href="{{ route('lesson.restore',$lesson->id)}}" class="badge bg-primary restore-confirm"><i class="fa fa-trash-restore" data-toggle="tooltip" data-placement="top" title="Restore"></i></a>
                          <a href="{{ route('lesson.permanent-delete',$lesson->id)}}" class="badge bg-danger permanent-delete-confirm"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Delete"></i></a>
                        </td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
               {{ $lessons->links() }}
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
        "{{ request('grade_id') }}",
        "{{ request('subject_id') }}",
        "{{ request('unit_id') }}",
      ])

  }
</script>

@endsection