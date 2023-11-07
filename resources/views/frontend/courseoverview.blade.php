@extends('frontend.app')

@section('meta')
<meta name="title" content="Courses | SARALMIND" />
<meta name="description"
    content="" />
<meta name="keywords" content="Nepal online education portal, Nepal education, nepal curriculum, about Saralmind" />
<title>Courses | SARALMIND</title>
@endsection

@section('content')
<section class="faculty-wrapper">
    <div class="container">
        <div class="row">
            @foreach($faculties as $faculty)
            @if($faculty->slug!="high-school-class-8-to-12")
            <a href="{{ route('faculty',[$faculty->program->slug,$faculty->slug])}}" class="col-lg-4 my-5 inner-faculty-wrapper">
                    <div class="icon-wrapper">
                        <img style="height:100%; width:100%;" src="{{ $faculty->image_url }}" alt="{{ $faculty->name }}">
                    </div>
                    <h3>{{$faculty->name}}</h3>
            </a>
            @endif
            @endforeach

            <a href="{{ route('nnc-exam-home')}}" class="col-lg-4 my-5 inner-faculty-wrapper">
                    <div class="icon-wrapper">
                        <img style="height:100%; width:100%;" src="{{ asset('img/grade_images/nursing-council.png') }}">
                    </div>
                    <h3>Nursing Council Exam</h3>
            </a>
        </div>
    </div>
</section>


@endsection

@section('extra-js')
<script type="text/javascript">
</script>
@endsection