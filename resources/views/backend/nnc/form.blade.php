

<div class="row">
  <div class="form-group {{ $errors->has('question')? 'has-danger': '' }}">
      <label for="question">Question
      <span class="help-block" style="color: #b30000">&nbsp;* </span></label>
      <input type="text" name="question" value="{{ old('question',$question->question) }}" placeholder="Question" class="form-control">
      @if ($errors->has('question'))
      <span class="text-red" role="alert">
        <strong>{{ $errors->first('question') }}</strong>
      </span>
      @endif
  </div>
</div>


<div class="row">
  <div class="col-md-12">
    <div class="card card-primary">
      <div class="card-body">
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputProgram {{ $errors->has('program_id')? 'has-danger': '' }}">Category<span class="help-block" style="color: #b30000">&nbsp;* </span></label>
            <select class="form-control select2" name="program_id">
              <option selected disabled value="">Select Category</option>
              @foreach($categories as $key=>$category)
              <option value="{{ $key }}" @if(old('category_id',$question->category_id)==$key) selected @endif>{{ $category }}</option>
              @endforeach
            </select>
            @if ($errors->has('category_id'))
            <span class="text-red" role="alert">
             <strong>{{ $errors->first('category_id') }}</strong>
           </span>
           @endif
          </div>
        <div>  
      <div>
    </div>
  </div>
</div> 

<div class="row">
  <div class="col-md-6">
    <div class="form-group {{ $errors->has('correct_answer')? 'has-danger': '' }}">
      <label for="title">Correct Answer
        <span class="help-block" style="color: #b30000">&nbsp;* </span></label>
        <input type="text" name="correct_answer" value="{{ old('correct_answer',$question->correct_answer) }}" placeholder="Correct Answer" class="form-control">
        @if ($errors->has('correct_answer'))
        <span class="text-red" role="alert">
          <strong>{{ $errors->first('correct_answer') }}</strong>
        </span>
        @endif
    </div>
  </div>  

  <div class="col-md-6">
    <div class="form-group {{ $errors->has('option_1')? 'has-danger': '' }}">
      <label for="title">Option 1
        <span class="help-block" style="color: #b30000">&nbsp;* </span></label>
        <input type="text" name="option_1" value="{{ old('option_1',$question->option_1) }}" placeholder="Option 1" class="form-control">
        @if ($errors->has('option_1'))
        <span class="text-red" role="alert">
          <strong>{{ $errors->first('option_1') }}</strong>
        </span>
        @endif
    </div>
  </div>  
</div>

<div class="row">
  <div class="col-md-6">
    <div class="form-group {{ $errors->has('option_2')? 'has-danger': '' }}">
      <label for="title">Option 2
        <span class="help-block" style="color: #b30000">&nbsp;* </span></label>
        <input type="text" name="option_2" value="{{ old('option_2',$question->option_2) }}" placeholder="Option 2" class="form-control">
        @if ($errors->has('option_2'))
        <span class="text-red" role="alert">
          <strong>{{ $errors->first('option_2') }}</strong>
        </span>
        @endif
    </div>
  </div>  

  <div class="col-md-6">
    <div class="form-group {{ $errors->has('option_3')? 'has-danger': '' }}">
      <label for="title">Option 3
        <span class="help-block" style="color: #b30000">&nbsp;* </span></label>
        <input type="text" name="option_3" value="{{ old('option_3',$question->option_3) }}" placeholder="Option 3" class="form-control">
        @if ($errors->has('option_3'))
        <span class="text-red" role="alert">
          <strong>{{ $errors->first('option_3') }}</strong>
        </span>
        @endif
    </div>
  </div>  
</div>

<div class="row">
  <div class="col-md-6">
    <div class="form-group {{ $errors->has('option_4')? 'has-danger': '' }}">
      <label for="title">Option 4
        <span class="help-block" style="color: #b30000">&nbsp;* </span></label>
        <input type="text" name="option_4" value="{{ old('option_4',$question->option_4) }}" placeholder="Option 4" class="form-control">
        @if ($errors->has('option_4'))
        <span class="text-red" role="alert">
          <strong>{{ $errors->first('option_4') }}</strong>
        </span>
        @endif
    </div>
  </div>  

  <div class="col-md-6">
    <div class="form-group {{ $errors->has('option_5')? 'has-danger': '' }}">
      <label for="title">Option 5
        <span class="help-block" style="color: #b30000">&nbsp;* </span></label>
        <input type="text" name="option_5" value="{{ old('option_5',$question->option_5) }}" placeholder="Option 5" class="form-control">
        @if ($errors->has('option_5'))
        <span class="text-red" role="alert">
          <strong>{{ $errors->first('option_5') }}</strong>
        </span>
        @endif
    </div>
  </div>  
</div>

<div class="row">
   <div class="form-group {{ $errors->has('explanation')? 'has-danger': '' }}">
     <label for="explanation" class="control-label">Explanation</label>
     <textarea name="explanation" placeholder="Explanation" class="form-control simpleEditor" rows="4">{{ old('explanation',$question->explanation) }}</textarea>
     @if ($errors->has('explanation'))
     <span class="text-red" role="alert">
      <strong>{{ $errors->first('explanation') }}</strong>
    </span>
    @endif
  </div>
</div>
