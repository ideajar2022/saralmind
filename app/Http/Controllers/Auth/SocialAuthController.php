<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Auth;
use Socialite;
Use App\Models\User;
use App\Models\SocialIdentity;
use Illuminate\Support\Str;


class SocialAuthController extends Controller
{
  
  protected $redirectTo = RouteServiceProvider::HOME;


  public function redirectToProvider($provider)
 	{
    	return Socialite::driver($provider)->redirect();
 	}

  public function handleProviderCallback($provider)
  {
     try {
         $user = Socialite::driver($provider)->user();
     } catch (Exception $e) {
         return redirect('/login');
     }


     $authUser = $this->findOrCreateUser($user, $provider);
     if(!$authUser)
     {
        return redirect('/login');

     }
     Auth::login($authUser, true);
     return redirect($this->redirectTo);
  }


   public function findOrCreateUser($providerUser, $provider)
   {
       $account = SocialIdentity::whereProviderName($provider)
                  ->whereProviderId($providerUser->getId())
                  ->first();

       if ($account && $account->user) {
           return $account->user;
       } else {        
           $user = User::where([
           	'email'		=>$providerUser->getEmail(),
           	'status'	=>'Active'
           ])->first();

           if (! $user) {
               $user = User::create([
                   'email' => $providerUser->getEmail(),
                   'name'  => $providerUser->getName(),
                   'status'=> 'Active',
                   'username' => 'user-'.Str::random(8),
                   'profile_privacy_status' => [0,0,0,0,0]
               ]);
           }

           $user->identities()->create([
               'provider_id'   => $providerUser->getId(),
               'provider_name' => $provider,
           ]);

           return $user;
       }
   }
}
