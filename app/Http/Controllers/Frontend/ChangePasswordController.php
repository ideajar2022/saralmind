<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\User\ChangePasswordRequest;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $show_old_password = true;

        if(!auth()->user()->password){
            $show_old_password = false;
        }

        return view('frontend.user.change-password')->with('show_old_password',$show_old_password);
    }

    public function store(ChangePasswordRequest $request)
    {
    	$user 			= auth()->user();
        $show_old_password = true;

        // if user registered from google, passoword is null by default and do not show old password input in the password change page
        if($user->password == null){
            $show_old_password = false;
        }

    	$user->password = Hash::make($request->new_password);
    	if ($user->save()) {
    		return redirect()->back()->with('success', 'Password has been changed!');
    	}
   
    }
}
