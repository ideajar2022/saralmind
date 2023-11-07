<?php

namespace App\Http\Controllers\Backend;

use App\Models\MediaFeed;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\MediaFeed\StoreMediaFeedRequest;
use App\Http\Requests\MediaFeed\UpdateMediaFeedRequest;

class MediaFeedsController extends Controller
{
	private $mediaFeed;
    public function __construct(MediaFeed $mediaFeed)
    {
        $this->middleware('auth:admin');
        $this->mediaFeed  = $mediaFeed;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	if(!auth()->user()->can('view-media-feed'))
            abort(403, 'Unauthorized action.');

        $mediaFeed        = $this->mediaFeed;

        if (request()->has('q')) {
            $name           = request('q');
            $mediaFeed        = $mediaFeed->where('title','LIKE',"%{$name}%");
        }
        if (request()->has('status') AND !empty(request('status'))) {
            $mediaFeed        = $mediaFeed->where('status',request('status'));
        }
        $mediaFeeds           = $mediaFeed->latest()->paginate(50)->appends([
            'q'                 => request('name'),
            'status'            => request('status'),
        ]);

        return view('backend.media-feed.index',compact('mediaFeeds'))->with('title','Media Feeds');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	if(!auth()->user()->can('create-media-feed'))
            abort(403, 'Unauthorized action.');

        $mediaFeed        = $this->mediaFeed;
        return view('backend.media-feed.create',compact('mediaFeed'))->with('title','Create Media Feed');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMediaFeedRequest $request)
    {
    	if(!auth()->user()->can('create-media-feed'))
            abort(403, 'Unauthorized action.');
       
        $this->mediaFeed->title           = $request->title;
        $this->mediaFeed->media           = $request->media;
        $this->mediaFeed->url             = $request->url;
        $this->mediaFeed->image            = $request->image;
        $this->mediaFeed->description     = $request->description;
        $this->mediaFeed->published_at    = $request->published_at;
        $this->mediaFeed->status          = $request->status;
        $this->mediaFeed->created_by      = auth()->id();
    
        if( $this->mediaFeed->save() ){
            session()->flash('success','Media Feed Created');
            return redirect()->route('media-feed.index');
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
    	if(!auth()->user()->can('edit-media-feed'))
            abort(403, 'Unauthorized action.');

        $mediaFeed    = $this->mediaFeed->find($id);
        return view('backend.media-feed.edit',compact('mediaFeed'))->with('title','Edit Media Feed');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMediaFeedRequest $request, $id)
    {
    	if(!auth()->user()->can('edit-media-feed'))
            abort(403, 'Unauthorized action.');

        $mediaFeed                  = $this->mediaFeed->find($id);
        $mediaFeed->title           = $request->title;
        $mediaFeed->media           = $request->media;
        $mediaFeed->url             = $request->url;
        $mediaFeed->image            = $request->image;
        $mediaFeed->description     = $request->description;
        $mediaFeed->published_at    = $request->published_at;
        $mediaFeed->status          = $request->status;
   
        if( $mediaFeed->save() ){
            session()->flash('success', 'MediaFeed Updated');
            return redirect()->route('media-feed.index');
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
    	if(!auth()->user()->can('delete-media-feed'))
            abort(403, 'Unauthorized action.');

        $bool = $this->mediaFeed->find($id)->delete();
        if ($bool == 1) {
           return response()->json([
                'success' => true,
                'message' => "MediaFeed Deleted Successfully",
            ]);
        }
    }

    public function getSoftDeleted()
    {
        if(!auth()->user()->can('view-media-feed'))
            abort(403, 'Unauthorized action.');

        $mediaFeed        = $this->mediaFeed->onlyTrashed();

        if (request()->has('q')) {
            $name           = request('q');
            $mediaFeed        = $mediaFeed->where('name','LIKE',"%{$name}%");
        }
        $mediaFeeds           = $mediaFeed->latest()->paginate(50)->appends([
            'q'                 => request('name'),
            'status'            => request('status'),
        ]);

        return view('backend.media-feed.trash',compact('mediaFeeds'))->with('title','Soft Deleted MediaFeeds');
    }

    public function restore($id)
    {
        $bool = $this->mediaFeed->onlyTrashed()->find($id)->restore();

        if ($bool == 1) {
           return response()->json([
                'success' => true,
                'message' => "MediaFeed restore successfully",
            ]);
        }
    }

    public function permanentDelete($id)
    {
        $bool = $this->mediaFeed->onlyTrashed()->find($id)->forceDelete();

        if ($bool == 1) {
           return response()->json([
                'success' => true,
                'message' => "MediaFeed deleted successfully",
            ]);
        }
    }

}
