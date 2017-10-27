<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Socialite;
use Auth;

use App\Postings;
use App\Profiles;
use App\Interests;



class LinkedinController extends Controller
{
    //


    // TESTING FOR LINKEDIN STUFF

    public function redirectToLinkedin() {

        return Socialite::driver('linkedin')->redirect();
    }

/*
    public function handleLinkedinCallback() {
      $user = Socialite::driver('linkedin')->user();

      return $user->name;
    }
    */

    public function handleLinkedinCallback(){

      $linkedinuser = Socialite::driver('linkedin')->user();

      $findUser = User::where('email',$linkedinuser->email)->first();

      if ($findUser) {

        Auth::login($findUser);

        
        return redirect ('postings');



      } else {

        $user = new User;

        $user->name = $linkedinuser->name;

        $user->email = $linkedinuser->email;

        $user->password = bcrypt("password");

        $user->avatar = $linkedinuser->avatar_original;

        $user->linkedin_headline = $linkedinuser->user['headline'];

        $user->linkedin_url = $linkedinuser->user['publicProfileUrl'];

        $user->save();

        // STANDARD VARIABLES

        return redirect ('postings');

      }

  }
}
