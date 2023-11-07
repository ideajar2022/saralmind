<?php

namespace App\Http\Controllers\Backend;

use App\Models\BlogCategory;
use App\Models\Blog;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Blog\StoreBlogRequest;
use App\Http\Requests\Blog\UpdateBlogRequest;

class BlogsController extends Controller
{
    private $category;
	private $blog;

    public function __construct(BlogCategory $category, Blog $blog)
    {
        $this->middleware('auth:admin');
        $this->category     = $category;
        $this->blog         = $blog;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	if(!auth()->user()->can('view-blog'))
            abort(403, 'Unauthorized action.');

        $blog        = $this->blog->with('category');

        if (request()->has('q')) {
            $name           = request('q');
            $blog        = $blog->where('title','LIKE',"%{$name}%");
        }
        if (request()->has('category_id') AND !empty(request('category_id'))) {
            $blog        = $blog->where('category_id',request('category_id'));
        }
        $blogs           = $blog->latest()->paginate(50)->appends([
            'q'                 => request('q'),
            'category_id'       => request('category_id'),
            'status'            => request('status'),
        ]);

        $categories     = $this->category->pluck('name','id');

        return view('backend.blog.index',compact('blogs','categories'))->with('title','Blogs');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	if(!auth()->user()->can('create-blog'))
            abort(403, 'Unauthorized action.');

        $blog           = $this->blog;
        $categories     = $this->category->pluck('name','id');

        return view('backend.blog.create',compact('blog','categories'))->with('title','Create Blog');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogRequest $request)
    {
    	if(!auth()->user()->can('create-blog'))
            abort(403, 'Unauthorized action.');

        $this->blog->title           = $request->title;
        $this->blog->slug            = $request->slug;
        $this->blog->category_id     = $request->category_id;
        $this->blog->image           = $request->image;
        $this->blog->description     = $request->description;
        $this->blog->status          = $request->status;
        $this->blog->created_by      = auth()->id();
        $this->blog->meta_keyword           = $request->meta_keyword;
        $this->blog->meta_title             = $request->meta_title;
        $this->blog->meta_description       = $request->meta_description;
        if( $this->blog->save() ){
            session()->flash('success','Blog Created');
            return redirect()->route('blog.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	if(!auth()->user()->can('edit-blog'))
            abort(403, 'Unauthorized action.');

        $blog           = $this->blog->find($id);
        $categories     = $this->category->pluck('name','id');

        return view('backend.blog.edit',compact('blog','categories'))->with('title','Edit Blog ');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBlogRequest $request, $id)
    {
    	if(!auth()->user()->can('edit-blog'))
            abort(403, 'Unauthorized action.');

        $blog                 = $this->blog->find($id);
        $blog->title          = $request->title;
        $blog->slug           = $request->slug;
        $blog->category_id    = $request->category_id;
        $blog->image          = $request->image;
        $blog->description    = $request->description;
        $blog->status         = $request->status;
        $blog->meta_keyword           = $request->meta_keyword;
        $blog->meta_title             = $request->meta_title;
        $blog->meta_description       = $request->meta_description;
        if( $blog->save() ){
            session()->flash('success', 'Blog  Updated');
            return redirect()->route('blog.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    	if(!auth()->user()->can('delete-blog'))
            abort(403, 'Unauthorized action.');

        $bool = $this->blog->find($id)->delete();
        if ($bool == 1) {
           return response()->json([
                'success' => true,
                'message' => "Blog Deleted Successfully",
            ]);
        }
    }

    public function getSoftDeleted()
    {
        if(!auth()->user()->can('view-blog'))
            abort(403, 'Unauthorized action.');

        $blog        = $this->blog->onlyTrashed()->with('category');

        if (request()->has('q')) {
            $name           = request('q');
            $blog        = $blog->where('title','LIKE',"%{$name}%");
        }
        if (request()->has('category_id') AND !empty(request('category_id'))) {
            $blog        = $blog->where('category_id',request('category_id'));
        }
        $blogs           = $blog->latest()->paginate(50)->appends([
            'q'                 => request('q'),
            'category_id'       => request('category_id'),
            'status'            => request('status'),
        ]);

        $categories     = $this->category->pluck('name','id');

        return view('backend.blog.trash',compact('blogs','categories'))->with('title','Soft Deleted Blog');
    }

    public function restore($id)
    {
        $bool = $this->blog->onlyTrashed()->find($id)->restore();

        if ($bool == 1) {
           return response()->json([
                'success' => true,
                'message' => "Blog restore successfully",
            ]);
        }
    }

    public function permanentDelete($id)
    {
        $bool = $this->blog->onlyTrashed()->find($id)->forceDelete();

        if ($bool == 1) {
           return response()->json([
                'success' => true,
                'message' => "Blog deleted successfully",
            ]);
        }
    }

}
