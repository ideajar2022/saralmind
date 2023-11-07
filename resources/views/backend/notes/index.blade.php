@extends('backend.app')

@section('content')
 <div class="content-wrapper">
<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Notes</h1>
          </div><!-- /.col -->
          <div class="col-sm-6 text-right">
            <a href="{{route('admin.notes.add')}}" class="badge bg-success top-add-btn"><i class="fa fa-plus" title="Add Notes"></i></a>
            <a href="{{route('admin.notes.add')}}" class="badge bg-primary top-add-btn"><i class="fa fa-eye" title="View Trashed Notes"></i></a>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="note-filter">
          
          <form action="/">
            <div class="row">
              <div class="col-md-12">
                <div class="search-bar-wrapper">
                    <div class="input-group input-group-md">
                      <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                    </div>
                </div>
              </div>
              <div class="col-md-2 pr-0">
                <div class="form-group">
                  <select class="form-control select2" style="width: 100%;">
                    <option selected="selected" disabled="disabled" hidden="hidden">Filter via Institution</option>
                    <option>Alaska</option>
                    <option>California</option>
                    <option>Delaware</option>
                    <option>Tennessee</option>
                    <option>Texas</option>
                    <option>Washington</option>
                  </select>
                </div>
              </div>
              <div class="col-md-2 pr-0 pl-0">
                <div class="form-group">
                  <select class="form-control select2" style="width: 100%;">
                  <option selected="selected" disabled="disabled" hidden="hidden">Filter via Program</option>
                    <option>Alaska</option>
                    <option>California</option>
                    <option>Delaware</option>
                    <option>Tennessee</option>
                    <option>Texas</option>
                    <option>Washington</option>
                  </select>
                </div>
              </div>
              <div class="col-md-2 pr-0 pl-0">
                <div class="form-group">
                  <select class="form-control select2" style="width: 100%;">
                  <option selected="selected" disabled="disabled" hidden="hidden">Filter via Class</option>
                    <option>Alaska</option>
                    <option>California</option>
                    <option>Delaware</option>
                    <option>Tennessee</option>
                    <option>Texas</option>
                    <option>Washington</option>
                  </select>
                </div>
              </div>
              <div class="col-md-2 pr-0 pl-0">
                <div class="form-group">
                  <select class="form-control select2" style="width: 100%;">
                  <option selected="selected" disabled="disabled" hidden="hidden">Filter via Subject</option>
                    <option>Alaska</option>
                    <option>California</option>
                    <option>Delaware</option>
                    <option>Tennessee</option>
                    <option>Texas</option>
                    <option>Washington</option>
                  </select>
                </div>
              </div>
              <div class="col-md-2 pr-0 pl-0">
                <div class="form-group">
                  <select class="form-control select2" style="width: 100%;">
                  <option selected="selected" disabled="disabled" hidden="hidden">Filter via Unit</option>
                    <option>Alaska</option>
                    <option>California</option>
                    <option>Delaware</option>
                    <option>Tennessee</option>
                    <option>Texas</option>
                    <option>Washington</option>
                  </select>
                </div>
              </div>
              <div class="col-md-2 pl-0">
                <div class="form-group">
                  <select class="form-control select2" style="width: 100%;">
                  <option selected="selected" disabled="disabled" hidden="hidden">Filter via Lesson</option>
                    <option>Alaska</option>
                    <option>California</option>
                    <option>Delaware</option>
                    <option>Tennessee</option>
                    <option>Texas</option>
                    <option>Washington</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="input-group-append col-md-2">
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
                <h3 class="card-title">Notes List</h3>
                
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">ID</th>
                      <th>Name</th>
                      <th>Description</th>
                      <th style="width: 158px;">Status</th>
                      <th style="width: 131px;">Product Type</th>
                      <th>Created By</th>
                      <th style="width: 200px;">Created Date</th>
                      <th style="width: 100px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1.</td>
                      <td>HSEB</td>
                      <td>Higher Secondary Education Board</td>
                      <td>
                        <input class="approval-switch" type="checkbox" checked data-toggle="toggle" data-on="Approved" data-off="Disapproved">
                      </td>
                      <td>
                        <input class="approval-switch" type="checkbox" checked data-toggle="toggle" data-on="Premium" data-off="Free">
                      </td>
                      <td>Saralmind</td>
                      <td>2016-12-01 21:43:46</td>
                      <td><a href="#" class="badge bg-danger"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Delete"></i></a><a href="#" class="badge bg-primary"><i class="fas fa-edit"></i></a></td>
                    </tr>
                    <tr>
                      <td>2.</td>
                      <td>HSEB</td>
                      <td>Higher Secondary Education Board</td>
                      <td>
                        <input class="approval-switch" type="checkbox" checked data-toggle="toggle" data-on="Approved" data-off="Disapproved">
                      </td>
                      <td>
                        <input class="approval-switch" type="checkbox" data-toggle="toggle" data-on="Premium" data-off="Free">
                      </td>
                      <td>Saralmind</td>
                      <td>2016-12-01 21:43:46</td>
                      <td><a href="#" class="badge bg-danger"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Delete"></i></a><a href="#" class="badge bg-primary"><i class="fas fa-edit"></i></a></td>
                    </tr>
                    <tr>
                      <td>3.</td>
                      <td>HSEB</td>
                      <td>Higher Secondary Education Board</td>
                      <td>
                        <input class="approval-switch" type="checkbox" checked data-toggle="toggle" data-on="Approved" data-off="Disapproved">
                      </td>
                      <td>
                        <input class="approval-switch" type="checkbox" checked data-toggle="toggle" data-on="Premium" data-off="Free">
                      </td>
                      <td>Saralmind</td>
                      <td>2016-12-01 21:43:46</td>
                      <td><a href="#" class="badge bg-danger"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Delete"></i></a><a href="#" class="badge bg-primary"><i class="fas fa-edit"></i></a></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                  <li class="page-item active"><a class="page-link" href="#">1</a></li>
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