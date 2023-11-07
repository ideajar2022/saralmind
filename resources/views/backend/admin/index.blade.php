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
            <a href="{{route('admin-user.create')}}" class="badge bg-success top-add-btn"><i class="fa fa-plus" title="Add Admin"></i></a>
            <a href="{{route('admin-user.trash')}}" class="badge bg-primary top-add-btn"><i class="fa fa-eye" title="View Trashed"></i></a>
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
              <div class="col-md-6 pr-0">
                <div class="search-bar-wrapper">
                    <div class="input-group input-group-md">
                      <input class="form-control form-control-navbar" type="search" name="q" value="{{ request('q') }}" placeholder="Search" aria-label="Search">
                    </div>
                </div>
              </div>
              <div class="col-md-2 pr-0">
                <div class="form-group">
                  <select name="role_id" class="form-control select2" style="width: 100%;">
                    <option selected value="">Choose Role</option>
                    @foreach($roles as $key=>$role)
                    <option value="{{ $key }}" {{(request( 'role_id' ) == $key )? 'selected': ''}}>{{ $role }}</option>
                    @endforeach
                  
                  </select>
                </div>
              </div>
              <div class="col-md-2 pr-0">
                <div class="form-group">
                  <select name="status" class="form-control select2" style="width: 100%;">
                    <option selected value="">Choose Status</option>
                    <option value="Active" {{(request( 'status' ) == 'Active' )? 'selected': ''}}>Active</option>
                    <option value="Inactive" {{(request( 'status' ) == 'Inactive' )? 'selected': ''}}>Inactive</option>
                  </select>
                </div>
              </div>
              <div class="input-group-append col-md-2">
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
                      <th>Name</th>
                      <th>Email</th>
                      <th>Phone no</th>
                      <th>Status</th>
                      <th style="width: 150px">Action</th>
                  </tr>
              </thead>
              <tbody>
                 @foreach($admins as $key=>$admin)
                  <tr id="table-row-{{ $admin->id }}">
                      <td>{{ ($admins->currentpage()-1) * $admins->perpage() + $key + 1 }}</td>
                      <td>{{ $admin->name }}</td>
                      <td>{{ $admin->email }}</td>
                      <td>{{ $admin->phone_no }}</td>
                      <td>{{ $admin->status }}</td>
                      <td>
                        <a href="{{ route('admin-user.edit',$admin->id) }}" class="badge bg-primary"><i class="fas fa-edit"></i></a>
                        <a href="{{ route('admin-user.destroy',$admin->id)}}" class="badge bg-danger delete-confirm"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Delete"></i></a>
                      </td>
                  </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
               {{ $admins->links() }}
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

  
  
</script>
@endsection


