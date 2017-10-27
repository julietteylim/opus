<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Postings;
use App\Profiles;
use App\Interests;
use Auth;
use Session;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      $postings = Postings::latest()->get();
      $user = Auth::user();
      $uid = $user->id;
      $profile = Profiles::where('user_id',$uid)->first();
      $interest = Interests::where ('user_id',$uid)->get();

      return view ('postings.index', compact('postings','user','profile','interest'));

    }
}
