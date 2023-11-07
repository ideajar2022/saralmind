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
                      <th>Username</th>
                      <th>Number of NNC tests given</th>
                      <th>Highest Score</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($users as $key=>$user)
                    <tr id="table-row-{{ $user->user_id }}">
                        <td>
                          {{ ($users->currentpage()-1) * $users->perpage() + $key + 1 }}
                        </td>
                        <td>{{ \App\Models\User::where(['id' => $user->user_id])->pluck('username')->first() }}</td>
                        <td>{{ $user->no_of_tests }}</td>
                        <td>{{ $user->highest_score }} %</td>
                       
                        
                    </tr>
                  @endforeach
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

@endsection