<?php

namespace App\Http\Controllers\Backend;

use App\Models\Glossary;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Glossary\StoreGlossaryRequest;
use App\Http\Requests\Glossary\UpdateGlossaryRequest;
use App\Imports\ImportGlossaries;
use App\Exports\ExportGlossaries;
use Maatwebsite\Excel\Facades\Excel;

class GlossariesController extends Controller
{
    private $glossary;

    public function __construct(Glossary $glossary)
    {
        $this->middleware('auth:admin');
        $this->glossary      = $glossary;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	if(!auth()->user()->can('view-glossary'))
            abort(403, 'Unauthorized action.');

        $glossary        = $this->glossary;

        if (request()->has('q')) {
            $word           = request('q');
            $glossary       = $glossary->where('word','LIKE',"%{$word}%");
        }

        if (request()->has('status') AND !empty(request('status'))) {
            $glossary        = $glossary->where('status',request('status'));
        }

        if (request()->has('export') AND !empty(request('export'))) {
            $result = $glossary->latest()->get();
            return Excel::download(new ExportGlossaries($result), 'glossaries.xlsx');
        }
       
        $glossaries          = $glossary->latest()->paginate(50)->appends([
            'q'                 => request('q'),
            'status'            => request('status'),
        ]);

        return view('backend.glossary.index',compact('glossaries'))->with('title','Glossaries');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	if(!auth()->user()->can('create-glossary'))
            abort(403, 'Unauthorized action.');

        $glossary          = $this->glossary;
        return view('backend.glossary.create',compact('glossary'))->with('title','Create Glossary');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGlossaryRequest $request)
    {
    	if(!auth()->user()->can('create-glossary'))
            abort(403, 'Unauthorized action.');

        $this->glossary->word            = $request->word;
        $this->glossary->meaning_english = $request->meaning_english;
        $this->glossary->meaning_nepali  = $request->meaning_nepali;
        $this->glossary->status          = $request->status;
        $this->glossary->created_by      = auth()->id();
    
        if( $this->glossary->save() ){
            session()->flash('success','Glossary Created');
            return redirect()->route('glossary.index');
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
    	if(!auth()->user()->can('edit-glossary'))
            abort(403, 'Unauthorized action.');

        $glossary        = $this->glossary->find($id);
        return view('backend.glossary.edit',compact('glossary'))->with('title','Edit Glossary');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGlossaryRequest $request, $id)
    {
    	if(!auth()->user()->can('edit-glossary'))
            abort(403, 'Unauthorized action.');

        $glossary                  = $this->glossary->find($id);
        $glossary->word            = $request->word;
        $glossary->meaning_english = $request->meaning_english;
        $glossary->meaning_nepali  = $request->meaning_nepali;
        $glossary->status          = $request->status;

        if( $glossary->save() ){
            session()->flash('success', 'Glossary Updated');
            return redirect()->route('glossary.index');
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
    	if(!auth()->user()->can('delete-glossary'))
            abort(403, 'Unauthorized action.');

        $bool = $this->glossary->find($id)->delete();
        if ($bool == 1) {
           return response()->json([
                'success' => true,
                'message' => "Glossary deleted successfully",
            ]);
        }
    }

    public function getSoftDeleted()
    {
        if(!auth()->user()->can('view-glossary'))
            abort(403, 'Unauthorized action.');

        $glossary        = $this->glossary->onlyTrashed();

        if (request()->has('q')) {
            $word           = request('q');
            $glossary       = $glossary->where('word','LIKE',"%{$word}%");
        }

         if (request()->has('status') AND !empty(request('status'))) {
            $glossary        = $glossary->where('status',request('status'));
        }
       
        $glossaries          = $glossary->latest()->paginate(50)->appends([
            'q'                 => request('q'),
            'status'            => request('status'),
        ]);

        return view('backend.glossary.trash',compact('glossaries'))->with('title','Soft Deleted Glossaries');
    }

    public function restore($id)
    {
        $bool = $this->glossary->onlyTrashed()->find($id)->restore();

        if ($bool == 1) {
           return response()->json([
                'success' => true,
                'message' => "Glossary restore successfully",
            ]);
        }
    }

    public function permanentDelete($id)
    {
        $bool = $this->glossary->onlyTrashed()->find($id)->forceDelete();

        if ($bool == 1) {
           return response()->json([
                'success' => true,
                'message' => "Glossary deleted successfully",
            ]);
        }
    }

    public function getImport()
    {
        if(!auth()->user()->can('create-glossary'))
            abort(403, 'Unauthorized action.');

        if (request()->has('sample') AND !empty(request('sample'))) {
           
            return Excel::download(new ExportGlossaries(collect([])), 'glossary-sample.xlsx');
        }

        return view('backend.glossary.import')->with('title','Import Glossaries');
    }

    public function import(Request $request)
    {
        if(!auth()->user()->can('create-glossary'))
            abort(403, 'Unauthorized action.');
        
        $this->validate($request, [
          'import_file'  => 'required|mimes:xls,xlsx'
        ]);
        try {
            Excel::import(new ImportGlossaries,  request()->file('import_file'));
            session()->flash('success', 'Glossaries Imported');
            return redirect()->route('glossary.index');

        } catch(\Exception $e){
            session()->flash('error', $e->getMessage());
            return redirect()->back();
        }
        
    }
}
