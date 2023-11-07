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
                  <select name="class_id" class="form-control select2" style="width: 100%;">
                    <option selected value="">Choose Class</option>
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
            </div>
            <div class="input-group-append col-md-2 pl-0">
              <button class="btn btn-success" type="submit" style="    border: 1px solid #ccc;">
                <i class="fas fa-search"></i> Search
              </button>
            </div>
          </div>
        </form>
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
                      <th style="width: 10px">#</th>
                      <th>Comment On</th>
                      <th>Comment</th>
                      <th>Commented By</th>
                      <th>Commented At</th>
                      <th>Total Replies</th>
                      <th style="width: 158px;">Status</th>
                      <th style="width: 100px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($noteComments as $key=>$noteComment)
                    <tr id="table-row-{{ $noteComment->id }}">
                        <td>{{ ($noteComments->currentpage()-1) * $noteComments->perpage() + $key + 1 }}</td>
                        <td>
                          {{ @$noteComment->note->program->name }} / {{ @$noteComment->note->classes->name }} / {{ @$noteComment->note->subject->name }} / {{ @$noteComment->note->unit->name }} / {{ @$noteComment->note->lesson->name }} /{{ @$noteComment->note->title }} 
                        </td>
                    
                        <td>{{ $noteComment->comment }}</td>
                        <td>{{ $noteComment->user->name }}</td>
                        <td>{{ $noteComment->created_at }}</td>
                        <td>{{ $noteComment->replies->count() }}</td>
            
                        <td>
                          <a href="{{ route('comment.destroy',$noteComment->id)}}" class="badge bg-danger delete-confirm"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Delete"></i></a>
                        </td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                {{ $noteComments->links() }}
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
        "{{ request('class_id') }}",
        "{{ request('subject_id') }}",
        "{{ request('unit_id') }}",
        "{{ request('lesson_id') }}",
        "{{ request('note_id') }}",
      ])

  }
</script>

@endsection