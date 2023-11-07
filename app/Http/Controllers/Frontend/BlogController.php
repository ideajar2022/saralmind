<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogCategory;
use App\Models\Blog;

class BlogController extends Controller
{
    private $blogCategory;
	private $blog;
    public function __construct(BlogCategory $blogCategory, Blog $blog)
    {
        $this->blogCategory     = $blogCategory;
        $this->blog        		= $blog;
    }

    public function index(Request $request)
    {
    	$blog = $this->blog->where(['status'=>'APPROVED'])->with(['category','admin']);
        if (request()->has('category') AND !empty(request('category'))) {
            $category        = request('category');
            $blog      = $blog->whereHas('category', function($q) use ($category) {
                            $q->where('slug', $category);
                        });
        }

        $blogs = $blog->latest()->paginate(6);
        $recents = $blog->latest()->limit(2)->get();
        $categories = $this->blogCategory->limit(7)->get();
    	return view('frontend.blog.index',compact('blogs','recents','categories'));
    }

    public function show($slug)
    {
    	$blog = $this->blog->with(['category','admin'])->where(['status'=>'APPROVED','slug'=>$slug])->firstorfail();
        $recents = $this->blog->latest()->limit(2)->get();
        $categories = $this->blogCategory->limit(7)->get();
    	return view('frontend.blog.show',compact('blog','recents','categories'));
    }
    public function category($slug)
    {
        $category = $this->blogCategory->where('slug',$slug)->first();
        if(!$category)
        {
            abort(404);
        }
    	$blogs = $this->blog->with(['category','admin'])->where(['status'=>'APPROVED'])->where('category_id',$category->id)->paginate(6);
        $recents = $this->blog->latest()->limit(2)->get();
        $categories = $this->blogCategory->limit(7)->get();
    	return view('frontend.blog.index',compact('blogs','recents','categories','category'));
    }
}
