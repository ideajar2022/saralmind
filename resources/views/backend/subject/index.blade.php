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
            <a href="{{route('subject.import')}}"><button type="submit" class="btn btn-primary btn-sm">Import Subjects</button></a>
            <a href="{{route('subject.create')}}" class="badge bg-success top-add-btn"><i class="fa fa-plus" title="Add Notes"></i></a>
            <a href="{{route('subject.trash')}}" class="badge bg-primary top-add-btn"><i class="fa fa-eye" title="View Trashed"></i></a>
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

              <div class="col-md-2 pr-0">
                <div class="form-group">
                  <select name="program_id" class="form-control select2" style="width: 100%;">
                    <option selected disabled value="">Choose Program</option>
                    @foreach($programs as $key=>$program)
                      <option value="{{ $key }}" {{(request( 'program_id' ) == $key )? 'selected': ''}}>{{ $program }}</option>
                    @endforeach
                  
                  </select>
                </div>
              </div>

              <div class="col-md-2 pr-0">
                <div class="form-group">
                  <select name="faculty_id" class="form-control select2" style="width: 100%;">
                    <option selected disabled value="">Choose Faculty</option>
                    @foreach($faculties as $key=>$faculty)
                      <option value="{{ $key }}" {{(request( 'faculty_id' ) == $key )? 'selected': ''}}>{{ $faculty }}</option>
                    @endforeach
                  
                  </select>
                </div>
              </div>

              <div class="col-md-2 pr-0">
                <div class="form-group">
                  <select name="grade_id" class="form-control select2" style="width: 100%;">
                    <option selected disabled value="">Choose Grade</option>
                    @foreach($grades as $key=>$grade)
                    <option value="{{ $key }}" {{(request( 'grade_id' ) == $key )? 'selected': ''}}>{{ $grade }}</option>
                    @endforeach
                  
                  </select>
                </div>
              </div>
              <!-- <div class="col-md-2 pr-0">
                <div class="form-group">
                  <select name="class_id" class="form-control select2" style="width: 100%;">
                    <option selected value="">Choose Class</option>

                  </select>
                </div>
              </div> -->
              <div class="col-md-2 pr-0">
                <div class="form-group">
                  <select name="status" class="form-control select2" style="width: 100%;">
                    <option selected value="">Choose Status</option>
                    <option value="APPROVED" {{(request( 'status' ) == 'APPROVED' )? 'selected': ''}}>COMPLETED</option>
                    <option value="UNAPPROVED" {{(request( 'status' ) == 'UNAPPROVED' )? 'selected': ''}}>UNAPPROVED</option>
                    <option value="DISAPPROVED" {{(request( 'status' ) == 'DISAPPROVED' )? 'selected': ''}}>DISAPPROVED</option>
                  </select>
                </div>
              </div>
              <div class="input-group-append col-md-2">
                <button class="btn btn-success" type="submit" style="border: 1px solid #ccc;">
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
                <div class="card-tools">
                  <a href="{{ Request::url().'?'.@$_SERVER['QUERY_STRING'] }}&export=excel" class="btn btn-info btn-shadow"><i data-feather="download"></i>Download</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th style="width: 50px">#</th>
                      <th>Icon</th>
                      <th>Subject</th>
                      <th>Program</th>
                      <th>Faculty</th>
                      <th>Grade</th>
                      <th>Status</th>
                      <th style="width: 150px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($subjects as $key=>$subject)
                    <tr id="table-row-{{ $subject->id }}">
                        <td>
                          {{ ($subjects->currentpage()-1) * $subjects->perpage() + $key + 1 }}
                        </td>
                        <td>
                           <img width="100px" class="table-team-img" src="{{ ($subject->image_url) }}">
                        </td>
                        <td>{{ $subject->name }}</td>
                        <td>{{ @$subject->program->name }}</td>
                        <td>{{ @$subject->faculty->name }}</td>
                        <td>{{ @$subject->grade->name }}</td>
                        <td>
                            @if($subject->status == 'APPROVED')
                              COMPLETED
                            @else
                              NOT COMPLETED
                            @endif    
                        </td>
                        <td>
                          <a href="{{ route('subject.edit',$subject->id) }}" class="badge bg-primary"><i class="fas fa-edit"></i></a>
                          <a href="{{ route('subject.destroy',$subject->id)}}" class="badge bg-danger delete-confirm"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Delete"></i></a>
                        </td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
               {{ $subjects->links() }}
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
    $("select[name='program_id']").trigger('change',"{{ request('grade_id') }}")

  }
</script>

@endsection