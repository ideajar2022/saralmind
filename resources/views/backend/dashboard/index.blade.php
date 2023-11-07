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
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">{{ $title }}</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row counter-section">
            <div class="col-lg-3 col-md-6">
                <div class="card bg-light-info border-0">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <a href="javascript:void(0)" class="btn btn-primary rounded-circle btn-circle-lg text-white mb-2">
                                <img src="{{asset('backend/images/icons/syllabus.svg')}}" class="img-fluid" style="filter: invert(1)" alt="">
                                <!-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-archive"><polyline points="21 8 21 21 3 21 3 8"></polyline><rect x="1" y="3" width="22" height="5"></rect><line x1="10" y1="12" x2="14" y2="12"></line></svg> -->
                            </a>
                        </div>
                        <div>
                            <h2 class="mb-0 font-weight-medium counter" data-count="659">0</h2>
                            <h6 class="text-muted font-weight-bold mb-0">Syllabus</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card bg-light-danger border-0">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <a href="javascript:void(0)" class="btn btn-danger rounded-circle btn-circle-lg text-white mb-2">
                            <img src="{{asset('backend/images/icons/notes.svg')}}" class="img-fluid" style="filter: invert(1)" alt="">
                               <!-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clock"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg> -->
                            </a>
                        </div>
                        <div>
                            <h2 class="mb-0 font-weight-medium counter" data-count="18306">0</h2>
                            <h6 class="text-muted font-weight-bold mb-0 w-100 text-truncate">Notes</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card bg-light-warning border-0">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <a href="javascript:void(0)" class="btn btn-warning rounded-circle btn-circle-lg text-white mb-2">
                                <img src="{{asset('backend/images/icons/networking.svg')}}" class="img-fluid" style="filter: invert(1)" alt="">
                                <!-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg> -->
                            </a>
                        </div>
                        <div>
                            <h2 class="mb-0 font-weight-medium counter" data-count="10567">0</h2>
                            <h6 class="text-muted font-weight-bold mb-0">Users</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card bg-light-success border-0">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <a href="javascript:void(0)" class="btn btn-success rounded-circle btn-circle-lg text-white mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
                            </a>
                        </div>
                        <div>
                            <h2 class="mb-0 font-weight-medium counter" data-count="60">0</h2>
                            <h6 class="text-muted font-weight-bold mb-0">Booking</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card bg-light-info border-0">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <a href="javascript:void(0)" class="btn btn-primary rounded-circle btn-circle-lg text-white mb-2" style="background: #673AB7; border-color: #673AB7;">
                                <img src="{{asset('backend/images/icons/dictionary.svg')}}" class="img-fluid" style="filter: invert(1)" alt="">
                                <!-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg> -->
                            </a>
                        </div>
                        <div>
                            <h2 class="mb-0 font-weight-medium counter" data-count="8693">0</h2>
                            <h6 class="text-muted font-weight-bold mb-0">Glossaries</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card bg-light-info border-0">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <a href="javascript:void(0)" class="btn btn-primary rounded-circle btn-circle-lg text-white mb-2" style="background: #c1d873; border-color: #c1d873;">
                                <img src="{{asset('backend/images/icons/blog.png')}}" class="img-fluid" style="filter: invert(1)" alt="">
                                <!-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg> -->
                            </a>
                        </div>
                        <div>
                            <h2 class="mb-0 font-weight-medium counter" data-count="150">0</h2>
                            <h6 class="text-muted font-weight-bold mb-0">Blogs</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card bg-light-info border-0">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <a href="javascript:void(0)" class="btn btn-primary rounded-circle btn-circle-lg text-white mb-2" style="background: #73d8d1; border-color: #73d8d1;">
                                <img src="{{asset('backend/images/icons/customer-support.png')}}" class="img-fluid" style="filter: invert(1)" alt="">
                                <!-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg> -->
                            </a>
                        </div>
                        <div>
                            <h2 class="mb-0 font-weight-medium counter" data-count="23">0</h2>
                            <h6 class="text-muted font-weight-bold mb-0">Inquiries</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card bg-light-info border-0">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <a href="javascript:void(0)" class="btn btn-primary rounded-circle btn-circle-lg text-white mb-2" style="background: #d073d8; border-color: #d073d8;" >
                                <img src="{{asset('backend/images/icons/comment.svg')}}" class="img-fluid" style="filter: invert(1)" alt="">
                                <!-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg> -->
                            </a>
                        </div>
                        <div>
                            <h2 class="mb-0 font-weight-medium counter" data-count="12830">0</h2>
                            <h6 class="text-muted font-weight-bold mb-0">Subscribers</h6>
                        </div>
                    </div>
                </div>
            </div>

        </div>
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

@section('extra-js')
<script>
$('.counter').each(function() {
  var $this = $(this),
      countTo = $this.attr('data-count');
  
  $({ countNum: $this.text()}).animate({
    countNum: countTo
  },
  {
    duration: 1500,
    easing:'linear',
    step: function() {
      $this.text(Math.floor(this.countNum));
    },
    complete: function() {
      $this.text(this.countNum);
      //alert('finished');
    }
  });  
});
</script>
@endsection