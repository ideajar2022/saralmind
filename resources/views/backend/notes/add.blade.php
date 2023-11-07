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
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="{{route('admin.notes')}}">Notes</a></li>
              <li class="breadcrumb-item active">Add Notes</li>
            </ol>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-8">
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Add New Notes</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form">
                <div class="card-body">
                  <div class="form-group">
                    <label for="institution_name">Title</label>
                    <input type="text" class="form-control" id="institution_name">
                  </div>

                  
                  <div class="form-group editor_wrapper">
                    <label>Description</label>
                    <textarea class="form-control summer_note" name="editordata"></textarea>
                  </div>
                  <div class="form-group editor_wrapper">
                    <label>Things to remember</label>
                    <textarea class="form-control summer_note" name="editordata"></textarea>
                  </div>
                  <div class="form-group editor_wrapper">
                    <label>Summary</label>
                    <textarea class="form-control summer_note" name="editordata"></textarea>
                  </div>
                  <div class="form-group editor_wrapper">
                    <label>Meta Description</label>
                    <textarea class="form-control summer_note" name="editordata"></textarea>
                  </div>
                  
                  <!-- <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                  </div> -->
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-success">Create Note</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
          <div class="col-md-4">
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Institution & Program</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Choose Institution</label>
                  <select class="form-control select2" style="width: 100%;">
                    <option selected="selected">Alabama</option>
                    <option>Alaska</option>
                    <option>California</option>
                    <option>Delaware</option>
                    <option>Tennessee</option>
                    <option>Texas</option>
                    <option>Washington</option>
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Choose Program</label>
                  <select class="form-control select2" style="width: 100%;">
                    <option selected="selected">Alabama</option>
                    <option>Alaska</option>
                    <option>California</option>
                    <option>Delaware</option>
                    <option>Tennessee</option>
                    <option>Texas</option>
                    <option>Washington</option>
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Choose Class</label>
                  <select class="form-control select2" style="width: 100%;">
                    <option selected="selected">Alabama</option>
                    <option>Alaska</option>
                    <option>California</option>
                    <option>Delaware</option>
                    <option>Tennessee</option>
                    <option>Texas</option>
                    <option>Washington</option>
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Choose Subject</label>
                  <select class="form-control select2" style="width: 100%;">
                    <option selected="selected">Alabama</option>
                    <option>Alaska</option>
                    <option>California</option>
                    <option>Delaware</option>
                    <option>Tennessee</option>
                    <option>Texas</option>
                    <option>Washington</option>
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Choose Unit</label>
                  <select class="form-control select2" style="width: 100%;">
                    <option selected="selected">Alabama</option>
                    <option>Alaska</option>
                    <option>California</option>
                    <option>Delaware</option>
                    <option>Tennessee</option>
                    <option>Texas</option>
                    <option>Washington</option>
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Choose Lesson</label>
                  <select class="form-control select2" style="width: 100%;">
                    <option selected="selected">Alabama</option>
                    <option>Alaska</option>
                    <option>California</option>
                    <option>Delaware</option>
                    <option>Tennessee</option>
                    <option>Texas</option>
                    <option>Washington</option>
                  </select>
                </div>
              </div>
              
              <div class="col-md-12">
                  <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="checkbox" id="customCheckbox2" checked="">
                    <label for="customCheckbox2" class="custom-control-label">Disable Unit</label>
                  </div>
                </div>
              </div>
            </div>
            </div>
            <div class="quick-info">
                <div class="card card-widget widget-user-2 status-wrapper">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-warning">
                  <h5>Brief Information</h5>
                </div>
                <div class="card-footer p-0">
                  <ul class="nav flex-column">
                    <li class="nav-item">
                      <p>Institution Status: <strong>Unapproved</strong></p>
                    </li>
                    <li class="nav-item">
                      <p>Updated on: <strong>Never</strong> </p>
                    </li>
                  </ul>
                </div>
              </div>
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Featured Image</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">

                    <div class="upload-wrap">
                      <label for="01" class="head"><div class="uploadpreview 01"></div>
                        <p><i class="fa fa-upload"></i> Upload Featured Image</p>
                        <input id="01" type="file" accept="image/*">
                      </label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <!--/.col (right) -->
        </div>
      </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection