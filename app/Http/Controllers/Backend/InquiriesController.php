<?php

namespace App\Http\Controllers\Backend;

use App\Models\Inquiry;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InquiriesController extends Controller
{
	private $inquiry;
    public function __construct(Inquiry $inquiry)
    {
        $this->middleware('auth:admin');
        $this->inquiry  = $inquiry;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inquiry        = $this->inquiry;

        if (request()->has('q')) {
            $name           = request('q');
            $inquiry        = $inquiry->where('name','LIKE',"%{$name}%");
        }
        if (request()->has('status') AND !empty(request('status'))) {
            $inquiry        = $inquiry->where('status',request('status'));
        }
        $inquiries           = $inquiry->latest()->paginate(50)->appends([
            'q'                 => request('q'),
            'status'            => request('status'),
        ]);

        return view('backend.inquiry.index',compact('inquiries'))->with('title','Inquiries');
    }

}
