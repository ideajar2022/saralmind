<?php

namespace App\Http\Controllers\Backend;

use App\Models\BlogCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BlogCategory\StoreBlogCategoryRequest;
use App\Http\Requests\BlogCategory\UpdateBlogCategoryRequest;

class BlogCategoriesController extends Controller
{
	private $blogCategory;

    public function __construct(BlogCategory $blogCategory)
    {
        $this->middleware('auth:admin');
        $this->blogCategory  = $blogCategory;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	if(!auth()->user()->can('view-blog-category'))
            abort(403, 'Unauthorized action.');

        $blogCategory        = $this->blogCategory;

        if (request()->has('q')) {
            $name           = request('q');
            $blogCategory        = $blogCategory->where('name','LIKE',"%{$name}%");
        }
        $blogCategories           = $blogCategory->latest()->paginate(50)->appends([
            'q'                 => request('name'),
            'status'            => request('status'),
        ]);

        return view('backend.blog-category.index',compact('blogCategories'))->with('title','Blog Categories');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	if(!auth()->user()->can('create-blog-category'))
            abort(403, 'Unauthorized action.');

        $blogCategory        = $this->blogCategory;
        return view('backend.blog-category.create',compact('blogCategory'))->with('title','Create Blog Category');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogCategoryRequest $request)
    {
    	if(!auth()->user()->can('create-blog-category'))
            abort(403, 'Unauthorized action.');

        $this->blogCategory->name            = $request->name;
        $this->blogCategory->slug            = $request->slug;
        $this->blogCategory->status          = $request->status;
        $this->blogCategory->created_by      = auth()->id();
    
        if( $this->blogCategory->save() ){
            session()->flash('success','Blog Category Created');
            return redirect()->route('blog-category.index');
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
    	if(!auth()->user()->can('edit-blog-category'))
            abort(403, 'Unauthorized action.');

        $blogCategory    = $this->blogCategory->find($id);
        return view('backend.blog-category.edit',compact('blogCategory'))->with('title','Edit Blog Category');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBlogCategoryRequest $request, $id)
    {
    	if(!auth()->user()->can('edit-blog-category'))
            abort(403, 'Unauthorized action.');

        $blogCategory                 = $this->blogCategory->find($id);
        $blogCategory->name           = $request->name;
        $blogCategory->slug           = $request->slug;
        $blogCategory->status         = $request->status;
   
        if( $blogCategory->save() ){
            session()->flash('success', 'Blog Category Updated');
            return redirect()->route('blog-category.index');
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
    	if(!auth()->user()->can('delete-blog-category'))
            abort(403, 'Unauthorized action.');

        $bool = $this->blogCategory->find($id)->delete();
        if ($bool == 1) {
           return response()->json([
                'success' => true,
                'message' => "Blog Category Deleted Successfully",
            ]);
        }
    }

    public function getSoftDeleted()
    {
        if(!auth()->user()->can('view-blog-category'))
            abort(403, 'Unauthorized action.');

        $blogCategory        = $this->blogCategory->onlyTrashed();

        if (request()->has('q')) {
            $name           = request('q');
            $blogCategory        = $blogCategory->where('name','LIKE',"%{$name}%");
        }
        $blogCategories           = $blogCategory->latest()->paginate(50)->appends([
            'q'                 => request('name'),
            'status'            => request('status'),
        ]);

        return view('backend.blog-category.trash',compact('blogCategories'))->with('title','Soft Deleted Blog Categories');
    }

    public function restore($id)
    {
        $bool = $this->blogCategory->onlyTrashed()->find($id)->restore();

        if ($bool == 1) {
           return response()->json([
                'success' => true,
                'message' => "Blog Category restore successfully",
            ]);
        }
    }

    public function permanentDelete($id)
    {
        $bool = $this->blogCategory->onlyTrashed()->find($id)->forceDelete();

        if ($bool == 1) {
           return response()->json([
                'success' => true,
                'message' => "Blog Category deleted successfully",
            ]);
        }
    }

}
