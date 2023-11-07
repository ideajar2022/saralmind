<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;

class PremiumAppController extends Controller
{
    public function index(Request $request){
        if (!is_null(($request->session()->get('login_cache')))) {
            return redirect('https://www.saralmind.com/premiumAsset/index.html');
        }
        else{
            return view('frontend.premium-app.login');
        }
    }

    public function login(Request $request){ // handle post request from login page
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $user = User::where('email',$request->email)->first();

        if($user && $user->account_type=='PREMIUM'){
            if(Hash::check($request->password, $user->password)){
                if($user->premium_login_status){
                    return back()->with('fail','Sorry !!, this user have already loggged into another device');
                }
                else{
                    $request->session()->put('login_cache', $user->id);
                    $user->premium_login_status = true;
                    $user->save();
                    return redirect('https://www.saralmind.com/premiumAsset/index.html');
                }

            }

            else{
                return back()->with('fail','Wrong Password given !!');
            }
        }           

        else{
            return back()->with('fail','This email is not registered for our premium account');
        }

    }
}
