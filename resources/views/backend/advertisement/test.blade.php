@extends('backend.app')

@section('content')
 <div class="content-wrapper">
<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Saralmind advertisement</h1>
          </div><!-- /.col -->
          <div class="col-sm-6 text-right">
            <a href="{{route('advertisement.create')}}" class="badge bg-success top-add-btn"><i class="fa fa-plus" title="Add Advertisement"></i></a>
            <a href="route('advertisement.trash')" class="badge bg-primary top-add-btn"><i class="fa fa-eye" title="View Trashed"></i></a>
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
                      <input class="form-control form-control-navbar" type="search" name="q" value="" placeholder="Search" aria-label="Search">
                    </div>
                </div>
              </div>
              <div class="col-md-2 pr-0">
                <div class="form-group">
                  <select name="program_id" class="form-control select2" style="width: 100%;">
                    <option selected value="">Choose Client</option>
                  </select>
                </div>
              </div>
              <div class="col-md-2 pr-0">
                <div class="form-group">
                  <select name="name" class="form-control select2" style="width: 100%;">
                    <option selected value="">Choose Ad Title</option>
                    @foreach($advertisements as $key=>$advertisement)
                    <option value="{{ $key }}" {{(request( 'name' ) == $key )? 'selected': ''}}>{{ $advertisement->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-md-2 pr-0">
                <div class="form-group">
                  <select name="subjectId" class="form-control select2" style="width: 100%;">
                    <option selected value="">Choose Status</option>

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
                <h3 class="card-title">Advertisement List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Client</th>
                      <th>Title</th>
                      <th>Link</th>
                      <th style="width: 158px;">Status</th>
                      <th style="width: 100px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($advertisements as $key=>$advertisement)
                    <tr id="table-row-{{ $advertisement->id }}">
                        <td>{{ ($advertisements->currentpage()-1) * $advertisements->perpage() + $key + 1 }}</td>
                        <td>123</td>
                        <td>{{ $advertisement->name }}</td>
                        <td>{{ $advertisement->link }}</td>
                        <td>{{ $advertisement->status }}</td>
                        <td>
                          <a href="{{ route('advertisement.edit',$advertisement->id) }}" class="badge bg-primary"><i class="fas fa-edit"></i></a>
                          <a href="{{ route('advertisement.destroy',$advertisement->id)}}" class="badge bg-danger delete-confirm"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Delete"></i></a>
                        </td>
                    </tr>
                    @endforeach
                  </tbody>
                  
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                Advertiesments Links
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