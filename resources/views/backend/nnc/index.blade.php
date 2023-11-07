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
            <a href="{{route('nnc.import')}}"><button type="submit" class="btn btn-primary btn-sm">Import Questions</button></a>
<!--             <a href="{{route('mcq.create')}}" class="badge bg-success top-add-btn"><i class="fa fa-plus" title="Add Note Videos"></i></a> -->
            <a href="{{route('nnc.trash')}}" class="badge bg-primary top-add-btn"><i class="fa fa-eye" title="View Trashed"></i></a>
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
                  <select name="category_id" class="form-control select2" style="width: 100%;">
                    <option selected value="">Choose Category</option>
                    @foreach($categories as $key=>$category)
                    <option value="{{ $key }}" {{(request( 'category_id' ) == $key )? 'selected': ''}}>{{ $category }}</option>
                    @endforeach
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
                      <th>Category</th>
                      <th>Correct Answer</th>
                     <!--  <th>Option1</th>
                      <th>Option2</th>
                      <th>Option3</th>
                      <th>Option4</th> -->
                      <th style="width: 100px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($nncQuestions as $key=>$nncQuestion)
                    <tr id="table-row-{{ $nncQuestion->id }}">
                        <td>{{ ($nncQuestions->currentpage()-1) * $nncQuestions->perpage() + $key + 1 }}</td>
                        <td>{{ $nncQuestion->question }}</td>
                        <td>{{ @$nncQuestion->nnc_category->name }}</td>
                        <td>{{ $nncQuestion->correct_answer }}</td>
                        <!-- <td>{{ $nncQuestion->option_1 }}</td>
                        <td>{{ $nncQuestion->option_2 }}</td>
                        <td>{{ $nncQuestion->option_3 }}</td>
                        <td>{{ $nncQuestion->option_4 }}</td> -->
                        <td>
                          @can('edit-note-objective-question')
                          <a href="{{ route('nnc.edit',$nncQuestion->id) }}" class="badge bg-primary"><i class="fas fa-edit"></i></a>
                          @endcan

                          @can('delete-note-objective-question')
                          <a href="{{ route('nnc.destroy',$nncQuestion->id)}}" class="badge bg-danger delete-confirm"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Delete"></i></a>
                          @endcan
                        </td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                {{ $nncQuestions->links() }}
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

@endsection