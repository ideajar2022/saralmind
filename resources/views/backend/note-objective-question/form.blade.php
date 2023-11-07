<div class="row">
    <div class="col-md-12">
      <div class="card card-primary">
        <div class="card-body">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputProgram {{ $errors->has('program_id')? 'has-danger': '' }}">Program<span class="help-block" style="color: #b30000">&nbsp;* </span></label>
              <select class="form-control select2" name="program_id" style="width: 100%;">
                <option selected disabled value="">Select Program</option>
                @foreach($programs as $key=>$program)
                <option value="{{ $key }}" @if(old('program_id',@$objectiveQuestion->note->program_id)==$key) selected @endif>{{ $program }}</option>
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
              <label for="inputClass {{ $errors->has('grade_id')? 'has-danger': '' }}">Class<span class="help-block" style="color: #b30000">&nbsp;* </span></label>
              <select class="form-control select2" name="grade_id">
                <option selected value="">Select Class</option>
               
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
              <textarea name="question" placeholder="Question" class="form-control simpleEditor" rows="4">{{ old('question',$objectiveQuestion->question) }}</textarea>
              @if ($errors->has('question'))
                  <span class="text-red" role="alert">
                     <strong>{{ $errors->first('question') }}</strong>
                  </span>
              @endif
            </div>

  
          <div class="form-group {{ $errors->has('correct_answer')? 'has-danger': '' }}">
            <label for="correct_answer" class="control-label">Correct Answer <span class="help-block" style="color: #b30000">&nbsp;* </span></label>
              <textarea name="correct_answer" placeholder="Correct Answer" class="form-control simpleEditor" rows="4">{{ old('correct_answer',$objectiveQuestion->correct_answer) }}</textarea>
              @if ($errors->has('correct_answer'))
                  <span class="text-red" role="alert">
                     <strong>{{ $errors->first('correct_answer') }}</strong>
                  </span>
              @endif
            </div>
          <div class="form-row">
            <div class="form-group col-md-6 {{ $errors->has('option_1')? 'has-danger': '' }}">
            <label for="option_1" class="control-label">Option 1 <span class="help-block" style="color: #b30000">&nbsp;* </span></label>
              <textarea name="option_1" placeholder="Option 1" class="form-control simpleEditor" rows="4">{{ old('option_1',$objectiveQuestion->option_1) }}</textarea>
              @if ($errors->has('option_1'))
                  <span class="text-red" role="alert">
                     <strong>{{ $errors->first('option_1') }}</strong>
                  </span>
              @endif
            </div>
             <div class="form-group col-md-6 {{ $errors->has('option_2')? 'has-danger': '' }}">
            <label for="option_2" class="control-label">Option 2 <span class="help-block" style="color: #b30000">&nbsp;* </span></label>
              <textarea name="option_2" placeholder="Option 2" class="form-control simpleEditor" rows="4">{{ old('option_2',$objectiveQuestion->option_2) }}</textarea>
              @if ($errors->has('option_2'))
                  <span class="text-red" role="alert">
                     <strong>{{ $errors->first('option_2') }}</strong>
                  </span>
              @endif
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6 {{ $errors->has('option_3')? 'has-danger': '' }}">
              <label for="option_3" class="control-label">Option 3 <span class="help-block" style="color: #b30000">&nbsp;* </span></label>
                <textarea name="option_3" placeholder="Option 3" class="form-control simpleEditor" rows="4">{{ old('option_3',$objectiveQuestion->option_3) }}</textarea>
                @if ($errors->has('option_3'))
                    <span class="text-red" role="alert">
                       <strong>{{ $errors->first('option_3') }}</strong>
                    </span>
                @endif
              </div>
              <div class="form-group col-md-6 {{ $errors->has('option_4')? 'has-danger': '' }}">
              <label for="option_4" class="control-label">Option 4</label>
                <textarea name="option_4" placeholder="Option 4" class="form-control simpleEditor" rows="4">{{ old('option_4',$objectiveQuestion->option_4) }}</textarea>
                @if ($errors->has('option_4'))
                    <span class="text-red" role="alert">
                       <strong>{{ $errors->first('option_4') }}</strong>
                    </span>
                @endif
              </div>
            </div>
             <div class="form-group {{ $errors->has('explanation')? 'has-danger': '' }}">
            <label for="explanation" class="control-label">Explanation</label>
              <textarea name="explanation" placeholder="Explanation" class="form-control simpleEditor" rows="4">{{ old('explanation',$objectiveQuestion->explanation) }}</textarea>
              @if ($errors->has('explanation'))
                  <span class="text-red" role="alert">
                     <strong>{{ $errors->first('explanation') }}</strong>
                  </span>
              @endif
            </div>
            
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputDifficultyLevel {{ $errors->has('difficulty_level')? 'has-danger': '' }}">Difficulty Level<span class="help-block" style="color: #b30000">&nbsp;* </span></label>
              <select class="form-control select2" name="difficulty_level">
                <option selected disabled value="">Select Difficulty Level</option>
                <option value="EASY" @if(old('difficulty_level',$objectiveQuestion->difficulty_level)==='EASY') selected @endif>EASY</option>
                <option value="MEDIUM" @if(old('difficulty_level',$objectiveQuestion->difficulty_level)==='MEDIUM') selected @endif>MEDIUM
                </option>
                <option value="HARD" @if(old('difficulty_level',$objectiveQuestion->difficulty_level)==='HARD') selected @endif>HARD</option>
              </select>
              @if ($errors->has('difficulty_level'))
                  <span class="text-red" role="alert">
                     <strong>{{ $errors->first('difficulty_level') }}</strong>
                  </span>
              @endif
            </div>
    
            <div class="form-group col-md-6">
              <label for="inputStatus {{ $errors->has('status')? 'has-danger': '' }}">Status<span class="help-block" style="color: #b30000">&nbsp;* </span></label>
              <select class="form-control select2" name="status">
                <option selected disabled value="">Select Status</option>
                <option value="APPROVED" @if(old('status',$objectiveQuestion->status)==='APPROVED') selected @endif>APPROVED</option>
                <option value="UNAPPROVED" @if(old('status',$objectiveQuestion->status)==='UNAPPROVED') selected @endif>  UNAPPROVED
                </option>
                <option value="DISAPPROVED" @if(old('status',$objectiveQuestion->status)==='DISAPPROVED') selected @endif>DISAPPROVED</option>
              </select>
              @if ($errors->has('status'))
                  <span class="text-red" role="alert">
                     <strong>{{ $errors->first('status') }}</strong>
                  </span>
              @endif
            </div>
          </div>

