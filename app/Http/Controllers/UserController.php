<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Image;

use App\Profiles;

class UserController extends Controller
{
    //
    public function index() {
      // Sends an authenticated user to their 'profile' page
      $profiles = Profiles::all();
      $user = Auth::user();

      return view('profiles.index', compact('user','profiles'));
    }

    public function update_avatar(Request $request) {
      if($request->hasFile('avatar')) {
        // User updated a new avatar
        $avatar = $request->file('avatar');
        $filename = time() . "." . $avatar->getClientOriginalExtension();

        // Move the file to public path
        $location = public_path('/uploads/');
        $request->file('avatar')->move($location, $filename);

        //Update the user's avatar from default to new Image
        $user = Auth::user();
        $user->avatar = $filename;
        $user->save();

      }
      return view('profiles.index', array('user' => Auth::user()) );
   }




 }
