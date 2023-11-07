<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
	public function __construct( )
    {
        $this->middleware('auth:admin');
    }

    public function index(Request $request)
    {

        $user = $request->user();
        // return $user;
        // dd($user->hasRole('developer')); //will return true, if user has role
        //dd($user->givePermissionsTo('create-tasks'));// will return permission, if not null
        //dd($user->can('create-tasks')); // will return true, if user has permission
    	return view('backend.dashboard.index')->with('title','Dashboard');
    }

    public function general_fields()
    {
    	return view('backend.dashboard.general_fields');
    }
    public function institutions()
    {
    	return view('backend.institutions.index');
    }
    public function institutionsAdd()
    {
    	return view('backend.institutions.add');
    }
    public function notes()
    {
    	return view('backend.notes.index');
    }
    public function notesAdd()
    {
    	return view('backend.notes.add');
    }
}
