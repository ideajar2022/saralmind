<div class="container-fluid">
  <div class="row">
    <!-- left column -->
    <div class="col-md-8">
      <div class="card card-secondary">
        <div class="card-header">
          <h3 class="card-title">
            {{ request()->route()->named('note.create') ? 'Add New':'Update' }}  Note</h3>

            <a href="{{ $live_preview_link }}" target="_blank">View Note</a>
            
        </div>
        <!-- /.card-header -->
          <div class="card-body">
            <div class="form-group">
              <label for="title">Title</label>
              
              <input type="text" name="title" class="form-control" id="title" value="{{ old('title',$note->title) }}">
              @if ($errors->has('title'))
                <span class="text-red" role="alert">
                    <strong>{{ $errors->first('title') }}</strong>
                </span>
              @endif
            </div>
            <div class="form-group">
              <label for="slug">Slug</label>
              <input type="text" name="slug" class="form-control" id="slug" value="{{ old('slug',$note->slug) }}">
              @if ($errors->has('slug'))
                <span class="text-red" role="alert">
                    <strong>{{ $errors->first('slug') }}</strong>
                </span>
              @endif
            </div>
            <div class="form-group editor_wrapper">
              <label>Description</label>
              <textarea class="form-control simpleEditor" name="description">{{ old('description',$note->description) }}</textarea>
               @if ($errors->has('description'))
                <span class="text-red" role="alert">
                    <strong>{{ $errors->first('description') }}</strong>
                </span>
              @endif
            </div>

            <div class="form-group editor_wrapper">
              <label>Description Backup - Don't Change it</label>
              <textarea class="form-control" id="advanceEditorNew" name="description_temp">{{ old('description_temp',$note->description_temp) }}</textarea>
               
            </div>

            <div class="form-group editor_wrapper">
              <label>Things to remember</label>
              <textarea class="form-control simpleEditor" name="things_to_remember">{{ old('things_to_remember',$note->things_to_remember) }}</textarea>
               @if ($errors->has('things_to_remember'))
                <span class="text-red" role="alert">
                    <strong>{{ $errors->first('things_to_remember') }}</strong>
                </span>
              @endif
            </div>
            <div class="form-group editor_wrapper">
              <label>Summary</label>
              <textarea class="form-control simpleEditor" name="summary">{{ old('summary',$note->summary) }}</textarea>
              @if ($errors->has('summary'))
                <span class="text-red" role="alert">
                    <strong>{{ $errors->first('summary') }}</strong>
                </span>
              @endif
            </div>

            <div class="form-group editor_wrapper">
              <label>Summary Backup - Don't change it</label>
              <textarea class="form-control simpleEditor">{{ strip_tags($note->summary_temp) }}</textarea>
            </div>    

            <div class="form-group editor_wrapper">
              <label>Meta Keyword</label>
              <textarea class="form-control simpleEditor" name="meta_keyword">{{ old('meta_keyword',$note->meta_keyword) }}</textarea>
              @if ($errors->has('meta_keyword'))
                <span class="text-red" role="alert">
                    <strong>{{ $errors->first('meta_keyword') }}</strong>
                </span>
              @endif
            </div>

            <div class="form-group editor_wrapper">
              <label>Meta Description</label>
              <textarea class="form-control simpleEditor" name="meta_description">{{ old('meta_description',$note->meta_description) }}</textarea>
              @if ($errors->has('meta_description'))
                <span class="text-red" role="alert">
                    <strong>{{ $errors->first('meta_description') }}</strong>
                </span>
              @endif
            </div>

            <div class="form-group">
              <label for="order">Order</label>
              <input type="number" name="order" class="form-control" value="{{ old('order',$note->order) }}" step="0.01" min="0.00" max="100.00">
              @if ($errors->has('order'))
                <span class="text-red" role="alert">
                    <strong>{{ $errors->first('order') }}</strong>
                </span>
              @endif
            </div>

            <div class="widget-user-header bg-secondary">
              <h5>Note Status</h5>
            </div>
            <div class="card-footer p-0">
              <ul class="nav flex-column">
                <li class="nav-item">
                   <div class="col-md-12">
                    <div class="form-group">
                      <label>Choose Status</label>
                      <select class="form-control select2" name="status">
                        <option selected disabled value="">Select Status</option>
                        <option value="APPROVED" @if(old('status',$note->status)==='APPROVED') selected @endif>APPROVED</option>
                        <option value="UNAPPROVED" @if(old('status',$note->status)==='UNAPPROVED') selected @endif>  UNAPPROVED
                        </option>
                        <option value="DISAPPROVED" @if(old('status',$note->status)==='DISAPPROVED') selected @endif>DISAPPROVED</option>
                        <option value="IN REVIEW" @if(old('status',$note->status)==='IN REVIEW') selected @endif>IN REVIEW</option>
                        <option value="FOR QUILLBOT" @if(old('status',$note->status)==='FOR QUILLBOT') selected @endif>FOR QUILLBOT</option>

                        <option value="Looks Like Incomplete" @if(old('status',$note->status)==='Looks Like Incomplete') selected @endif>Looks Like Incomplete</option>
                        @foreach($admins as $admin)
                          <option value="{{ $admin->name }}" @if(old('status',$note->status)===$admin->name) selected @endif>{{ $admin->name }}</option>
                        @endforeach

                        <option value="BCA" @if(old('status',$note->status)==='BCA') selected @endif>BCA</option>

                        <option value="IMAGE REQUIRED" @if(old('status',$note->status)==='IMAGE REQUIRED') selected @endif>IMAGE REQUIRED</option>
                      </select>
                      @if ($errors->has('status'))
                          <span class="text-red" role="alert">
                             <strong>{{ $errors->first('status') }}</strong>
                          </span>
                      @endif
                    </div>
                  </div>
                  
                </li>
                @if(request()->route()->named('note.edit'))
                <li class="nav-item">
                  <p>Updated on: <strong><abbr class="timeago" title=""></abbr></strong> 
                    
                  </p>
                </li>
                @endif
              </ul>
            </div>

          </div>
          <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <div class="col-md-4">
      <div class="card card-secondary">
        <div class="card-header">
          <h3 class="card-title">Syllabus</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
        <div class="row">

        <div class="col-md-6">
          <div class="form-group">
            <label>Choose Program</label>
            <select name="program_id" class="form-control select2" style="width: 100%;">
              <option selected disabled value="">Select</option>
              @foreach($programs as $key=>$program)
              <option value="{{ $key }}" @if(old('program_id',$note->program_id)==$key) selected @endif>{{ $program }}</option>
              @endforeach
            </select>
             @if ($errors->has('program_id'))
                <span class="text-red" role="alert">
                   <strong>{{ $errors->first('program_id') }}</strong>
                </span>
            @endif
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label>Choose Faculty</label>
            <select name="faculty_id" class="form-control select2" style="width: 100%;">
              <option selected value="">Select</option>
            </select>
             @if ($errors->has('faculty_id'))
                <span class="text-red" role="alert">
                   <strong>{{ $errors->first('faculty_id') }}</strong>
                </span>
            @endif
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label>Choose Grade</label>
            <select name="grade_id" class="form-control select2" style="width: 100%;">
              <option selected value="">Select</option>
            </select>
             @if ($errors->has('grade_id'))
                <span class="text-red" role="alert">
                   <strong>{{ $errors->first('grade_id') }}</strong>
                </span>
            @endif
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label>Choose Subject</label>
            <select name="subject_id" class="form-control select2" style="width: 100%;">
              <option selected value="">Select</option>
            </select>
             @if ($errors->has('subject_id'))
                <span class="text-red" role="alert">
                   <strong>{{ $errors->first('subject_id') }}</strong>
                </span>
            @endif
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>Choose Unit</label>
            <select name="unit_id" class="form-control select2" style="width: 100%;">
              <option selected value="">Select Unit</option>
            </select>
            @if ($errors->has('unit_id'))
                <span class="text-red" role="alert">
                   <strong>{{ $errors->first('unit_id') }}</strong>
                </span>
            @endif
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <label>Choose Lesson</label>
            <select name="lesson_id" class="form-control select2" style="width: 100%;">
              <option selected value="">Select Lesson</option>
            </select>
             @if ($errors->has('lesson_id'))
                <span class="text-red" role="alert">
                   <strong>{{ $errors->first('lesson_id') }}</strong>
                </span>
            @endif
          </div>
        </div>
      
        </div>
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
                  <input id="01" type="file" name="file" accept="image/png, image/jpeg, image/jpg">
                  <input type="hidden" name="image" value="{{ old('image',$note->image) }}" >
                </label>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="live-content-wr">
        <div class="quick-info live-preview">
          <div class="card card-widget widget-user-2 status-wrapper">
          <div class="close-wrapp">
            <i data-feather="x-circle" class="close"></i>
          </div>
          <div class="widget-user-header bg-warning">
            <h5>Live Preview: Description</h5>
          </div>
          <div class="card-body">
            <div id="preview" class="content-here">
              
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
