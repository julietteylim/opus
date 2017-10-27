@extends('layouts.app')

@section('title', '| Profile')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <div class="panel panel-default">
              <div class="panel-heading">
                <div align="left">My Profile</div>

              </div>

                <div class="panel-body">
                  <div class="row" style="padding-left:50px; margin-bottom: 50px;">
                    <br><button class="btn btn-default" style="float:right; margin-right: 50px;"> <a href="{{ url('/profiles/create ')}}"> Update profile </a></button>
                  <img src="{{ $user->avatar }}" style="width:150px; height:150px; float:left; margin-right: 25px; border-radius: 50%;">
                    <h2> {{ $user->name }}'s Profile </h2>
                    <h4> {{ $user->email }} </h4>



                  </div>

                <div class="container">
                <div class="row" style="padding-left: 50px;">
                  <div class="col-md-6">



                    @foreach ($profiles as $profile)
                      @if ($profile->user_id === $user->id)

                      <h4> General </h4>
                      <div class="row">
                        <div class="col-sm-3"><b>About me: </b></div><div class="col-sm-9">{{$profile->aboutme}}</div>
                      </div><br>
                      <div class="row">
                        <div class="col-sm-3"><b>Phone: </b></div><div class="col-sm-9">{{$profile->phone}}</div>
                      </div>

                      <hr>
                      <h4> Background </h4>
                      <div class="row">
                        <div class="col-sm-3"><b>Education: </b></div><div class="col-sm-9">{{$profile->education}}</div>
                      </div><br>
                      <div class="row">
                        <div class="col-sm-3"><b>Work: </b></div><div class="col-sm-9">{{$profile->work}}</div>
                      </div>

                      <hr>
                      <h4> Preferences </h4>
                      <div class="row">
                        <div class="col-sm-3"><b>Location pref: </b></div><div class="col-sm-9">{{$profile->location}}</div>
                      </div><br>
                      <div class="row">
                        <div class="col-sm-3"><b>Industry pref: </b></div><div class="col-sm-9">{{$profile->industry}}</div>
                      </div><br>
                      <div class="row">
                        <div class="col-sm-3"><b>Role pref: </b></div><div class="col-sm-9">{{$profile->role}}</div>
                      </div><br>
                      <div class="row">
                        <div class="col-sm-3"><b>Timing pref: </b></div><div class="col-sm-9">{{$profile->timing}}</div>
                      </div>

                      @endif
                    @endforeach


                  </div>
              </div>
              </div>


            <br><br><br>
          </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
