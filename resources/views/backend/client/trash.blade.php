@extends('backend.app')

@section('content')
 <div class="content-wrapper">
<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Soft Deleted Clients</h1>
          </div><!-- /.col -->
          <div class="col-sm-6 text-right">
            <a href="{{route('client.create')}}" class="badge bg-success top-add-btn">
              <i class="fa fa-plus" title="Add Client"></i>
            </a>
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
                  <select name="class_id" class="form-control select2" style="width: 100%;">
                    <option selected value="">Choose Ad Title</option>
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
                <h3 class="card-title">Client List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Client Name</th>
                      <th style="width: 158px;">Status</th>
                      <th style="width: 100px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($clients as $key=>$client)
                    <tr id="table-row-{{ $client->id }}">
                        <td>{{ ($clients->currentpage()-1) * $clients->perpage() + $key + 1 }}</td>
                        <td>{{ $client->name }}</td>
                        <td>{{ $client->status }}</td>
                        <td>
                          <a href="{{ route('client.restore',$client->id)}}" class="badge bg-primary restore-confirm"><i class="fa fa-trash-restore" data-toggle="tooltip" data-placement="top" title="Restore"></i></a>
                          <a href="{{ route('client.permanent-delete',$client->id)}}" class="badge bg-danger delete-confirm"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Delete"></i></a>
                        </td>
                    </tr>
                    @endforeach
                  </tbody>
                  
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                Advertisements Links
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