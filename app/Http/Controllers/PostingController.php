<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Postings;
use App\Profiles;
use App\Interests;
use Auth;

class PostingController extends Controller
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

    /*
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // responds to /postings

        $postings = Postings::latest()->get();
        $user = Auth::user();
        $uid = $user->id;
        $profile = Profiles::where('user_id',$uid)->first();
        $myinterests = Interests::where('user_id',$uid)->join('postings','posting_id','=','postings.id')->get();

        return view ('postings.index', compact('postings','user','profile','myinterests'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // responds to /postings/create


        return view ('postings.create', compact('postings'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        // responds to POSTS /postings

        // Validate the request
        /*$this->validate(request(), [

          'company_name' => 'required',
          'logo_url' => 'required',
          'role' => 'required',
          'location' => 'required',
          'duration' => 'required',
          'short_desc' => 'required',
          'long_desc' => 'required'
        ]);*/

        // Create a new posting using the data submitted
        $posting = new Postings;

        $posting->company_name = request('company_name');
        $posting->company_desc = request('company_desc');
        $posting->company_size = request('company_size');
        $posting->logo_url = request('logo_url');
        $posting->location = request('location');
        $posting->function = request('function');
        $posting->role = request('role');
        $posting->role_desc = request('role_desc');
        $posting->candidate_bg = request('candidate_bg');
        $posting->start_date = request('start_date');
        $posting->duration = request('duration');
        $posting->short_desc = request('short_desc');
        $posting->reason1 = request('reason1');
        $posting->reason2 = request('reason2');
        $posting->reason3 = request('reason3');


        // Save it to Database
        $posting->save();

        // Redirect to a page
        return view('postings.create');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Postings $postings)
    {
        // responds to GET /postings/{id}

        //return $postings;

        return view('postings.show', compact('postings'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // responds to GET /postings/{id}/edit
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
        // responds to PATCH /postings/{id}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // responds to DELETE /tasks/{id}
    }
}
