<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bug;
use App\Http\Requests\Bug\StoreBugRequest;

class BugController extends Controller
{
	private $bug;
    public function __construct(Bug $bug)
    {
        $this->bug        		= $bug;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function report(StoreBugRequest $request)
    {  
        $this->bug->url                 = $request->url;
        $this->bug->bug                 = $request->bug;
        $this->bug->reported_by         = auth()->id();
     
        if( $this->bug->save() ){
            return ['status'=>'success','message'=>'Bug Reported'];
        }
    }
}
