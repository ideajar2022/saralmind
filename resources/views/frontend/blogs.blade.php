@extends('frontend.app')

@section('content')
<section class="inner-header"  style="background-image: url({{asset('frontend/img/inner-banner_bg.svg')}}),linear-gradient(359.93deg,#ddeffd -44.48%,#e5f1fb 102.88%);">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="inner-title">
                    <h2>Blogs</h2>
                </div>
                <div class="page-next">
                    <nav aria-label="breadcrumb" class="d-inline-block">
                        <ul class="breadcrumb bg-white rounded shadow mb-0">
                            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Blogs</li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-md-3">
                <div class="ads-wrapper">
                    <!-- Ads HERE -->
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
                            <input type="submit" value="Search Results" class="btn btn-global-search">
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
            <div class="news-block col-lg-4 col-md-6 col-sm-12">
                <div class="inner-box">
                    <div class="image">
                        <a href="{{url('blogs/blog-single')}}"><img src="{{asset('frontend/img/news-1.jpg')}}" alt=""></a>
                    </div>
                    <div class="lower-content">
                        <h6><a href="{{url('blogs/blog-single')}}">Top aide possible contender forced to resign over creepy.</a></h6>
                        <div class="post-date">20 March, 2018</div>
                        <div class="clearfix">
                            <div class="author">
                                <div class="image"><img src="{{url('frontend/img/author-3.jpg')}}" alt=""></div>
                                <span class="name">by Jhon Kenedy</span>
                            </div>
                            <div class="share-wpr">
                                <ul class="post-info">
                                    <li><a href="javascript:void(0)"><i data-feather="message-circle"></i></a></li>
                                    <li><a href="javascript:void(0)"><i data-feather="share-2"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="news-block col-lg-4 col-md-6 col-sm-12">
                <div class="inner-box">
                    <div class="image">
                        <a href="{{url('blogs/blog-single')}}"><img src="{{asset('frontend/img/news-1.jpg')}}" alt=""></a>
                    </div>
                    <div class="lower-content">
                        <h6><a href="{{url('blogs/blog-single')}}">Top aide possible contender forced to resign over creepy.</a></h6>
                        <div class="post-date">20 March, 2018</div>
                        <div class="clearfix">
                            <div class="author">
                                <div class="image"><img src="{{url('frontend/img/author-3.jpg')}}" alt=""></div>
                                <span class="name">by Jhon Kenedy</span>
                            </div>
                            <div class="share-wpr">
                                <ul class="post-info">
                                    <li><a href="javascript:void(0)"><i data-feather="message-circle"></i></a></li>
                                    <li><a href="javascript:void(0)"><i data-feather="share-2"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="news-block col-lg-4 col-md-6 col-sm-12">
                <div class="inner-box">
                    <div class="image">
                        <a href="{{url('blogs/blog-single')}}"><img src="{{asset('frontend/img/news-1.jpg')}}" alt=""></a>
                    </div>
                    <div class="lower-content">
                        <h6><a href="{{url('blogs/blog-single')}}">Top aide possible contender forced to resign over creepy.</a></h6>
                        <div class="post-date">20 March, 2018</div>
                        <div class="clearfix">
                            <div class="author">
                                <div class="image"><img src="{{url('frontend/img/author-3.jpg')}}" alt=""></div>
                                <span class="name">by Jhon Kenedy</span>
                            </div>
                            <div class="share-wpr">
                                <ul class="post-info">
                                    <li><a href="javascript:void(0)"><i data-feather="message-circle"></i></a></li>
                                    <li><a href="javascript:void(0)"><i data-feather="share-2"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="news-block col-lg-4 col-md-6 col-sm-12">
                <div class="inner-box">
                    <div class="image">
                        <a href="{{url('blogs/blog-single')}}"><img src="{{asset('frontend/img/news-1.jpg')}}" alt=""></a>
                    </div>
                    <div class="lower-content">
                        <h6><a href="{{url('blogs/blog-single')}}">Top aide possible contender forced to resign over creepy.</a></h6>
                        <div class="post-date">20 March, 2018</div>
                        <div class="clearfix">
                            <div class="author">
                                <div class="image"><img src="{{url('frontend/img/author-3.jpg')}}" alt=""></div>
                                <span class="name">by Jhon Kenedy</span>
                            </div>
                            <div class="share-wpr">
                                <ul class="post-info">
                                    <li><a href="javascript:void(0)"><i data-feather="message-circle"></i></a></li>
                                    <li><a href="javascript:void(0)"><i data-feather="share-2"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="news-block col-lg-4 col-md-6 col-sm-12">
                <div class="inner-box">
                    <div class="image">
                        <a href="{{url('/blog/single')}}"><img src="{{url('frontend/img/news-1.jpg')}}" alt=""></a>
                    </div>
                    <div class="lower-content">
                        <h6><a href="{{url('/blog/single')}}">Top aide possible contender forced to resign over creepy.</a></h6>
                        <div class="post-date">20 March, 2018</div>
                        <div class="clearfix">
                            <div class="author">
                                <div class="image"><img src="{{url('frontend/img/author-3.jpg')}}" alt=""></div>
                                <span class="name">by Jhon Kenedy</span>
                            </div>
                            <div class="share-wpr">
                                <ul class="post-info">
                                    <li><a href="javascript:void(0)"><i data-feather="message-circle"></i></a></li>
                                    <li><a href="javascript:void(0)"><i data-feather="share-2"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="mt-5 styled-pagination text-center">
                    <ul class="clearfix">
                        <li class="prev">
                            <a href="#">
                                <i data-feather="chevron-left"></i>
                            </a>
                        </li>
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li class="active"><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li class="next">
                            <a href="#">
                                <i data-feather="chevron-right"></i>
                            </a>
                        </li>
                    </ul>
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
