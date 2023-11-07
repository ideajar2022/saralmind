<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subscriber;

class SubscriberController extends Controller
{
	private $subscriber;
    public function __construct(Subscriber $subscriber)
    {
        $this->subscriber        = $subscriber;
    }

    public function store(Request $request)
    {
    	$request->validate([
    		'email'	=>	'email|required|max:255|unique:subscribers'
    	]);

    	$this->subscriber->email = $request->email;
    	$this->subscriber->save();

    	return ['status'=>'success', 'message'=>'You have successfully subscribed'];
    }
}
