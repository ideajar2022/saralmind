<div class="col-md-3 col-12">
    <div class="card border-0 sidebar sticky-bar rounded">
        <div class="card-body">
            <div class="widget category mb-4 pb-2">
                <h4 class="widget-title">Catagories</h4>
                <ul class="list-unstyled mt-4 mb-0 blog-catagories">
                    @foreach($categories as $category)
                    <li>
                        <a href="{{ route('blog.category',$category->slug) }}">
                            {{ $category->name }}
                        </a>
                        <span class="float-right">{{ $category->blogs()->count() }}</span>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="widget recent mt-4 mb-4 pb-2">
                <h4 class="widget-title">Recent Post</h4>
                <div class="mt-4">
                    @foreach($recents as $recent)
                    <a href="{{route('blog.show',$recent->slug)}}">
                        <div class="clearfix post-recent d-flex">
                            <img alt="ICT Training for Principals and Teachers in Kanchan Rural Municipality"
                                src="{{ $recent->image_url }}" class="img-fluid">
                            <div class="post-recent-content">
                                <p>
                                    {{ $recent->title }}
                                </p>
                                <span class="text-muted mt-2">{{ @$recent->created_at->format('j F, Y') }}</span>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>