<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Image;

use App\Profiles;
use App\Users;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // $profiles = Profiles::all();
        $user = Auth::user();
        $uid = $user->id;
        $profile = Profiles::where('user_id',$uid)->first();
        if ($profile) {
          $rolearray = explode(",",$profile->role);
          $locationarray = explode(",",$profile->location);
          $industryarray = explode(",",$profile->industry);
          $timingarray = explode(",",$profile->timing);
          return view('profiles.create', compact('user','profile', 'rolearray', 'locationarray', 'industryarray', 'timingarray'));
        } else {

          return view('profiles.create', compact('user','profile'));
        }


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $user = Auth::user();
        // Validate the request
        $profiles = Profiles::all();

        $usercount = Profiles::where('user_id', '=', $user->id)->get();

        if(count($usercount) > 0)
        {
          // If data already exists, find associated data
          $user = Auth::user();
          $profile = Profiles::where('user_id', '=', $user->id)->first();

          // Create a new posting using the data submitted
          $profile->user_id = $user->id;
          $profile->aboutme = $request->input('aboutme');
          $profile->linkedin = $user->linkedin_url;
          $profile->phone = $request->input('phone');
          $profile->work = $request->input('work');
          $profile->education = $request->input('education');
          $profile->location = implode(",", $request->get('location'));
          $profile->industry = implode(",", $request->get('industry'));
          $profile->role = implode(",", $request->get('role'));
          $profile->timing = implode(",", $request->get('timing'));

          $profile->save();
          return redirect('profiles');
          }
        else
        {
          // If data does not exist, create new
          $profile = new Profiles;
          $user = Auth::user();
          // Create a new posting using the data submitted
          $profile->user_id = $user->id;
          $profile->aboutme = $request->input('aboutme');
          $profile->linkedin = $user->linkedin_url;
          $profile->phone = $request->input('phone');
          $profile->work = $request->input('work');
          $profile->education = $request->input('education');
          $profile->location = implode(",", $request->get('location'));
          $profile->industry = implode(",", $request->get('industry'));
          $profile->role = implode(",", $request->get('role'));
          $profile->timing = implode(",", $request->get('timing'));

          $profile->save();
          return redirect('profiles');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }




}
