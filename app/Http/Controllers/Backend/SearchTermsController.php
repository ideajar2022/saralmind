<?php

namespace App\Http\Controllers\Backend;

use App\Models\SearchTerm;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SearchTermsController extends Controller
{
	private $searchTerm;
    public function __construct(SearchTerm $searchTerm)
    {
        $this->middleware('auth:admin');
        $this->searchTerm  = $searchTerm;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $searchTerm        = $this->searchTerm;

        if (request()->has('q')) {
            $name           = request('q');
            $searchTerm        = $searchTerm->where('name','LIKE',"%{$name}%");
        }
      
        $searchTerms           = $searchTerm->latest()->paginate(50)->appends([
            'q'                 => request('q'),
        ]);

        return view('backend.search-term.index',compact('searchTerms'))->with('title','Search Terms');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bool = $this->searchTerm->find($id)->delete();
        if ($bool == 1) {
           return response()->json([
                'success' => true,
                'message' => "Search Term Deleted Successfully",
            ]);
        }
    }

   
}
