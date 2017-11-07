@extends('layouts.app')

@section('title', '| Rotations')

@section('content')

<div class="container">
    <div class="row">
      <div class="col-md-3">
        <div class="panel panel-default" id="userpanel">
          <center>
          <img src="{{$user->avatar}}" style="width:100px; height: 100px; border-radius: 50%;">
          <br>
          <h4><b>{{$user->name}} </b></h4>
          <p> {{$user->linkedin_headline}} </p>
          <br>
          <a href="{{ url('/profiles') }}" class="btn btn-default">View profile</a>
        </center>
        </div>

        @if ($profile)
        <div class="panel-body panel panel-default">
          <div class="row">

        <div class="col-sm-10">
        <button type="button" class="resumeupload" data-toggle="modal" href="profiles/resumeupload" data-target="#resumeupload"><b>Resume uploaded?</b></button>
        </div>

          <div class="col-sm-2">
            @if ($profile->resume)
            <i class="fa fa-check-circle" style="margin-top:7px; color: green;" aria-hidden="true"></i>
            @else
          <i class="fa fa-check-circle" style="opacity:0.2; margin-top:7px;" aria-hidden="true"></i>
            @endif
        </div>
        </div>


        </div>

        <div class="interestedpanel panel panel-default">
          <div class="panel-heading">
           <b>Rotations I am interested in</b>
        </div>

        <div class="panel-body">

          @foreach ($myinterests as $myinterest)
          <div class="row">

            <div class="row">
            <div class="col-sm-8 col-sm-offset-1">
                <a href="postings/{{ $myinterest->posting_id }}"> <p> {{$myinterest->company_name}} </p> </a>
                @if ($myinterest->status === 0) <div class="statuspending">PENDING</div>
                @else <div class="statusapplied">APPLIED</div>
                @endif
            </div>

            <div class="col-sm-3">

                <form class="form-inline" action="notinterested" method="post">
                  {{ csrf_field() }}
                <input type="hidden" name="posting_id" value="{{$myinterest->posting_id}}">
                <button type="submit" class="removesign">X</button>


            </div>
          </div>
      </div>

          <hr>
          @endforeach


        </div></div>
        @endif


      </div>
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">
                  <div align="left">Most recent rotations</div>

                </div>

                <div class="panel-body">

                  <div class="instructions">
                    Hey there! See a position you might be interested in? Click 'interested', and a member of our team will be in touch shortly to help you out. Feel free to select as many as you would like - there's no obligation to do anything!
                  </div>
                  <br>

                  @if ($profile)

                  @if (session('status'))
                      <div class="alert alert-success">
                          {{ session('status') }}
                      </div>
                  @endif

                  @if(Session::has('message'))
                  <div class="alert alert-success">{{ Session::get('message') }}</div>
                  @endif


                  @foreach ($postings as $posting)


                  <div class="row">

                    <div class="col-sm-2">
                      <div class="companycontainer">
                        <br><center>
                      <img src="{{ $posting->logo_url}}" class="companylogos" />
                        </center>
                      </div>
                    </div>

                    <div class="col-sm-10">
                      <a href="postings\{{ $posting->id }}"> <p> {{ $posting-> short_desc }} </p> </a>
                      <p> {{ $posting->location }} | {{ $posting->duration }} </p>

                      <form class="form-inline" action="interested" method="post"><div class="form group">
                        {{ csrf_field() }}
                      <input type="hidden" name="posting_id" value="{{$posting->id}}">
                      <button type="submit" data-id="{{ $posting->id }}" class="opusbtn btn btn-outline">Interested</button>

                      <button type="button" data-id="{{ $posting->id }}" class="opusbtn btn btn-outline" data-toggle="modal" href="postings/sendfriend" data-target="#sendfriend">Share with a friend for $200</button>
                    </div></form>


                    </div>
                  </div>

                    <div class="col-sm-12"><hr></div>



                @endforeach

                @else

                <h4><b> Profile preferences need to be updated before you can view available postings.  </h4></b>
                Please click View Profile > Update profile to make changes.

                @endif

@include('postings.sendfriend')
@include('profiles.resumeupload')

              </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<style>
.companycontainer {
  height: 100px;
  width: 100px;
  border-radius: 20px;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  margin:auto;
  vertical-align: middle;
}

.companylogos {
  width: auto;
  height: auto;
  max-width: 70px;
  max-height: 70px;
  display: block;
  vertical-align: middle;

}

.opusbtn {
  background-color: #004AAE;
  color: #FFF;
  font-family: Lato;
  border-radius: 10px;
}

.statuspending {
  background-color: #FFD700;
  color: black;
  font-family: Lato;
  border-radius: 10%;
  text-align:center;
  width: 80px;
  font-size: 8px;

}

.statusapplied {
  background-color: #008000;
  color: #FFF;
  font-family: Lato;
  border-radius: 10%;
  text-align:center;
  width: 80px;
  font-size: 8px;

}

.interestedpanel {
  background-color: #DCDCDC;
  height: 100%;
  padding: 10px;
  margin-bottom: 20px;
}

.removesign {

  font-size: 12px;
  color: #DCDCDC;
  text-align: center;
  border:none;
  outline:none;
  background:none;
  cursor:pointer;
}

.instructions {
  width: 100%;
  background-color: #E6F6FF;
  color: black;
  padding: 20px;
  border-radius: 20px;
}

.resumeupload {
  border: none;
  display: inline-block;
  background-color: #fff;
  margin: none;
  padding: none;
}


</style>
