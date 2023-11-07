@extends('frontend.app')
@section('meta')
<meta name="title" content="BLOGS | Saralmind') }}" />
<meta name="description"
    content="Blogs, Events, Stories and News by Saralmind" />
<meta name="keywords" content="Nepal online education portal, Nepal education, nepal curriculum, Saralmind, Nepal Nursing Council, Study in Australia, Nursing Notes for Students" />
<title>BLOGS | {{ config('app.name', 'Saralmind') }}</title>
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
                                <li class="breadcrumb-item active" aria-current="page">
                                    <a href="">{{ isset($category)?$category->name:'Blog' }}</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    
                    <div class="inner-title">
                        <h1>{{ isset($category)?$category->name:'Blog' }}</h1>
                        <p>Our Recent Blog {{ isset($category)?'in '.$category->name:'' }}</p>
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

<section class="blog-main-wrapper common-gap">
    <div class="container">
        <div class="row">
            @include('frontend.partials.blog-sidebar')
            <div class="col-md-9 col-12">
                <div class="row">
                    @foreach($blogs as $blog)
                    <div class="news-block col-12">
                        <div class="inner-box d-flex">
                            <div class="image">
                                <a href="{{ route('blog.show',$blog->slug) }}">
                                    <img src="{{ $blog->image_url }}" alt="{{ $blog->name }}">
                                </a>
                            </div>
                            <div class="lower-content">
                                <div class="post-date">{{ $blog->created_at->format('j F, Y') }}</div>
                                <h6>
                                    <a href="{{ route('blog.show',$blog->slug) }}">
                                        {{ $blog->title }}
                                    </a>
                                </h6>
                                <div class="clearfix">
                                    <div class="author">
                                        <div class="image">
                                            <img src="{{url('frontend/img/new-img/author-3.jpg')}}" alt="">
                                        </div>
                                        <span class="name">By {{ @$blog->admin->name }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="styled-pagination">
                            {{ $blogs->links() }}
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