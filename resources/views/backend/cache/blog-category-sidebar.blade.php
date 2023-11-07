 <div class="col-lg-3">
	<div class="card border-0 sidebar sticky-bar rounded shadow">
		<div class="card-body">
			<div class="widget mb-4 pb-2">
				<h4 class="widget-title">Catagories</h4>
				<ul class="list-unstyled mt-4 mb-0 blog-catagories">
				@foreach($categories as $category)
					<li><a href="{{ route('blog.list') }}?category={{$category->slug }}">{{ $category->name }}</a> <span class="float-right">{{ $category->blogs->count() }}</span></li>
				@endforeach
				</ul>
			</div>
			<div class="widget mb-4 pb-2">
				<h4 class="widget-title">Recent Post</h4>
				<div class="mt-4">
				@foreach($recentPosts as $post)
					<div class="clearfix post-recent">
						<div class="post-recent-thumb float-left"> <a href="{{ route('blog.show',$post->slug) }}"> <img alt="{{ $post->title }}" src="{{ $post->image_url }}" class="img-fluid rounded"></a></div>
						<div class="post-recent-content float-left"><a href="{{ route('blog.show',$post->slug) }}">{{ $post->title }}</a><span class="text-muted mt-2">{{ $post->created_at->format('j F, Y') }}</span></div>
					</div>
				@endforeach
				</div>
			</div>
			<!-- <div class="widget mb-4 pb-2">
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
			</div> -->
		</div>
	</div>
</div>