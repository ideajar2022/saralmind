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
            <a href="{{route('media-feed.create')}}" class="badge bg-success top-add-btn"><i class="fa fa-plus" title="Add Media Feed"></i></a>
            
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
                      <th>Title</th>
                      <th>Media</th>
                      <th>Status</th>
                      <th>Published At</th>
                      <th style="width: 150px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($mediaFeeds as $key=>$mediaFeed)
                    <tr id="table-row-{{ $mediaFeed->id }}">
                        <td>{{ ($mediaFeeds->currentpage()-1) * $mediaFeeds->perpage() + $key + 1 }}</td>
                        <td>
                           <img width="100px" class="table-team-img" src="{{ ($mediaFeed->image_url) }}">
                        </td>
                        <td>
                          <a href="{{ $mediaFeed->url }}" target="_blank"> {{ $mediaFeed->title }}</a>
                        </td>
                        <td>{{ $mediaFeed->media }}</td>
                        <td>{{ $mediaFeed->status }}</td>
                        <td>{{ $mediaFeed->published_at }}</td>
                        <td>
                          <a href="{{ route('media-feed.restore',$mediaFeed->id)}}" class="badge bg-primary restore-confirm"><i class="fa fa-trash-restore" data-toggle="tooltip" data-placement="top" title="Restore"></i></a>
                          <a href="{{ route('media-feed.permanent-delete',$mediaFeed->id)}}" class="badge bg-danger permanent-delete-confirm"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Delete"></i></a>
                        </td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
               {{ $mediaFeeds->links() }}
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