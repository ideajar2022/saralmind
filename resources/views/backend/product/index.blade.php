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
            <a href="{{route('product.create')}}" class="badge bg-success top-add-btn"><i class="fa fa-plus" title="Add Product"></i></a>
             <a href="{{route('product.trash')}}" class="badge bg-primary top-add-btn"><i class="fa fa-eye" title="View Trashed"></i></a>
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
                      <th>Name</th>
                      <th>Status</th>
                      <th style="width: 150px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($products as $key=>$product)
                    <tr id="table-row-{{ $product->id }}">
                        <td>{{ ($products->currentpage()-1) * $products->perpage() + $key + 1 }}</td>
                        <td>
                           <img width="100px" class="table-team-img" src="{{ $product->image_url }}">
                        </td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->status }}</td>
                        <td>
                          <a href="{{ route('product.edit',$product->id) }}" class="badge bg-primary"><i class="fas fa-edit"></i></a>
                          <a href="{{ route('product.destroy',$product->id)}}" class="badge bg-danger delete-confirm"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Delete"></i></a>
                        </td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
               {{ $products->links() }}
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