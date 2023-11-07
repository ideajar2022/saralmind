<div class="row">
    <div class="col-md-12">
      <div class="card card-primary">
        <div class="card-body">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputProgram {{ $errors->has('program_id')? 'has-danger': '' }}">Program<span class="help-block" style="color: #b30000">&nbsp;* </span></label>
              <select class="form-control select2" name="program_id">
                <option selected disabled value="">Select Program</option>
                @foreach($programs as $key=>$program)
                <option value="{{ $key }}" @if(old('program_id',@$subjectiveQuestion->note->program_id)==$key) selected @endif>{{ $program }}</option>
                @endforeach
              </select>
              @if ($errors->has('program_id'))
                  <span class="text-red" role="alert">
                     <strong>{{ $errors->first('program_id') }}</strong>
                  </span>
              @endif
            </div>

            <div class="form-group col-md-6">
              <label for="inputClass {{ $errors->has('faculty_id')? 'has-danger': '' }}">Faculty<span class="help-block" style="color: #b30000">&nbsp;* </span></label>
              <select class="form-control select2" name="faculty_id">
                <option selected value="">Select Faculty</option>
               
              </select>
              @if ($errors->has('faculty_id'))
                  <span class="text-red" role="alert">
                     <strong>{{ $errors->first('faculty_id') }}</strong>
                  </span>
              @endif
            </div>

            <div class="form-group col-md-6">
              <label for="inputClass {{ $errors->has('grade_id')? 'has-danger': '' }}">Grade<span class="help-block" style="color: #b30000">&nbsp;* </span></label>
              <select class="form-control select2" name="grade_id">
                <option selected value="">Select Grade</option>
               
              </select>
              @if ($errors->has('grade_id'))
                  <span class="text-red" role="alert">
                     <strong>{{ $errors->first('grade_id') }}</strong>
                  </span>
              @endif
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputSubject {{ $errors->has('subject_id')? 'has-danger': '' }}">Subject<span class="help-block" style="color: #b30000">&nbsp;* </span></label>
              <select class="form-control select2" name="subject_id">
                <option selected value="">Select Subject</option>
               
              </select>
              @if ($errors->has('subject_id'))
                  <span class="text-red" role="alert">
                     <strong>{{ $errors->first('subject_id') }}</strong>
                  </span>
              @endif
            </div>
            <div class="form-group col-md-6">
              <label for="inputUnit {{ $errors->has('unit_id')? 'has-danger': '' }}">Unit</label>
              <select class="form-control select2" name="unit_id">
                <option selected value="">Select Unit</option>
               
              </select>
              @if ($errors->has('unit_id'))
                  <span class="text-red" role="alert">
                     <strong>{{ $errors->first('unit_id') }}</strong>
                  </span>
              @endif
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputLesson {{ $errors->has('lesson_id')? 'has-danger': '' }}">Lesson<span class="help-block" style="color: #b30000">&nbsp;* </span></label>
              <select class="form-control select2" name="lesson_id">
                <option selected value="">Select Lesson</option>
               
              </select>
              @if ($errors->has('lesson_id'))
                  <span class="text-red" role="alert">
                     <strong>{{ $errors->first('lesson_id') }}</strong>
                  </span>
              @endif
            </div>

            <div class="form-group col-md-6">
              <label for="inputNote {{ $errors->has('note_id')? 'has-danger': '' }}">Note<span class="help-block" style="color: #b30000">&nbsp;* </span></label>
              <select class="form-control select2" name="note_id">
                <option selected value="">Select Note</option>
              </select>
              @if ($errors->has('note_id'))
                  <span class="text-red" role="alert">
                     <strong>{{ $errors->first('note_id') }}</strong>
                  </span>
              @endif
            </div>
          </div>
     
          <div class="form-group {{ $errors->has('question')? 'has-danger': '' }}">
          <label for="question" class="control-label">Question <span class="help-block" style="color: #b30000">&nbsp;* </span></label>
            <textarea name="question" placeholder="Question" class="form-control simpleEditor" rows="4">{{ old('question',$subjectiveQuestion->question) }}</textarea>
            @if ($errors->has('question'))
                <span class="text-red" role="alert">
                   <strong>{{ $errors->first('question') }}</strong>
                </span>
            @endif
          </div>
  
          <div class="form-group {{ $errors->has('answer')? 'has-danger': '' }}">
            <label for="answer" class="control-label">Answer <span class="help-block" style="color: #b30000">&nbsp;* </span></label>
              <textarea name="answer" placeholder="Answer" class="form-control simpleEditor" rows="4">{{ old('answer',$subjectiveQuestion->answer) }}</textarea>
              @if ($errors->has('answer'))
                  <span class="text-red" role="alert">
                     <strong>{{ $errors->first('answer') }}</strong>
                  </span>
              @endif
            </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputStatus {{ $errors->has('type')? 'has-danger': '' }}">Type<span class="help-block" style="color: #b30000">&nbsp;* </span></label>
              <select class="form-control select2" name="type">
                <option selected disabled value="">Select Type</option>
                <option value="VERYSHORT" @if(old('type',$subjectiveQuestion->type)==='VERYSHORT') selected @endif>VERYSHORT</option>
                <option value="SHORT" @if(old('type',$subjectiveQuestion->type)==='SHORT') selected @endif>  SHORT
                </option>
                <option value="LONG" @if(old('type',$subjectiveQuestion->type)==='LONG') selected @endif>LONG</option>
                <option value="VERYLONG" @if(old('type',$subjectiveQuestion->type)==='VERYLONG') selected @endif>VERYLONG</option>
              </select>
              @if ($errors->has('type'))
                  <span class="text-red" role="alert">
                     <strong>{{ $errors->first('type') }}</strong>
                  </span>
              @endif
            </div>

            <div class="form-group col-md-6">
              <label for="inputStatus {{ $errors->has('difficulty_level')? 'has-danger': '' }}">Difficulty Level<span class="help-block" style="color: #b30000">&nbsp;* </span></label>
              <select class="form-control select2" name="difficulty_level">
                <option selected disabled value="">Select Difficulty Level</option>
                <option value="EASY" @if(old('difficulty_level',$subjectiveQuestion->difficulty_level)==='EASY') selected @endif>EASY</option>
                <option value="MEDIUM" @if(old('difficulty_level',$subjectiveQuestion->difficulty_level)==='MEDIUM') selected @endif>MEDIUM
                </option>
                <option value="HARD" @if(old('difficulty_level',$subjectiveQuestion->difficulty_level)==='HARD') selected @endif>HARD</option>
              </select>
              @if ($errors->has('difficulty_level'))
                  <span class="text-red" role="alert">
                     <strong>{{ $errors->first('difficulty_level') }}</strong>
                  </span>
              @endif
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6 {{ $errors->has('marks')? 'has-danger': '' }}">
              <label for="marks">Marks</label>
                <input type="text" name="marks" value="{{ old('marks',$subjectiveQuestion->marks) }}" placeholder="Marks" class="form-control">
                @if ($errors->has('marks'))
                    <span class="text-red" role="alert">
                        <strong>{{ $errors->first('marks') }}</strong>
                    </span>
                @endif
            </div>
    
            <div class="form-group col-md-6">
              <label for="inputStatus {{ $errors->has('status')? 'has-danger': '' }}">Status<span class="help-block" style="color: #b30000">&nbsp;* </span></label>
              <select class="form-control select2" name="status">
                <option selected disabled value="">Select Status</option>
                <option value="APPROVED" @if(old('status',$subjectiveQuestion->status)==='APPROVED') selected @endif>APPROVED</option>
                <option value="UNAPPROVED" @if(old('status',$subjectiveQuestion->status)==='UNAPPROVED') selected @endif>  UNAPPROVED
                </option>
                <option value="DISAPPROVED" @if(old('status',$subjectiveQuestion->status)==='DISAPPROVED') selected @endif>DISAPPROVED</option>
                <option value="IN REVIEW" @if(old('status',$subjectiveQuestion->status)==='IN REVIEW') selected @endif>IN REVIEW</option>
                <option value="FOR QUILLBOT" @if(old('status',$subjectiveQuestion->status)==='FOR QUILLBOT') selected @endif>FOR QUILLBOT</option>

                <option value="Looks Like Incomplete" @if(old('status',$subjectiveQuestion->status)==='Looks Like Incomplete') selected @endif>Looks Like Incomplete</option>
                @foreach($admins as $admin)
                  <option value="{{ $admin->name }}">{{ $admin->name }}</option>
                @endforeach
              </select>
              @if ($errors->has('status'))
                  <span class="text-red" role="alert">
                     <strong>{{ $errors->first('status') }}</strong>
                  </span>
              @endif
            </div>
          </div>
