<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Advertisement;
use App\Models\Client;
use App\Http\Requests\advertisement\StoreAdvertisementRequest;
use App\Http\Requests\advertisement\UpdateAdvertisementRequest;

class AdvertisementsController extends Controller
{
    private $advertisement;
    private $client;
    public function __construct(Advertisement $advertisement,Client $client)
    {
        $this->middleware('auth:admin');
        $this->advertisement = $advertisement;
        $this->client = $client;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!auth()->user()->can('view-advertisement'))
            abort(403, 'Unauthorized action.');

        // $advertisement        = $this->advertisement;
        $advertisement        = $this->advertisement->with(['client']);

        if (request()->has('q')) {
            $name           = request('q');
            $advertisement  = $advertisement->where('name','LIKE',"%{$name}%");
        }

        if (request()->has('client') AND !empty(request('client'))) {
            $advertisement = $advertisement->where('client_id',request('client'));
        }

        if (request()->has('status') AND !empty(request('status'))) {
            $advertisement = $advertisement->where('status',request('status'));
        }

        // if (request()->has('export') AND !empty(request('export'))) {
        //     $result = $lesson->latest()->get();
        //     return Excel::download(new ExportLessons($result), 'lessons.xlsx');
        // }
        $advertisements         = $advertisement->latest()->paginate(20)->appends([
            'q'                 => request('name'),
            'client'            => request('client'),
            'status'            => request('status'),
        ]);

        $clients           =   $this->client->pluck('name','id');

        return view('backend.advertisement.index',compact('advertisements','clients'))->with('title','Advertisements');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!auth()->user()->can('create-advertisement'))
            abort(403, 'Unauthorized action.');

        $advertisement         = $this->advertisement;
        $clients           =   $this->client->pluck('name','id');

        return view('backend.advertisement.create',compact('advertisement','clients'))->with('title','Create Advertisement');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdvertisementRequest $request)
    {
        if(!auth()->user()->can('create-advertisement'))
            abort(403, 'Unauthorized action.');

        $this->advertisement->client_id             = $request->client;
        $this->advertisement->name                  = $request->name;
        $this->advertisement->content               = $request->content;
        $this->advertisement->image                 = $request->image;
        $this->advertisement->link                  = $request->link;
        $this->advertisement->status                = $request->status;
        $this->advertisement->created_by            = auth()->id();
        // dd("success");

        if($this->advertisement->save() ){
            session()->flash('success','Advertisement Created');
            return redirect()->route('advertisement.index');
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
        if(!auth()->user()->can('edit-advertisement'))
            abort(403, 'Unauthorized action.');

        $advertisement        = $this->advertisement->find($id);
        $clients           =   $this->client->pluck('name','id');

        return view('backend.advertisement.edit',compact('advertisement','clients'))->with('title','Edit Advertisement');        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdvertisementRequest $request, $id)
    {
        if(!auth()->user()->can('edit-advertisement'))
            abort(403, 'Unauthorized action.');

        $advertisement = $this->advertisement->find($id);

        $advertisement->client_id             = $request->client;
        $advertisement->name                  = $request->name;
        $advertisement->content               = $request->content;
        $advertisement->image                 = $request->image;
        $advertisement->link                  = $request->link;
        $advertisement->status                = $request->status;
        $advertisement->created_by            = auth()->id();

        if( $advertisement->save() ){
            session()->flash('success', 'Advertisement Updated');
            return redirect()->route('advertisement.index');
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
        if(!auth()->user()->can('delete-advertisement'))
            abort(403, 'Unauthorized action.');    

        $bool = $this->advertisement->where('id', $id)->delete();
        if ($bool == 1) {
           return response()->json([
                'success' => true,
                'message' => "Advertisement deleted successfully",
            ]);
        }
    }

    public function getSoftDeleted()
    {
        if(!auth()->user()->can('view-advertisement'))
            abort(403, 'Unauthorized action.');    

        $advertisement        = $this->advertisement->with(['client'])->onlyTrashed();

        $advertisements       = $advertisement->latest()->paginate(50);

        return view('backend.advertisement.trash',compact('advertisements'))->with('title','Soft Deleted Advertisements');
    }

    public function restore($id)
    {
        $bool = $this->advertisement->onlyTrashed()->find($id)->restore();

        if ($bool == 1) {
           return response()->json([
                'success' => true,
                'message' => "Advertisement restored successfully",
            ]);
        }
    }

    public function permanentDelete($id)
    {
        $bool = $this->advertisement->onlyTrashed()->find($id)->forceDelete();

        if ($bool == 1) {
           return response()->json([
                'success' => true,
                'message' => "Advertisement deleted successfully",
            ]);
        }
    }


}
