@extends('frontend.app')

@section('content')
<section class="inner-header profile-header"  style="background-image: url({{asset('frontend/img/inner-banner_bg.svg')}}),linear-gradient(359.93deg,#ddeffd -44.48%,#e5f1fb 102.88%);">
</section>

<section class="bg-profile d-table w-100 mb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card border-0 rounded shadow">
                    <div class="card-body">
                        <h5 class="text-md-left">Personal Detail:</h5>
                        <div class="profile-wrapper avatar-upload">
                            <div class="avatar-edit">
                                <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
                                <label for="imageUpload"></label>
                            </div>
                            <div class="avatar-preview">
                                <div id="imagePreview" style="background-image: url({{asset('frontend/img/team_member.jpg')}});">
                                </div>
                            </div>
                        </div>

                        <form action="#">
                            <div class="row mt-4">
                                <div class="col-md-12">
                                    <div class="form-group position-relative">
                                        <label>Full Name</label>
                                        <i data-feather="user" class="icon-sm icons"></i>
                                        <input name="name" id="name" type="text" class="form-control pl-5" placeholder="Full Name :">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group position-relative">
                                        <label>Your Email</label>
                                        <i data-feather="mail" class="icon-sm icons"></i>
                                        <input name="email" id="email" type="email" class="form-control pl-5" placeholder="Your email :">
                                    </div> 
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group position-relative">
                                        <label>Profession</label>
                                        <i data-feather="bookmark" class="icon-sm icons"></i>
                                        <input name="name" id="occupation" type="text" class="form-control pl-5" placeholder="Profession :">
                                    </div> 
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group position-relative">
                                        <label>Description</label>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-circle fea icon-sm icons"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg>
                                        <textarea name="comments" id="comments" rows="4" class="form-control pl-5" placeholder="Description :"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group position-relative">
                                        <label>Phone No. :</label>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone fea icon-sm icons"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                                        <input name="number" id="number" type="number" class="form-control pl-5" placeholder="Phone :">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group position-relative">
                                        <label>Website :</label>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe fea icon-sm icons"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>
                                        <input name="url" id="url" type="url" class="form-control pl-5" placeholder="Url :">
                                    </div>
                                </div>
                                
                                <div class="col-lg-12 mt-3">
                                    <h5>School Info :</h5>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group position-relative">
                                        <label>School Name :</label>
                                        <i data-feather="home" class="icon-sm icons"></i>
                                        <input name="school_name" type="text" class="form-control pl-5" placeholder="School Name :">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group position-relative">
                                        <label>School Address :</label>
                                        <i data-feather="map-pin" class="icon-sm icons"></i>
                                        <input name="school_address" type="text" class="form-control pl-5" placeholder="School Address :">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group position-relative associated_classes-wrapper">
                                        <label>Classes Associated :</label>
                                        <i data-feather="home" class="icon-sm icons"></i>
                                        <select class="form-control select2" multiple="multiple" name="class_option" id="classes">
                                            <option value="grade_6">Grade 6</option>
                                            <option value="grade_7">Grade 7</option>
                                            <option value="grade_8">Grade 8</option>
                                            <option value="grade_9">Grade 9</option>
                                            <option value="grade_10">Grade 10</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12 mt-3">
                                    <h5>Social Media Connections :</h5>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group position-relative">
                                        <label>Facebook :</label>
                                        <i data-feather="facebook" class="icon-sm icons"></i>
                                        <input name="facebook" type="text" class="form-control pl-5" placeholder="URL :">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group position-relative">
                                        <label>Instagram :</label>
                                        <i data-feather="instagram" class="icon-sm icons"></i>
                                        <input name="instagram" type="text" class="form-control pl-5" placeholder="URL :">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group position-relative">
                                        <label>Twitter :</label>
                                        <i data-feather="twitter" class="icon-sm icons"></i>
                                        <input name="twitter" type="text" class="form-control pl-5" placeholder="URL :">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group position-relative">
                                        <label>Youtube :</label>
                                        <i data-feather="youtube" class="icon-sm icons"></i>
                                        <input name="youtube" type="text" class="form-control pl-5" placeholder="URL :">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group position-relative">
                                        <label>GitHub :</label>
                                        <i data-feather="github" class="icon-sm icons"></i>
                                        <input name="github" type="text" class="form-control pl-5" placeholder="URL :">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <input type="submit" id="submit" name="send" class="btn btn-primary" value="Save Changes">
                                </div>
                            </div>
                        </form>

                        
                        <!-- <div class="row">
                            <div class="col-md-6 mt-4 pt-2"> 
                                <h5>Change password :</h5>
                                <form action="#">
                                    <div class="row mt-4">
                                        <div class="col-lg-12">
                                            <div class="form-group position-relative">
                                                <label>Old password :</label>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-key fea icon-sm icons"><path d="M21 2l-2 2m-7.61 7.61a5.5 5.5 0 1 1-7.778 7.778 5.5 5.5 0 0 1 7.777-7.777zm0 0L15.5 7.5m0 0l3 3L22 7l-3-3m-3.5 3.5L19 4"></path></svg>
                                                <input type="password" class="form-control pl-5" placeholder="Old password" required="">
                                            </div>
                                        </div>
    
                                        <div class="col-lg-12">
                                            <div class="form-group position-relative">
                                                <label>New password :</label>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-key fea icon-sm icons"><path d="M21 2l-2 2m-7.61 7.61a5.5 5.5 0 1 1-7.778 7.778 5.5 5.5 0 0 1 7.777-7.777zm0 0L15.5 7.5m0 0l3 3L22 7l-3-3m-3.5 3.5L19 4"></path></svg>
                                                <input type="password" class="form-control pl-5" placeholder="New password" required="">
                                            </div>
                                        </div>
    
                                        <div class="col-lg-12">
                                            <div class="form-group position-relative">
                                                <label>Re-type New password :</label>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-key fea icon-sm icons"><path d="M21 2l-2 2m-7.61 7.61a5.5 5.5 0 1 1-7.778 7.778 5.5 5.5 0 0 1 7.777-7.777zm0 0L15.5 7.5m0 0l3 3L22 7l-3-3m-3.5 3.5L19 4"></path></svg>
                                                <input type="password" class="form-control pl-5" placeholder="Re-type New password" required="">
                                            </div>
                                        </div>
    
                                        <div class="col-lg-12 mt-2 mb-0">
                                            <button class="btn btn-primary">Save password</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('extra-js')
<script type="text/javascript">
</script>
@endsection