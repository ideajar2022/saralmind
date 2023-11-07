<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Grade;
use App\Models\NNCResult;
use Illuminate\Http\Request;
use App\Http\Requests\User\UpdateProfessionRequest;
use App\Http\Requests\User\UpdateProfileRequest;
use File;
use Intervention\Image\Facades\Image;


class UserController extends Controller
{
    private $user;
    private $uploadPath;
    private $result;
    public function __construct(User $user, NNCResult $result)
    {
        $this->middleware('auth');
        $this->user        = $user;
        $this->uploadPath   = config('uploads.directory');
        $this->result = $result;
    }

    public function updateProfession(UpdateProfessionRequest $request)
    {
        $user = auth()->user();
        $user->phone_no        = $request->phone_no;
        $user->type            = $request->profession;
        $user->save();

        if ($user->type == 'Student') {
            $user->grades()->sync($request->grades);
        }else {
            $user->subjects()->sync($request->subjects);
        }

        return ['status'=>'success','message'=>'Profession Updated'];

    }

    public function profile(Request $request, $username)
    {
        // privacy status for username, email, dob and so on
        if ($request->isMethod('post')) {
            $privacy_status = $this->user->where('id',auth()->user()->id)->pluck('profile_privacy_status')->first();

            if($request->input('userPrivacy') == 'username-private') $privacy_status[0]=0;
            elseif($request->input('userPrivacy') == 'username-public') $privacy_status[0]=1;

            elseif($request->input('userPrivacy') == 'email-public') $privacy_status[1]=1;
            elseif($request->input('userPrivacy') == 'email-private') $privacy_status[1]=0;

            elseif($request->input('userPrivacy') == 'dob-public') $privacy_status[2]=1;
            elseif($request->input('userPrivacy') == 'dob-private') $privacy_status[2]=0;

            elseif($request->input('userPrivacy') == 'address-public') $privacy_status[3]=1;
            elseif($request->input('userPrivacy') == 'address-private') $privacy_status[3]=0;

            elseif($request->input('userPrivacy') == 'contact-public') $privacy_status[4]=1;
            elseif($request->input('userPrivacy') == 'contact-private') $privacy_status[4]=0;

            $this->user->where('id', auth()->user()->id)->update(array('profile_privacy_status' => $privacy_status));
        }

        if(auth()->user()->username == $username){
            $original_user = true;
            $user = auth()->user();
        }
        else{
            $original_user = false;
            $user = $this->user->where('username',$username)->first();
        }
        $user->refresh();
        $user->load(['grades','subjects']);


        // NNC mock exam summary
        $results = $this->result->where('user_id',auth()->user()->id)->pluck('percentage');
        $pass_count = 0;  $fail_count = 0;  $extraOrdinary_count = 0;
        $total_exams_given = count($results);

        foreach($results as $percent){
            if($percent>90) $extraOrdinary_count++;
            if($percent>40) $pass_count++;
        }

        $fail_count = count($results) - $pass_count;

        // NNC leaderboard
        $nnc_top_scorers = $this->result->orderBy('percentage','DESC')->orderBy('created_at','DESC')->limit(8)->get();

        // $followers = $this->user->where('username',$username)->pluck('connections')->first();
        // $followers = json_decode($followers)->followers;
        // $followers = array($followers);
        // // dd(gettype($followers));
        // foreach($followers as $follower){
        //     echo $follower;
        // }
        // $following = $this->user->where('username',$username)->pluck('following');


        return view('frontend.user.profile',compact('user','original_user','pass_count','fail_count','extraOrdinary_count','total_exams_given','nnc_top_scorers'));
    }

    public function followUser(Request $request, $username){
        // for user being followed
        $followed_user = $this->user->where('username',$username);
        $connections = $followed_user->pluck('connections')->first();
        $followed_decoded = json_decode($connections,true);

        $new_followers = array($followed_decoded['followers']);
        // dd($new_followers[0]);
        // dd(array($followed_decoded['followers']));


        // if(array($followed_decoded['followers']) == ""){
        //     $followed_decoded['followers'] = auth()->user()->id;
        // }


        if($new_followers[0] == ""){
            dd("happening");
            // array($followed_decoded['followers'])[0] = auth()->user()->id;
        }

        else{
            dd("not happening");
            // $followed_decoded['followers'] = array_push($new_followers, auth()->user()->id);
        }

        // else{
        //     // $followed_decoded['followers'] = $followed_decoded['followers'] . "" .auth()->user()->id;

        //     $followed_decoded['followers'] = array_push($followed_decoded['followers'], auth()->user()->id);
        // }

        // dd($followed_decoded['followers']); 
        // $followers = array($followed_decoded['followers']);
        // array_push($followers, auth()->user()->id);



        // for user who is following other user
        // $following_user = auth()->user();
        // $connections = auth()->user()->pluck('connections')->first();
        // $following_decoded = json_decode($connections,true);
        // $followings = array($following_decoded['following']);
        // array_push($followings, $followed_user->pluck('id'));

        // update followers list of user being followed
        $this->user->where('username',$username)->update([
           // 'connections->followers' => json_encode($followed_decoded['followers'])
            'connections->followers' => $followed_decoded['followers']
        ]);

        // update following list of current user(authenticcated user)
        // $this->user->where('id',auth()->user()->id)->update([
        //    'connections->following' => json_encode($followings)
        // ]);

        dd("working");
        // return redirect(route('user.profile',$username));

    }

    public function setting()
    {
        $user = auth()->user();
        $user->load(['grades','subjects']);
        $grades =  Grade::select('id','name','slug','description')->with([
            'subjects' => function ( $query) {
                $query->select('id','grade_id','name','slug');
                $query->where('status', 'APPROVED');
            }
        ])
        ->whereStatus('APPROVED')->orderBy('order','ASC')->get();

        return view('frontend.user.setting',compact('user','grades'));
    }

    public function update(UpdateProfileRequest $request)
    {
        $user           = auth()->user();
        $user->name     = $request->name;
        $user->username = $request->username;
        $user->email    = $request->email;
        $user->image    = $request->image;
        $user->type     = $request->profession;
        $user->dob      = $request->dob;
        $user->phone_no         = $request->phone_no;
        $user->address          = $request->address;
        $user->school_name          = $request->school_name;
        $user->save();
        if ($user->type == 'Student') {
            $user->grades()->sync($request->grades);
        }else {
            $user->subjects()->sync($request->subjects);
        }
        return redirect()->back()->with('success', 'Profile has been updated!');
    }

    public function upload(Request $request)
    {
        if($request->hasFile('file'))
        {
            $destinationPath = $this->uploadPath[$request->module];

            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0775, true);
            }
            if (!File::exists($destinationPath.'/thumbs')) {
                File::makeDirectory($destinationPath.'/thumbs', 0775, true);
            }
            $fileName = \Str::random(6) . '_' .time().'.'.$request->file('file')->getClientOriginalExtension();

            $file = $request->file('file')->move($destinationPath, $fileName);

            Image::make(($destinationPath.'/'.$fileName))->resize(300, 200)->save($destinationPath.'/thumbs/'.$fileName);


            return [ 'file_name'=>$fileName, 'file_path' => asset($destinationPath.'/'.$fileName)];
        }
    }

}
