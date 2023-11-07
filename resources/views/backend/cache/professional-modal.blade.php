<div class="modal fade appropriate-occupation-wrapper" id="appropriate-occupation" tabindex="-1" role="dialog" aria-labelledby="appropriate-occupation" aria-modal="true">
        <div class="modal-dialog class-dialog modal-dialog-centered" role="document">
            <div class="modal-content class-content-wrapper">
                <a href="javascript:void(0)" class="close btn-close" data-dismiss="modal" aria-label="Close"></a>
                 <div class="class-text-content">
                    <div class="class-heading">
                        <h2>Select appropriate occupation</h2>  
                    </div>
                   <div class="bug-form-wrapper">
                        <div class="card shadow rounded border-0">
                            <div class="card-body py-5 px-5">
                                <div class="custom-form">
                                    <div id="professional-error" class="alert alert-danger" style="display:none"></div>
                                    <div id="professional-success" class="alert alert-success" style="display:none"></div>
                                    <form name="professional" action="#">
                                        <!-- Select One -->
                                        <div class="occupation-selection-wrapper">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="occupation-radio">
                                                        <input type="radio" name="profession" id="occupation_student" value="Student" checked>
                                                        <label for="occupation_student" class="occup_radio">Student</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="occupation-radio">
                                                        <input type="radio" name="profession" id="occupation_teacher" value="Teacher">
                                                        <label for="occupation_teacher"  class="occup_radio">Teacher</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 occup_grade-wrapper occup-wrapper">
                                                <div class="form-group position-relative">
                                                    <label>Choose your Grade</label>
                                                    <select class="form-control select2" style="width: 100%" multiple="multiple" name="grades" id="grade-wrapper" data-select2-id="grade-wrapper" tabindex="-1" aria-hidden="true">
                                                    @foreach($categories as $category)
                                                        <option value="{{ $category->id}}">{{ $category->name }}</option>
                                                    @endforeach
                                                    </select>
                                                </div>

                                            </div>
                                            <div class="col-md-12 occup_subject-wrapper occup-wrapper" style="display: none">
                                                <div class="form-group position-relative">
                                                     <label>Choose your Subject</label>
                                                    <select class="form-control select2" style="width: 100%" multiple="multiple" name="subjects" id="courses-wrapper" data-select2-id="courses-wrapper" tabindex="-1" aria-hidden="true">

                                                    @foreach($categories as $category)
                                                      <optgroup label="{{ $category->name }}">
                                                        @foreach($category->subjects as $subject)
                                                        <option value="{{ $subject->id}}">{!! $subject->name !!}</option>
                                                        @endforeach
                                                      </optgroup>
                                                     
                                                    @endforeach
                                                    </select>
                                            
                                                </div>                
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group position-relative">
                                                    <label>Phone No. :</label>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone fea icon-sm icons"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                                                    <input name="phone_no" id="number" type="number" class="form-control pl-5" placeholder="Phone :" value="">
                                                    
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-12 d-flex mt-3">
                                                <input type="submit" id="submit" name="send" class="submitBnt btn btn-primary btn-block" value="Submit" style="width: 150px; margin-right:10px;">
                                                <a href="javascript:void(0)" class="btn btn-register" data-dismiss="modal" >Close</a>
                                            </div>
                                        </div>
                                    </form> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                

            </div>
        </div>
    </div>