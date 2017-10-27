<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Postings;
use App\Profiles;
use App\Interests;
use Auth;
use Session;

class InterestsController extends Controller
{
    // STORING FROM INDEX PAGE
    public function store () {

      // Defining variables
      $request = request('posting_id');
      $user = Auth::user();
      $uid = $user->id;

      // Check to see if the user has already indicated interest in particular rotation
      $count = Interests::where('posting_id', '=', $request)->where('user_id','=',$uid)->get();

      if (count($count) > 0) {

        $interest = Interests::where ('user_id',$uid)->get();
        // User has already liked this posting, so proceed with error message
        Session::flash('message', 'You have already indicated your interest for this role.');

        return redirect('postings');
      }

      $interest = new Interests;
      $interest->user_id = $user->id;
      $interest->posting_id = request('posting_id');

      $interest->save();

      Session::flash('message', 'Interest saved.');

      $interest = Interests::where ('user_id',$uid)->get();

      return redirect('postings');

    }

    public function destroy () {
      $request = request('posting_id');

      $notinterested = Interests::where('posting_id', '=', $request)->firstOrFail();

      $notinterested->delete();

      return redirect('postings');
    }


}
