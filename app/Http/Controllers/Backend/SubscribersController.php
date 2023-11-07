<?php

namespace App\Http\Controllers\Backend;

use App\Models\Subscriber;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubscribersController extends Controller
{
	private $subscriber;
    public function __construct(Subscriber $subscriber)
    {
        $this->middleware('auth:admin');
        $this->subscriber  = $subscriber;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subscriber        = $this->subscriber;

        if (request()->has('q')) {
            $name           = request('q');
            $subscriber        = $subscriber->where('email','LIKE',"%{$name}%");
        }
      
        $subscribers           = $subscriber->latest()->paginate(50)->appends([
            'q'                 => request('q'),
        ]);

        return view('backend.subscriber.index',compact('subscribers'))->with('title','Subscribers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bool = $this->subscriber->find($id)->delete();
        if ($bool == 1) {
           return response()->json([
                'success' => true,
                'message' => "Subscriber Deleted Successfully",
            ]);
        }
    }

   
}
