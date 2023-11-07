@extends('frontend.app')

@section('meta')

<meta name="title" content="Search | Saralmind.com" />
<meta name="description"
    content="You can search saralmind.com from here." />
<meta name="keywords" content="Nepal online education portal, Nepal education, nepal curriculum, Saralmind" />
<title>Search | Saralmind.com</title>
@endsection

@section('content')
<section class="main-search-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="global_search-inner-wrapper">
                    <div class="global_search-input">
                        <form role="search" method="get" action="{{ route('search') }}">
                            <input type="text" name="q" id="s" value="{{ request('q') }}" required=""
                                class="form-control">
                            <button><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                    <div class="search-count">
                        <p><strong style="color:#000;">{{ $notes->total() }}</strong> Results</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="left_gap search_results-wrapper">
                    @foreach($notes as $note)
                    <div class="search_result">
                        <h2><a
                                href="{{ route('note',[$note->program->slug,$note->faculty->slug,$note->grade->slug,$note->subject->slug,$note->lesson->slug,$note->slug]) }}">{{ $note->title }}</a>
                        </h2>
                        {!! Str::limit(strip_tags($note->summary), 500) !!}
                        <a href="{{ route('note',[$note->program->slug,$note->faculty->slug,$note->grade->slug,$note->subject->slug,$note->lesson->slug,$note->slug]) }}"
                            class="read-more">Read More</a>
                        <div class="page-next">
                            <nav aria-label="breadcrumb" class="d-inline-block">
                                <ul class="breadcrumb bg-white mb-0">
                                    <li class="breadcrumb-item"><a
                                            href="{{ route('class',[$note->program->slug,$note->faculty->slug,$note->grade->slug])}}">{{ $note->grade->name }}</a>
                                    </li>
                                    <li class="breadcrumb-item"><a
                                            href="{{ route('syllabus',[$note->program->slug,$note->faculty->slug,$note->grade->slug,$note->subject->slug])}}">{{ $note->subject->name}}</a>
                                    </li>
                                    <li class="breadcrumb-item active"><a
                                            href="{{ route('syllabus',[$note->program->slug,$note->faculty->slug,$note->grade->slug,$note->subject->slug,$note->lesson->slug]) }}">{{ $note->lesson->name }}</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    @endforeach


                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="left_gap search_pagination-wrapper">
                    <p>Page {{ $notes->currentpage() }} of {{ $notes->lastpage() }}</p>
                    @if($notes->lastpage() > $notes->currentpage())
                    <div class="alignright"><a
                            href="{{ route('search')}}?q={{ request('q') }}&page={{ $notes->currentpage()+1 }}">Next
                            Page &gt;</a>
                    </div>
                    @endif
                    @if( $notes->currentpage()!=1 && $notes->currentpage() == $notes->lastpage())
                    <div class="alignright"><a
                            href="{{ route('search')}}?q={{ request('q') }}&page={{ $notes->currentpage()-1 }}">&lt;
                            Previous Page</a>
                    </div>
                    @endif

                </div>

            </div>
        </div>
    </div>
</section>

@endsection @section('extra-js')
<script type="text/javascript">
</script>
@endsection