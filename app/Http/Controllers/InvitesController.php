<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Postings;
use App\Profiles;
use App\Invites;
use App\Interests;
use Auth;
use Session;

class InvitesController extends Controller
{
    //
    public function store() {

      $user = Auth::user();
      $uid = $user->id;
      $postings = Postings::latest()->get();
      $profile = Profiles::where('user_id',$uid)->first();
      $myinterests = Interests::where('user_id',$uid)->join('postings','posting_id','=','postings.id')->get();

      $invite = new Invites;
      $invite->user_id = $user->id;
      $invite->posting_id = request('posting_id');
      $invite->email = request('email');

      $invite->save();

      Session::flash('message', 'Invite sent successfully!');

      return redirect('postings');
    }
}
