<?php

namespace App\Http\Controllers\Backend;

use App\Models\Testimonial;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Testimonial\StoreTestimonialRequest;
use App\Http\Requests\Testimonial\UpdateTestimonialRequest;

class TestimonialsController extends Controller
{
	private $testimonial;
    public function __construct(Testimonial $testimonial)
    {
        $this->middleware('auth:admin');
        $this->testimonial  = $testimonial;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	if(!auth()->user()->can('view-testimonial'))
            abort(403, 'Unauthorized action.');

        $testimonial        = $this->testimonial;

        if (request()->has('q')) {
            $name           = request('q');
            $testimonial        = $testimonial->where('name','LIKE',"%{$name}%");
        }
        if (request()->has('status') AND !empty(request('status'))) {
            $testimonial        = $testimonial->where('status',request('status'));
        }
        $testimonials           = $testimonial->latest()->paginate(50)->appends([
            'q'                 => request('name'),
            'status'            => request('status'),
        ]);

        return view('backend.testimonial.index',compact('testimonials'))->with('title','Testimonials');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	if(!auth()->user()->can('create-testimonial'))
            abort(403, 'Unauthorized action.');

        $testimonial        = $this->testimonial;
        return view('backend.testimonial.create',compact('testimonial'))->with('title','Create Testimonial');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTestimonialRequest $request)
    {
    	if(!auth()->user()->can('create-testimonial'))
            abort(403, 'Unauthorized action.');
       
        $this->testimonial->name            = $request->name;
        $this->testimonial->slug            = $request->slug;
        $this->testimonial->image            = $request->image;
        $this->testimonial->description     = $request->description;
        $this->testimonial->status          = $request->status;
        $this->testimonial->created_by      = auth()->id();
    
        if( $this->testimonial->save() ){
            session()->flash('success','Testimonial Created');
            return redirect()->route('testimonial.index');
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
    	if(!auth()->user()->can('edit-testimonial'))
            abort(403, 'Unauthorized action.');

        $testimonial    = $this->testimonial->find($id);
        return view('backend.testimonial.edit',compact('testimonial'))->with('title','Edit Testimonial');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTestimonialRequest $request, $id)
    {
    	if(!auth()->user()->can('edit-testimonial'))
            abort(403, 'Unauthorized action.');

        $testimonial                 = $this->testimonial->find($id);
        $testimonial->name           = $request->name;
        $testimonial->slug           = $request->slug;
        $testimonial->image           = $request->image;
        $testimonial->description    = $request->description;
        $testimonial->status         = $request->status;
   
        if( $testimonial->save() ){
            session()->flash('success', 'Testimonial Updated');
            return redirect()->route('testimonial.index');
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
    	if(!auth()->user()->can('delete-testimonial'))
            abort(403, 'Unauthorized action.');

        $bool = $this->testimonial->find($id)->delete();
        if ($bool == 1) {
           return response()->json([
                'success' => true,
                'message' => "Testimonial Deleted Successfully",
            ]);
        }
    }

    public function getSoftDeleted()
    {
        if(!auth()->user()->can('view-testimonial'))
            abort(403, 'Unauthorized action.');

        $testimonial        = $this->testimonial->onlyTrashed();

        if (request()->has('q')) {
            $name           = request('q');
            $testimonial        = $testimonial->where('name','LIKE',"%{$name}%");
        }
        $testimonials           = $testimonial->latest()->paginate(50)->appends([
            'q'                 => request('name'),
            'status'            => request('status'),
        ]);

        return view('backend.testimonial.trash',compact('testimonials'))->with('title','Soft Deleted Testimonials');
    }

    public function restore($id)
    {
        $bool = $this->testimonial->onlyTrashed()->find($id)->restore();

        if ($bool == 1) {
           return response()->json([
                'success' => true,
                'message' => "Testimonial restore successfully",
            ]);
        }
    }

    public function permanentDelete($id)
    {
        $bool = $this->testimonial->onlyTrashed()->find($id)->forceDelete();

        if ($bool == 1) {
           return response()->json([
                'success' => true,
                'message' => "Testimonial deleted successfully",
            ]);
        }
    }

}
