<footer class="footer bg-light">
    <div class="container">
        <div class="row">

            <div class="col-lg-4 col-12">
                <a class="logo-footer text-dark" href="{{ url()->to('/') }}">Saralmind.com</a>
                <p>Let's Stay Connected. We are active in Social Media Platforms below</p>
                <ul class="list-unstyled social-icon">
                    <li class="list-inline-item">
                        <a href="https://www.facebook.com/saralmind" target="_blank">
                            <i data-feather="facebook"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="https://www.tiktok.com/@saralmind" target="_blank">
                            <i data-feather="twitter"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="https://www.linkedin.com/in/adhip-poudyal-648575102/" target="_blank">
                            <i data-feather="linkedin"></i>
                        </a>
                    </li>

                </ul>

                <a class="google-play-wrapper" href="https://play.google.com/store/apps/details?id=com.saralmind.saralmind" target="_blank">
                    <img src="{{asset('frontend/img/google_play.png')}}" class="img-fluid"
                alt="">
                </a>

            </div>

            <div class="col-lg-2 col-md-4 col-12">
                <h4 class="text-dark footer-head">Quicks Links</h4>
                <ul class="list-unstyled footer-list">
                    <!-- <li><a href="{{url('/about')}}" class="text-muted"><i class="fa fa-angle-right"></i> About us</a></li> -->
                    <!--  <li><a href="{{url('/classes')}}" class="text-muted"><i class="fa fa-angle-right"></i> Classes</a></li> -->
                    <li><a href="{{url('/blogs')}}" class="text-muted"><i class="fa fa-angle-right"></i> Visit our
                            Blogs</a></li>
			<!-- <li><a href="https://mypersonalfinance.info" class="text-muted"><i class="fa fa-angle-right"></i> Warranties for Cars</a></li> -->

                </ul>
            </div>

            <div class="col-lg-3 col-md-4 col-12">
                <h4 class="text-dark footer-head">Related Links</h4>
                <ul class="list-unstyled footer-list">
                    <li><a href="{{ url('/terms-of-services') }}" class="text-muted"><i class="fa fa-angle-right"></i>
                            Terms of Services</a></li>
                    <li><a href="{{url('/privacy-policy')}}" class="text-muted"><i class="fa fa-angle-right"></i>
                            Privacy Policy</a></li>
                    <li><a href="{{url('/contact-us')}}" class="text-muted"><i class="fa fa-angle-right"></i> Contact
                            Us</a></li>
                    @auth
                    <li><a href="#report-bug" data-toggle="modal" data-target="#report-bug" class="text-muted"><i
                                class="fa fa-angle-right"></i> Report bugs</a></li>
                    @endauth

                </ul>
            </div>
            <div class="col-lg-3 col-md-4 col-12">
                <h4 class="text-dark footer-head">Newsletter</h4>
                <p>This is just a start. Subscribe us by submitting your email to recieve our latest updates at your
                    inbox.</p>
                <form id="subscription-form" name="subscription-form">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="foot-subscribe foot-white form-group">
                                <label class="text-muted">Enter your email address <span
                                        class="text-danger">*</span></label>
                                <div id="subscribe-error" class="alert alert-danger" style="display:none"></div>
                                <div id="subscribe-success" class="alert alert-success" style="display:none"></div>
                                <div class="subscribe-input">
                                    <i class="fa fa-envelope-o"></i>
                                    <input type="email" name="email" id="emailsubscribe"
                                        class="form-control bg-light border pl-5 rounded"
                                        placeholder="Enter email id here " required="">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <input type="submit" id="subscribe" name="send" class="btn btn-primary btn-block"
                                value="Subscribe">
                        </div>
                    </div>
                </form>
            </div>

            <!--             <div class="col-lg-3 col-md-4 col-12">
                <h4 class="text-dark footer-head">Newsletter</h4>
                <p>This is just a start. Subscribe us by submitting your email to recieve our latest updates at your inbox.</p>
                <form id="subscription-form" name="subscription-form">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="foot-subscribe foot-white form-group">
                                <label class="text-muted">Enter your email address <span class="text-danger">*</span></label>
                                <div id="subscribe-error" class="alert alert-danger" style="display:none"></div>
                                <div id="subscribe-success" class="alert alert-success" style="display:none"></div>
                                <div class="subscribe-input">
                                    <i class="fa fa-envelope-o"></i>
                                    <input type="email" name="email" id="emailsubscribe" class="form-control bg-light border pl-5 rounded" placeholder="Enter email id here " required="">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <input type="submit" id="subscribe" name="send" class="btn btn-primary btn-block" value="Subscribe">
                        </div>
                    </div>
                </form>
            </div> -->
        </div>
    </div>

</footer>
<div class="copy_right-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-right">
                <p>&copy; 2021 Saralmind. All Rights Reserved.</p>
            </div>
        </div>
    </div>
</div>

<script>
    // let makuraDiv = document.createElement("script");
    // makuraDiv.src = "https://perfaccess.com/js/makuraDiv.js";
    // let makuraPlugin = document.createElement("script");
    // makuraPlugin.src = "https://perfaccess.com/js/makuraPlugin.js"
    // document.body.appendChild(makuraDiv);
    // document.body.appendChild(makuraPlugin);
</script>

<a href="javascript:void(0)" id="scrollUp"><i data-feather="chevrons-up"></i></a>
@auth
<div class="modal fade report-bug-wrapper" id="report-bug" tabindex="-1" role="dialog" aria-labelledby="report-bug"
    aria-modal="true">
    <div class="modal-dialog class-dialog modal-dialog-centered" role="document">
        <div class="modal-content class-content-wrapper">
            <a href="javascript:void(0)" class="close btn-close" data-dismiss="modal" aria-label="Close"></a>
            <div class="class-text-content">
                <div class="class-heading">
                    <div class="icon-wrapper">
                        <img src="{{asset('frontend/img/icons/bugs.svg')}}" alt="image" class="img-fluid">
                    </div>
                    <h2>Report a bug</h2>
                </div>
                <div class="bug-form-wrapper">
                    <div class="card shadow rounded border-0">
                        <div class="card-body py-5">
                            <div class="custom-form">
                                <div id="report-bug-error" class="alert alert-danger" style="display:none"></div>
                                <div id="report-bug-success" class="alert alert-success" style="display:none"></div>
                                <form action="#" name="report-bug">
                                    <div class="row">

                                        <div class="col-md-12">
                                            <div class="form-group position-relative">
                                                <label>URL</label>
                                                <i data-feather="phone-outgoing" class="icon-sm icons"></i>
                                                <input name="url" id="url" type="text" class="form-control pl-5"
                                                    placeholder="URL :">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group position-relative">
                                                <label>Report Bug</label>
                                                <i data-feather="message-circle" class="icon-sm icons"></i>
                                                <textarea name="bug" id="bug-report" rows="4" class="form-control pl-5"
                                                    placeholder="Report Bug :"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 text-center">
                                            <input type="submit" id="submit" name="send"
                                                class="submitBnt btn btn-danger btn-block" value="Report Bug">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <img src="{{asset('frontend/img/icons/bugs.svg')}}" class="bug-bg-img" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@if(is_null(auth()->user()->type))
{!! cache('professional_modal_view') !!}
@endif
@endauth