
<section class="error-wrapper bg-home d-flex align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <img src="{{asset('frontend/img/404.png')}}" class="img-fluid" alt="">
            <div class="col-lg-8 col-md-12 text-center">
                <!-- <img src="" class="img-fluid" alt=""> -->
                <div class="expression">Page Not Found !!</div>
                <div class="mb-4 error-page">The page you are looking for doesn't exist.</div>
                <!-- <p class="text-muted para-desc mx-auto">Looks like something went wrong on our end. Head back to what are were craving for in <span class="text-primary font-weight-bold">Saralmind</span>.</p> -->
            </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <a href="{{url('/')}}" class="btn btn-primary mt-4 ml-2">Go To Home</a>
            </div>
        </div>
    </div>
</section>
<section class="bg-gray">
    <div class="container">
        <div class="extra-links-wrapper common-gap">    
            <div class="row">
                <div class="col-md-12 mb-2">
                    <h3>Quick links</h3>
                </div>
            @foreach($grades as $grade)
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="key-service p-3 mb-4 rounded shadow bg-white">
                        <div class="courses-list">
                            <h4 class="mb-3">
                                <a href="{{ route('class',[$grade->program->slug,$grade->faculty->slug,$grade->slug]) }}">{{ $grade->name }}</a>
                            </h4>
                            <ul class="list-unstyled">
                            @foreach($grade->subjects as $subject)
                                <li><a href="{{ route('syllabus',[$grade->program->slug,$grade->faculty->slug,$grade->slug,$subject->slug]) }}">{{ $subject->name }}</a></li>
                            @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
            
            </div>
        </div>
    </div>
</section>

