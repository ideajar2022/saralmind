@extends('frontend.app')

@section('content')
<section class="inner-header"  style="background-image: url({{asset('frontend/img/inner-banner_bg.svg')}}),linear-gradient(359.93deg,#ddeffd -44.48%,#e5f1fb 102.88%);">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="inner-title">
                    <h2>Top aide possible contender forced to resign over creepy.</h2>
                </div>
                <div class="page-next">
                    <nav aria-label="breadcrumb" class="d-inline-block">
                        <ul class="breadcrumb bg-white rounded shadow mb-0">
                            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{url('/blogs')}}">Blogs</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Top aide possible contender forced to resign over creepy</li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-md-3">
                <div class="ads-wrapper">

                </div>
            </div>
        </div>
    </div>
</section>
<section class="global-search_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="{{url('/search-results')}}">
                    <div class="global-search-inner">
                        <div class="form-group course-keyword">
                            <input type="text" class="form-control" placeholder="Enter your keywords">
                        </div>
                        <div class="form-group course-category">
                            <select name="category" id="category" class="select2 form-control">
                                <option value="all_category">All Category</option>
                                <option value="school_level">School Level</option>
                                <option value="bachelors_level">Bachelors Level</option>
                                <option value="videos">Videos</option>
                                <option value="practice_test">Practice Test</option>
                            </select>
                        </div>
                        <div class="global-search-btn">
                            <input type="submit" value="Search" class="btn btn-global-search">
                            <i data-feather="search"></i>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<section class="common-gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-12 col-sm-12">
                <div class="content-side">
					<div class="blog-single">
						<div class="inner-box mb-5">
							<div class="banner-image">
								<img src="{{asset('frontend/img/covid-19.jpg')}}" alt="">
							</div>
							<div class="lower-content">
								<div class="post-date">20 March, 2018</div>
								<h6>COVID-19 pandemic has changed education forever</h6>
								<div class="text">
									<p>While countries are at different points in their COVID-19 infection rates, worldwide there are currently more than 1.2 billion children in 186 countries affected by school closures due to the pandemic. In Denmark, children up to the age of 11 are returning to nurseries and schools after initially closing on 12 March, but in South Korea students are responding to roll calls from their teachers online.</p>
									<p>Eveniet in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at seds eros sed et accumsan et iusto odio dignissim. Temporibus autem quibusdam et aut officiis.</p>
									<p>cookies are set through this site to recognise your repeat visits and preferences, serve more vant ads, facilitate social sharing, and to violanalyse traffic.Others wondered if the hand of od was at work over New York, heralding perhaps a new Pope, or the moment when Evangeli cals say true believers will be swept up, or "raptured", to heaven. When these electrons recombine with the excited atoms, returning them to their starting energy state, light is emitted.</p>
									<p>When these electrons recombine with the excited atoms, returning them to their starting energy state, light is emitted. The colour of the light emitted depends on the type of atoms involved.</p>
									<blockquote>
										<div class="quote-icon"><img src="{{asset('frontend/img/icons/quote_icon.svg')}}" alt=""></div>
										<div class="quote-text">What sort of men would think it is acceptable to subject a young girl to this level of brutality and violence? an attack like this in ourcommunities and we must all work together.</div>
									</blockquote>
								</div>
								<div class="post-share-option clearfix">
									<div class="pull-left">
                                        <div class="author">
                                            <div class="image">
                                                <img src="{{url('frontend/img/author-3.jpg')}}" alt="">
                                            </div>
                                            <span class="name">by Kendra B. Mukhia</span>
                                        </div>
									</div>
									<div class="pull-right">
										<ul class="post-info">
                                            <li><a href="javascript:void(0)"><i data-feather="message-circle"></i></a></li>
                                            <li><a href="javascript:void(0)"><i data-feather="share-2"></i></a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>


						<div class="comments">
							<h3>4 Comments</h3>
							<ul class="comments__list">
								<li>
									<div class="comment">
										<div class="comment__avatar">
											<img alt="Image" src="{{url('frontend/img/author-3.jpg')}}">
										</div>
										<div class="comment__body">
											<h5 class="type--fine-print">Anne Brady</h5>
											<div class="comment__meta">
												<span>10th May 2016</span>
												<a href="#">Reply</a>
											</div>
											<p>
												Affordances food-truck SpaceTeam unicorn disrupt integrate viral pair programming big data pitch deck intuitive intuitive prototype long shadow. Responsive hacker intuitive driven
											</p>
										</div>
									</div>

									<div class="comment">
										<div class="comment__avatar">
											<img alt="Image" src="{{url('frontend/img/author-3.jpg')}}">
										</div>
										<div class="comment__body">
											<h5 class="type--fine-print">Jacob Sims</h5>
											<div class="comment__meta">
												<span>10th May 2016</span>
												<a href="#">Reply</a>
											</div>
											<p>
												Prototype intuitive intuitive thought leader personas parallax paradigm long shadow engaging unicorn SpaceTeam fund ideate paradigm.
											</p>
										</div>
									</div>

								</li>
								<li>
									<div class="comment">
										<div class="comment__avatar">
											<img alt="Image" src="{{url('frontend/img/author-3.jpg')}}">
										</div>
										<div class="comment__body">
											<h5 class="type--fine-print">Kelly Dewitt</h5>
											<div class="comment__meta">
												<span>11th May 2016</span>
												<a href="#">Reply</a>
											</div>
											<p>
												Responsive hacker intuitive driven waterfall is so 2000 and late intuitive cortado bootstrapping venture capital. Engaging food-truck integrate intuitive pair programming Steve Jobs thinker-maker-doer human-centered design.
											</p>
											<p>
												Affordances food-truck SpaceTeam unicorn disrupt integrate viral pair programming big data pitch deck intuitive intuitive prototype long shadow. Responsive hacker intuitive driven
											</p>
										</div>
									</div>

								</li>
								<li>
									<div class="comment">
										<div class="comment__avatar">
											<img alt="Image" src="{{url('frontend/img/author-3.jpg')}}">
										</div>
										<div class="comment__body">
											<h5 class="type--fine-print">Luke Smith</h5>
											<div class="comment__meta">
												<span>11th May 2016</span>
												<a href="#">Reply</a>
											</div>
											<p>
												Unicorn disrupt integrate viral pair programming big data pitch deck intuitive intuitive prototype long shadow. Responsive hacker intuitive driven
											</p>
										</div>
									</div>

								</li>
							</ul>
						</div>
						<div class="card shadow rounded border-0 mt-4">
                            <div class="card-body">
                                <h5 class="card-title mb-0">Leave A Comment :</h5>

                                <form class="mt-3">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group position-relative">
                                                <label>Your Comment</label>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-circle fea icon-sm icons"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg>
                                                <textarea id="message" placeholder="Your Comment" rows="5" name="message" class="form-control pl-5" required=""></textarea>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group position-relative">
                                                <label>Name <span class="text-danger">*</span></label>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user fea icon-sm icons"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                                <input id="name" name="name" type="text" placeholder="Name" class="form-control pl-5" required="">
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group position-relative">
                                                <label>Your Email <span class="text-danger">*</span></label>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail fea icon-sm icons"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                                                <input id="email" type="email" placeholder="Email" name="email" class="form-control pl-5" required="">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="send">
                                            <button type="submit" class="btn btn-primary btn-block">Send Message</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

					</div>
				</div>
            </div>
            <div class="col-lg-3">
				<div class="card border-0 sidebar sticky-bar rounded shadow">
					<div class="card-body">
						<div class="widget mb-4 pb-2">
							<h4 class="widget-title">Catagories</h4>
							<ul class="list-unstyled mt-4 mb-0 blog-catagories">
								<li><a href="jvascript:void(0)">Finance</a> <span class="float-right">13</span></li>
								<li><a href="jvascript:void(0)">Business</a> <span class="float-right">09</span></li>
								<li><a href="jvascript:void(0)">Blog</a> <span class="float-right">18</span></li>
								<li><a href="jvascript:void(0)">Corporate</a> <span class="float-right">20</span></li>
								<li><a href="jvascript:void(0)">Investment</a> <span class="float-right">22</span></li>
							</ul>
						</div>
						<div class="widget mb-4 pb-2">
							<h4 class="widget-title">Recent Post</h4>
							<div class="mt-4">
								<div class="clearfix post-recent">
									<div class="post-recent-thumb float-left"> <a href="jvascript:void(0)"> <img alt="img" src="{{asset('frontend/img/banner_1.jpg')}}" class="img-fluid rounded"></a></div>
									<div class="post-recent-content float-left"><a href="jvascript:void(0)">Consultant Business</a><span class="text-muted mt-2">15th June, 2019</span></div>
								</div>
								<div class="clearfix post-recent">
									<div class="post-recent-thumb float-left"> <a href="jvascript:void(0)"> <img alt="img" src="{{asset('frontend/img/banner_1.jpg')}}" class="img-fluid rounded"></a></div>
									<div class="post-recent-content float-left"><a href="jvascript:void(0)">Look On The Glorious Balance</a> <span class="text-muted mt-2">15th June, 2019</span></div>
								</div>
								<div class="clearfix post-recent">
									<div class="post-recent-thumb float-left"> <a href="jvascript:void(0)"> <img alt="img" src="{{asset('frontend/img/banner_1.jpg')}}" class="img-fluid rounded"></a></div>
									<div class="post-recent-content float-left"><a href="jvascript:void(0)">Research Financial.</a> <span class="text-muted mt-2">15th June, 2019</span></div>
								</div>
							</div>
						</div>
						<div class="widget mb-4 pb-2">
							<h4 class="widget-title">Tags Cloud</h4>
							<div class="tagcloud mt-4">
								<a href="jvascript:void(0)" class="rounded">Business</a>
								<a href="jvascript:void(0)" class="rounded">Finance</a>
								<a href="jvascript:void(0)" class="rounded">Marketing</a>
								<a href="jvascript:void(0)" class="rounded">Fashion</a>
								<a href="jvascript:void(0)" class="rounded">Bride</a>
								<a href="jvascript:void(0)" class="rounded">Lifestyle</a>
								<a href="jvascript:void(0)" class="rounded">Travel</a>
								<a href="jvascript:void(0)" class="rounded">Beauty</a>
								<a href="jvascript:void(0)" class="rounded">Video</a>
								<a href="jvascript:void(0)" class="rounded">Audio</a>
							</div>
						</div>
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
