<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Http\Requests\Client\StoreClientRequest;
use App\Http\Requests\Client\UpdateClientRequest;

class ClientsController extends Controller
{
    private $client;
    public function __construct(Client $client)
    {
        $this->middleware('auth:admin');
        $this->client = $client;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!auth()->user()->can('view-client'))
            abort(403, 'Unauthorized action.');
        
        $client      = $this->client;

        if (request()->has('q')) {
            $name           = request('q');
            $client  = $client->where('name','LIKE',"%{$name}%");
        }

        if (request()->has('client') AND !empty(request('client'))) {
            $client = $client->where('id',request('client'));
        }

        if (request()->has('status') AND !empty(request('status'))) {
            $client = $client->where('status',request('status'));
        }

        $clients     = $client->latest()->paginate(20)->appends([
            'q'                 => request('name'),
            'client'            => request('name'),
            'status'            => request('status'),
        ]);
        

        return view('backend.client.index',compact('clients'))->with('title','Clients');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!auth()->user()->can('create-client'))
            abort(403, 'Unauthorized action.');

        $client         = $this->client;
        return view('backend.client.create',compact('client'))->with('title','Create Client');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClientRequest $request)
    {
        if(!auth()->user()->can('create-client'))
            abort(403, 'Unauthorized action.');

        $this->client->name             = $request->name;
        $this->client->description      = $request->description;
        $this->client->status           = $request->status;
        $this->client->created_by       = auth()->id();

        if( $this->client->save() ){
            session()->flash('success','Client Created');
            return redirect()->route('client.index');
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
        if(!auth()->user()->can('edit-client'))
            abort(403, 'Unauthorized action.');

        $client        = $this->client->find($id);

        return view('backend.client.edit',compact('client'))->with('title','Edit Client'); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClientRequest $request, $id)
    {
        if(!auth()->user()->can('edit-advertisement'))
            abort(403, 'Unauthorized action.');

        $client  = $this->client->find($id);

        $client->name             = $request->name;
        $client->description      = $request->description;
        $client->status           = $request->status;

        if( $client->save() ){
            session()->flash('success', 'Client Updated');
            return redirect()->route('client.index');
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
        if(!auth()->user()->can('delete-client'))
            abort(403, 'Unauthorized action.');    

        $bool = $this->client->where('id', $id)->delete();
        if ($bool == 1) {
           return response()->json([
                'success' => true,
                'message' => "Client deleted successfully",
            ]);
        }
    }

    public function getSoftDeleted()
    {
        if(!auth()->user()->can('view-client'))
            abort(403, 'Unauthorized action.');    
        $client        = $this->client->onlyTrashed();
        $clients       = $client->latest()->paginate(50);
        // dd("working");

        return view('backend.client.trash',compact('clients'))->with('title','Soft Deleted Clients');
    }

    public function restore($id)
    {
        // dd("success");
        $bool = $this->client->onlyTrashed()->find($id)->restore();

        if ($bool == 1) {
           return response()->json([
                'success' => true,
                'message' => "Client restored successfully",
            ]);
        }
    }

    public function permanentDelete($id)
    {
        $bool = $this->client->onlyTrashed()->find($id)->forceDelete();
        dd("working");
        if ($bool == 1) {
           return response()->json([
                'success' => true,
                'message' => "Client deleted successfully",
            ]);
        }
    }
}
