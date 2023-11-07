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
                <h3 class="card-title">{{ $title }} List</h3>
               
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th style="width: 50px">#</th>
                      <th>Title</th>
                      <th style="width: 150px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  
                    <tr>
                        <td>1.</td>
                        <td>Categories</td>
                        <td>
                          <a href="#update" data-cache-key="category" class="btn btn-mini update_cache">Update</a>
                        </td>
                    </tr>
                    <tr>
                        <td>2.</td>
                        <td>Lesson Sidebar</td>
                        <td>
                          <a href="#update" data-cache-key="lesson-sidebar" class="btn btn-mini update_cache">Update</a>
                        </td>
                    </tr>
                    <tr>
                        <td>3.</td>
                        <td>Note Sidebar</td>
                        <td>
                          <a href="#update" data-cache-key="note-sidebar" class="btn btn-mini update_cache">Update</a>
                        </td>
                    </tr>
                    <tr>
                        <td>4.</td>
                        <td>Tooltip</td>
                        <td>
                          <a href="#update" data-cache-key="tooltip" class="btn btn-mini update_cache">Update</a>
                        </td>
                    </tr>
                    <tr>
                        <td>5.</td>
                        <td>Profession Modal</td>
                        <td>
                          <a href="#update" data-cache-key="profession-modal" class="btn btn-mini update_cache">Update</a>
                        </td>
                    </tr>

                    <tr>
                        <td>6.</td>
                        <td>Blog Category Sidebar</td>
                        <td>
                          <a href="#update" data-cache-key="blog-category-sidebar" class="btn btn-mini update_cache">Update</a>
                        </td>
                    </tr>
                    <tr>
                        <td>7.</td>
                        <td>404 Page</td>
                        <td>
                          <a href="#update" data-cache-key="page-not-found" class="btn btn-mini update_cache">Update</a>
                        </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
              
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
<script>
  $(function(){


    $('.update_cache').bind("click",function( e ){

      e.preventDefault();
      var _this = $(this);

      
      var cache_key = $(this).data('cache-key');
      var url = "";
      var page;
      var limit;
      var post;
      var type = "get";


      switch( cache_key ){

        case "category":
          url = "{{ route('cache.category' ) }}";
        break;
        case "lesson-sidebar":
          url = "{{ route('cache.lesson-sidebar' ) }}";
        break;
        case "note-sidebar":
          url = "{{ route('cache.note-sidebar' ) }}";
        break;
        case "tooltip":
          url = "{{ route('cache.tooltip' ) }}";
        break;
        case "profession-modal":
          url = "{{ route('cache.profession-modal' ) }}";
        break;
        case "blog-category-sidebar":
          url = "{{ route('cache.blog-category-sidebar' ) }}";
        break;
        case "page-not-found":
          url = "{{ route('cache.page-not-found' ) }}";
        break;

      }
      
      _this.text('Refreshing...');
      
      function _run_ajax( page, limit ){
        
        $.get( url, { delete_key: cache_key } ,function( data ){
          if( data ){
            _this.text('Done');
          }
          else{
            _this.text('Error refreshing'); 
          }
        });
      }

      if( page && limit ){

        _run_ajax( page, limit);

      }
      else
      if( type == 'post' ){

        

      }
      else{
        _run_ajax( 0, 0);
      }
    });
  });
</script>
@endsection