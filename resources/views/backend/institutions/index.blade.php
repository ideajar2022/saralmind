@extends('backend.app')

@section('content')
 <div class="content-wrapper">
<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Institutions</h1>
          </div><!-- /.col -->
          <div class="col-sm-6 text-right">
            <a href="{{route('admin.institutions.add')}}" class="badge bg-success top-add-btn"><i class="fa fa-plus" title="Add Institution"></i></a>
            <a href="{{route('admin.notes.add')}}" class="badge bg-primary top-add-btn"><i class="fa fa-eye" title="View Trashed Notes"></i></a>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Institutions List</h3>
                <form class="form-inline ml-3">
                  <div class="input-group input-group-sm ml-auto">
                    <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                      <button class="btn btn-navbar" type="submit" style="    border: 1px solid #ccc;">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">ID</th>
                      <th>Name</th>
                      <th>Description</th>
                      <th style="width: 234px;">Status</th>
                      <th style="width: 172px;">Product Type</th>
                      <th>Created By</th>
                      <th>Created Date</th>
                      <th style="width: 100px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1.</td>
                      <td>HSEB</td>
                      <td>Higher Secondary Education Board</td>
                      <td>
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                          <label class="btn bg-olive active">
                            <input type="radio" name="options" id="option1" autocomplete="off" checked> Approved
                          </label>
                          <label class="btn bg-olive">
                            <input type="radio" name="options" id="option2" autocomplete="off"> Disapproved
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                          <label class="btn bg-olive active">
                            <input type="radio" name="options" id="option1" autocomplete="off" checked> Premium
                          </label>
                          <label class="btn bg-olive">
                            <input type="radio" name="options" id="option2" autocomplete="off"> Free
                          </label>
                        </div>
                      </td>
                      <td>Saralmind</td>
                      <td>2016-12-01 21:43:46</td>
                      <td><a href="#" class="badge bg-primary"><i class="fas fa-edit"></i></a><a href="#" class="badge bg-danger"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Delete"></i></a></td>
                    </tr>
                    <tr>
                      <td>2.</td>
                      <td>HSEB</td>
                      <td>Higher Secondary Education Board</td>
                      <td>
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                          <label class="btn bg-olive active">
                            <input type="radio" name="options" id="option1" autocomplete="off" > Approved
                          </label>
                          <label class="btn bg-olive">
                            <input type="radio" name="options" id="option2" autocomplete="off" checked> Disapproved
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                          <label class="btn bg-olive active">
                            <input type="radio" name="options" id="option1" autocomplete="off" checked> Premium
                          </label>
                          <label class="btn bg-olive">
                            <input type="radio" name="options" id="option2" autocomplete="off"> Free
                          </label>
                        </div>
                      </td>
                      <td>Saralmind</td>
                      <td>2016-12-01 21:43:46</td>
                      <td><a href="#" class="badge bg-primary"><i class="fas fa-edit"></i></a><a href="#" class="badge bg-danger"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Delete"></i></a></td>
                    </tr>
                    <tr>
                      <td>3.</td>
                      <td>HSEB</td>
                      <td>Higher Secondary Education Board</td>
                      <td>
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                          <label class="btn bg-olive active">
                            <input type="radio" name="options" id="option1" autocomplete="off" checked> Approved
                          </label>
                          <label class="btn bg-olive">
                            <input type="radio" name="options" id="option2" autocomplete="off"> Disapproved
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                          <label class="btn bg-olive active">
                            <input type="radio" name="options" id="option1" autocomplete="off" > Premium
                          </label>
                          <label class="btn bg-olive">
                            <input type="radio" name="options" id="option2" autocomplete="off" checked> Free
                          </label>
                        </div>
                      </td>
                      <td>Saralmind</td>
                      <td>2016-12-01 21:43:46</td>
                      <td><a href="#" class="badge bg-primary"><i class="fas fa-edit"></i></a><a href="#" class="badge bg-danger"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Delete"></i></a></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul>
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