@extends('layouts.app')

@section('title', '| Postings')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">

                  Most recent rotations

                </div>

                <div class="panel-body">

                  <div class="row">
                        <div class="col-sm-2">
                          <div class="companycontainer">
                            <br><center>
                          <img src="{{ $postings->logo_url}}" class="companylogos">
                            </center>
                          </div>
                        </div>

                        <div class="col-sm-6">
                      <h2> {{ $postings->company_name }} </h2>
                      <p> {{ $postings->company_size }} | {{ $postings->location }} </p>

                    </div>

                      <div class="col-sm-4"><br><br>

                        <form class="form-inline" action="interested" method="post"><div class="form group">
                          {{ csrf_field() }}
                        <input type="hidden" name="posting_id" value="{{$postings->id}}">
                        <button type="submit" data-id="{{ $postings->id}}" class="opusbtn btn btn-outline">Interested</button>

                        <button type="button" data-id="{{ $postings->id }}" class="opusbtn btn btn-outline" data-toggle="modal" href="postings/sendfriend" data-target="#sendfriend">Send to a friend</button>
                      </div></form>

                      </div>
                </div>

                <br><hr><div class="row">
                  <div class="col-sm-2">
                    <b><div style="margin-top:12px;"> Why Opus likes this rotation </div></b></div>
                  <div class="col-sm-10">

                    <p><li> {{ $postings->reason1 }} </p>
                      <p><li> {{ $postings->reason2 }} </p>
                        <p><li> {{ $postings->reason3 }} </p>
                  </div>
                </div><hr>

                <div class="row">
                  <div class="col-sm-2">
                    <br><b> Description: </b></div>
                  <div class="col-sm-10">
                    <br>
                    <p> {{ $postings->company_desc }} </p>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-2">
                    <br><b> Role: </b></div>
                  <div class="col-sm-10">
                    <br>
                    <p> {{ $postings->role }} </p>
                  </div>
                </div>


                <div class="row">
                  <div class="col-sm-2">
                    <br><b> Role Description: </b></div>
                  <div class="col-sm-10">
                    <br>
                    <p> {{ $postings->role_desc }} </p>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-2">
                    <br><b> Preferred Start Date: </b></div>
                  <div class="col-sm-10">
                    <br>
                    <p> {{ $postings->start_date }} </p>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-2">
                    <br><b> Length of Rotation: </b></div>
                  <div class="col-sm-10">
                    <br>
                    <p> {{ $postings->duration }} </p>
                  </div>
                </div>





              <br><br><div class="row">
                <div class="col-sm-1 col-sm-offset-11">
                <a href="{{ url('/postings') }}"> Back </a>
              </div>
            </div>

            </div>

@include('postings.sendfriend')




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
  border-radius: 10px;"
}


</style>
