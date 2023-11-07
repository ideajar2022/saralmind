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
              <div class="col-md-8 pr-0">
                <div class="search-bar-wrapper">
                    <div class="input-group input-group-md">
                      <input class="form-control form-control-navbar" type="search" name="q" value="{{ request('q') }}" placeholder="Search By Note" aria-label="Search">
                    </div>
                </div>
              </div>
<!--               <div class="col-md-2 pr-0">
                <div class="form-group">
                  <select name="admin" class="form-control select2" style="width: 100%;">
                    <option selected value="">Choose Admin</option>
                    @foreach($admins as $admin)
                    <option value="{{$admin->id}}">{{ $admin->name }}</option>
                    @endforeach

                  </select>
                </div>
              </div> -->

              <div class="col-md-2">
                <div class="form-group">
                  <select name="admin" class="form-control select2" style="width: 100%;">
                    <option selected disabled value="">Choose Admin</option>
                    @foreach($admins as $admin)
                    <option value="{{$admin->name}}" {{(request( 'status' ) == $admin->name )? 'selected': ''}}>{{ $admin->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="col-md-2">
                <div class="form-group">
                  <select name="status" class="form-control select2" style="width: 100%;">
                    <option selected disabled value="">Choose Status</option>
                    <option value="APPROVED" {{(request( 'status' ) == 'APPROVED' )? 'selected': ''}}>APPROVED</option>
                    <option value="UNAPPROVED" {{(request( 'status' ) == 'UNAPPROVED' )? 'selected': ''}}>UNAPPROVED</option>
                    <option value="DISAPPROVED" {{(request( 'status' ) == 'DISAPPROVED' )? 'selected': ''}}>DISAPPROVED</option>
                    <option value="IN REVIEW" {{(request( 'status' ) == 'IN REVIEW' )? 'selected': ''}}>IN REVIEW</option>
                    <option value="FOR QUILLBOT" {{(request( 'status' ) == 'FOR QUILLBOT' )? 'selected': ''}}>FOR QUILLBOT</option>
                    <option value="Looks Like Incomplete" {{(request( 'status' ) == 'Looks Like Incomplete' )? 'selected': ''}}>Looks Like Incomplete</option>

                    @foreach($admins as $admin)
                    <option value="{{$admin->name}}" {{(request( 'status' ) == $admin->name )? 'selected': ''}}>{{ $admin->name }}</option>
                    @endforeach
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
                <h3 class="card-title">{{ $title }} List  -  {{ $subjectiveQuestions->total() }} results found</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th style="width: 50px">#</th>
                      <th>Note</th>
                      <th>Created By</th>
                      <th>Updated By(AESCENDING)</th>
                      <th>Last Updated at</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                <tbody>
                 @foreach($subjectiveQuestions as $key=>$subjectiveQuestion)
                   <tr id="table-row-{{ $subjectiveQuestion->id }}">
                       <td>{{ ($subjectiveQuestions->currentpage()-1) * $subjectiveQuestions->perpage() + $key + 1 }}</td>
                       <td>{{ strip_tags($subjectiveQuestion->question) }}</td>
                       <td>{{ @$subjectiveQuestion->admin->name }}</td>
                       <td>
                        @if(is_array($subjectiveQuestion->updated_by))
                            @foreach($subjectiveQuestion->updated_by as $id)
                              {{ \App\Models\Admin::where(['id' => $id])->pluck('name')->first() }},
                            @endforeach
                        @else
                          -
                        @endif
                       </td>
                       <td>{{ $subjectiveQuestion->updated_at }}</td>
                       <td>{{ $subjectiveQuestion->status }}</td>
                   </tr>
                 @endforeach
                </tbody>


                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
               {{ $subjectiveQuestions->links() }}
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

