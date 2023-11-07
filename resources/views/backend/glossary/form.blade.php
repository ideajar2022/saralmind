<div class="row">
    <div class="col-md-12">
      <div class="card card-primary">
        <div class="card-body">
            <div class="form-group {{ $errors->has('word')? 'has-danger': '' }}">
              <label for="word">Word
                <span class="help-block" style="color: #b30000">&nbsp;* </span></label>
                 <textarea name="word" placeholder="Meaning in English" class="form-control ">{{ old('word',$glossary->word) }}</textarea>
                @if ($errors->has('word'))
                    <span class="text-red" role="alert">
                        <strong>{{ $errors->first('word') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group {{ $errors->has('meaning_english')? 'has-danger': '' }}">
              <label for="title">Meaning in English
                <span class="help-block" style="color: #b30000">&nbsp;* </span></label>
                <textarea name="meaning_english" placeholder="Meaning in English" class="form-control ">{{ old('meaning_english',$glossary->meaning_english) }}</textarea>
                @if ($errors->has('meaning_english'))
                    <span class="text-red" role="alert">
                        <strong>{{ $errors->first('meaning_english') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group {{ $errors->has('meaning_nepali')? 'has-danger': '' }}">
              <label for="title">Meaning in Nepali
                <span class="help-block" style="color: #b30000">&nbsp;* </span></label>
                <textarea name="meaning_nepali" placeholder="Meaning in Nepali" class="form-control ">{{ old('meaning_nepali',$glossary->meaning_nepali) }}</textarea>
                @if ($errors->has('meaning_nepali'))
                    <span class="text-red" role="alert">
                        <strong>{{ $errors->first('meaning_nepali') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
              <label for="inputStatus {{ $errors->has('status')? 'has-danger': '' }}">Status<span class="help-block" style="color: #b30000">&nbsp;* </span></label>
              <select class="form-control select2" name="status">
                <option selected disabled value="">Select Status</option>
                <option value="APPROVED" @if(old('status',$glossary->status)==='APPROVED') selected @endif>APPROVED</option>
                <option value="UNAPPROVED" @if(old('status',$glossary->status)==='UNAPPROVED') selected @endif>  UNAPPROVED
                </option>
                <option value="DISAPPROVED" @if(old('status',$glossary->status)==='DISAPPROVED') selected @endif>DISAPPROVED</option>
              </select>
              @if ($errors->has('status'))
                  <span class="text-red" role="alert">
                     <strong>{{ $errors->first('status') }}</strong>
                  </span>
              @endif
            </div>



