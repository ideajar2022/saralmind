<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use Carbon\Carbon;

class UsersController extends Controller
{
    private $user;

    public function __construct( User $user )
    {
        $this->middleware('auth:admin');
        $this->user        = $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!auth()->user()->can('view-front-user'))
            abort(403, 'Unauthorized action.');

        $user        = $this->user;

        if (request()->has('q')) {
            $name           = request('q');
            $user        = $user->where('name','LIKE',"%{$name}%");            //->orWhere('email', 'LIKE', "%{$name}%");
        }

        if (request()->has('status') AND !empty(request('status'))) {
            $user        = $user->where('status',request('status'));
        }

        $users_count = count($user->get());

        $users           = $user->latest()->paginate(50)->appends([
            'q'                 => request('name'),
            'status'            => request('status'),
        ]);

        return view('backend.user.index',compact('users','users_count'))->with('title','Users');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!auth()->user()->can('create-front-user'))
            abort(403, 'Unauthorized action.');

        $user              = $this->user;

        return view('backend.user.create',compact('user'))->with('title','Create User');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        if(!auth()->user()->can('create-front-user'))
            abort(403, 'Unauthorized action.');

        $this->user->name             = $request->name;
        $this->user->email            = $request->email;
        $this->user->phone_no         = $request->phone_no;
        $this->user->password         = bcrypt( $request->password );
        $this->user->status           = $request->status;
    
        if( $this->user->save() ){
            session()->flash('success','Front User Created');
            return redirect()->route('front-user.index');
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
        if(!auth()->user()->can('edit-front-user'))
            abort(403, 'Unauthorized action.');

        $user               = $this->user->find($id);
        
        return view('backend.user.edit',compact('user'))->with('title','Edit User');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        if(!auth()->user()->can('edit-front-user'))
            abort(403, 'Unauthorized action.');

        $user                   = $this->user->find($id);
       
        $user->name             = $request->name;
        $user->email            = $request->email;
        $user->phone_no         = $request->phone_no;
        if (request()->has('update_password_check')) {
            $user->password         = bcrypt( $request->password ); 
        }
        $user->account_type     = $request->account_type;

        $currentTimestamp       = Carbon::now();
        $user->premium_account_created_at = $currentTimestamp;
        $user->premium_account_expires_on = $currentTimestamp->copy()->addYear();
        
        $user->status           = $request->status;
   
        if( $user->save() ){
            session()->flash('success', 'User Updated');
            return redirect()->route('front-user.index');
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
        if(!auth()->user()->can('delete-front-user'))
            abort(403, 'Unauthorized action.');

        $bool = $this->user->find($id)->delete();
        if ($bool == 1) {
           return response()->json([
                'success' => true,
                'message' => "Role Deleted Successfully",
            ]);
        }
    }

    public function getSoftDeleted()
    {
        if(!auth()->user()->can('view-front-user'))
            abort(403, 'Unauthorized action.');

        $user        = $this->user->onlyTrashed();

        if (request()->has('q')) {
            $name           = request('q');
            $user           = $user->where('name','LIKE',"%{$name}%");
        }

        if (request()->has('status') AND !empty(request('status'))) {
            $user        = $user->where('status',request('status'));
        }

        $users           = $user->latest()->paginate(50)->appends([
            'q'                 => request('name'),
            'status'            => request('status'),
        ]);

        return view('backend.user.trash',compact('users'))->with('title','Soft Deleted Users');
    }

    public function restore($id)
    {
        $bool = $this->user->onlyTrashed()->find($id)->restore();

        if ($bool == 1) {
           return response()->json([
                'success' => true,
                'message' => "User restore successfully",
            ]);
        }
    }

    public function permanentDelete($id)
    {
        $bool = $this->user->onlyTrashed()->find($id)->forceDelete();

        if ($bool == 1) {
           return response()->json([
                'success' => true,
                'message' => "User deleted successfully",
            ]);
        }
    }


    // show all premium users in ascending order of expiry date
    public function showPremiumUsers(){
        if(!auth()->user()->can('view-front-user'))
            abort(403, 'Unauthorized action.');

        $user        = $this->user->where('account_type','PREMIUM');

        if (request()->has('q')) {
            $name           = request('q');
            $user        = $user->where('name','LIKE',"%{$name}%");
        }

        $users_count = count($user->get());

        $users           = $user->orderBy('premium_account_expires_on', 'asc')->latest()->paginate(20)->appends([
            'q'                 => request('name'),
        ]);

        return view('backend.user.premium-users',compact('users','users_count'))->with('title','Premium Users');
    }

}
