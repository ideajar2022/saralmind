<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inquiry;
use App\Http\Requests\Inquiry\StoreInquiryRequest;

class InquiryController extends Controller
{
	private $inquiry;
    public function __construct(Inquiry $inquiry)
    {
        $this->inquiry        		= $inquiry;
    }

    public function index()
    {
    	return view('frontend.inquiry.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInquiryRequest $request)
    {  
        $this->inquiry->name                = $request->name;
        $this->inquiry->email               = $request->email;
        $this->inquiry->subject             = $request->subject;
        $this->inquiry->contact_no          = $request->contact_no;
        $this->inquiry->message             = $request->message;

        if( $this->inquiry->save() ){
            return redirect()->back()->with('message', 'Your inquiry has been sent!');
        }
    }
}
