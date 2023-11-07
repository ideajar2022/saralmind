@extends('frontend.app')
@section('meta')
<meta property="og:image" content="{{ $blog->image_url }}">
<meta name="title" content="{!! strip_tags($blog->meta_title) !!}" />
<meta name="description" content="{!! substr(strip_tags($blog->meta_description), 0, 150) !!}" />
<meta name="keywords" content="{!! strip_tags($blog->meta_keyword) !!}" />
<title>
    {!! strip_tags($blog->title) !!} | {{ config('app.name', 'Saralmind') }}
</title>
@endsection
@section('content')
@include('frontend.partials.search')
<section class="inner-header">
    <div class="container">
        <div class="row">
            <div class="d-flex align-items-center inner-header-wrapper">
                <div class="col-md-9 col-12">
                    <div class="page-next">
                        <nav aria-label="breadcrumb" class="d-inline-block">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{url('/blogs')}}">Blogs</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $blog->title }}</li>
                            </ul>
                        </nav>
                    </div>
                    <div class="inner-title">
                        <h1>{{ $blog->title }}</h1>
                        <p>{{ $blog->title }}</p>
                    </div>
                </div>
                <div class="col-md-3 col-12">
                    <div class="top-svg-wrapper">
                        <img src="{{asset('frontend/img/new-img/study.svg')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="common-gap category-list-wrap">
    <div class="container">
        <div class="row">
            @include('frontend.partials.blog-sidebar')
            <!-- class removed and added in this section -->
            <div class="col-md-9 col-12">
                <div class="content-side">
                    <div class="blog-single">
                        <div class="inner-box mb-5">
                            <div class="banner-image">
                                <img src="{{ $blog->image_url }}" alt="">
                            </div>
                            <div class="lower-content">
                                <div class="post-date">{{ @$blog->created_at->format('j F, Y') }}</div>
                                <h6>{{@$blog->title}}</h6>
                                <div class="text">
                                    {!! $blog->description !!}
                                </div>
                                <div class="post-share-option clearfix">
                                    <div class="pull-left">
                                        <div class="author">
                                            <div class="image">
                                                <img src="{{url('frontend/img/new-img/author-3.jpg')}}" alt="">
                                            </div>
                                            <span class="name">By {{ $blog->admin->name }}</span>
                                        </div>
                                    </div>
                                    <!-- <div class="pull-right">
                                        <ul class="post-info">
                                            <li><a href="javascript:void(0)"><i data-feather="message-circle"></i></a></li>
                                            <li><a href="javascript:void(0)"><i data-feather="share-2"></i></a></li>
                                        </ul>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                        <!-- <div class="comments">
                            <div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#configurator" data-numposts="5" data-width="100%"></div>
                            
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