@extends('backend.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{ $title }}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">
                <a href="{{ route('admin.dashboard') }}">Home</a>
              </li>
              <li class="breadcrumb-item">
                <a href="{{ route('admin-user.index') }}">Admins</a>
              </li>
              <li class="breadcrumb-item active">Edit</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
       <form method="POST" action="{{ route('admin-user.update',$admin->id) }}" class="form-horizontal" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        @include('backend.admin.form')
              
        <div class="row">
          <div class="col-12">
            <div class="text-left">
            <button type="submit" class="btn btn-success">Update</button>
          </div>
        </div>
        </div>
        </form>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
@section('extra-js')

<script type="text/javascript">
  $('input[type="checkbox"][name="update_password_check"]').click(function(){
        $('.password-wrapper').slideToggle();
    });
  if("{{ old('update_password_check' ) }}"){

    $('.password-wrapper').slideToggle();
  }
</script>

@endsection