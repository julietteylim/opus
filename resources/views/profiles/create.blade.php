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
                  <img src="{{$user->avatar}}" style="width:150px; height:150px; float:left; margin-right: 25px; border-radius: 50%;">


            <h2> {{ $user->name }}'s Profile </h2>
            <h4> {{ $user->email }} </h4>



            <!--- Post avatar form---><!---
            <form enctype="multipart/form-data" action="avatar" method="post">
                <label>Update profile image</label>
                <input type="file" name="avatar" />
                {{ csrf_field() }}
                <button type="submit" class="btn pull-right btn-outline"> Submit photo</button>
            </form>-->

            <!-- Post user data form-->
            <br><br><br><br>
            <form class="form-horizontal" method="post" action="{{ action('ProfileController@store') }}">
              <div class="form-group">
                {{ csrf_field() }}
                <label class="control-label col-sm-2" for="aboutme">About me*:</label>
                <div class="col-sm-10">
                  <textarea class="form-control" name="aboutme" id="aboutme" rows="3" placeholder="Tell prospective employers a little bit about yourself! Are you looking for this to lead to a FT job? Are you going to BSchool after? Do you have any strict preferences? (i.e., need to be in Boston; require a H1B work visa)" required>@if ($profile) {{$profile->aboutme}} @endif</textarea>
                </div>
              </div><br>

              <div class="form-group">
                <label class="control-label col-sm-2" for="phone">Phone*:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="phone" id="phone" placeholder="XXX-XXX-XXXX" value="@if ($profile) {{$profile->phone}} @endif" required>
                </div>
              </div><br>

              <div class="form-group">
                <label class="control-label col-sm-2" for="work">Work*:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="work" id="work" placeholder="Hooli" value="@if ($profile) {{$profile->work}} @endif" required>
                </div>
              </div><br>

              <div class="form-group">
                <label class="control-label col-sm-2" for="education">Education*:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="education" id="education" placeholder="Stanford University; Economics; Graduated 2015" value="@if ($profile) {{$profile->education}} @endif" required>
                </div>
              </div><br>

              <div class="form-group">
                <label class="control-label col-sm-2" for="industry">Industry pref*:</label>
                <div class="col-sm-10">
                <div class="checkbox checkbox-success">
                    <label class="checkbox-inline" for="strategy"><input type="checkbox" name="industry[]" value="Consumer" @if ($profile) @if (in_array("Consumer", $industryarray)) checked=checked @endif @endif>Consumer</label>
                    <label class="checkbox-inline" for="operations"><input type="checkbox" name="industry[]" value="Healthcare" @if ($profile) @if (in_array("Healthcare", $industryarray)) checked=checked @endif @endif>Healthcare</label>
                    <label class="checkbox-inline" for="growth"><input type="checkbox" name="industry[]" value="Tech" @if ($profile) @if (in_array("Tech", $industryarray)) checked=checked @endif @endif>Tech (AI, VR, SaaS, etc.)</label>
                    <label class="checkbox-inline" for="social sector"><input type="checkbox" name="industry[]" value="Social sector" @if ($profile) @if (in_array("Social sector", $industryarray)) checked=checked @endif @endif>Social sector</label>
                    <label class="checkbox-inline" for="finance"><input type="checkbox" name="industry[]" value="Finance" @if ($profile) @if (in_array("Finance", $industryarray)) checked=checked @endif @endif>Financial services (Fintech, Insurance, Credit cards, etc.)</label>
                    <label class="checkbox-inline" for="media"><input type="checkbox" name="industry[]" value="Media" @if ($profile) @if (in_array("Media", $industryarray)) checked=checked @endif @endif>Media</label>
                    <label class="checkbox-inline" for="travel/hospitality"><input type="checkbox" name="industry[]" value="Travel/Hospitality" @if ($profile) @if (in_array("Travel/Hospitality", $industryarray)) checked=checked @endif @endif>Travel/Hospitality</label>
                    <label class="checkbox-inline" for="industrials"><input type="checkbox" name="industry[]" value="Industrials" @if ($profile) @if (in_array("Industrials", $industryarray)) checked=checked @endif @endif>Industrials</label>
                    <label class="checkbox-inline" for="buy-side"><input type="checkbox" name="industry[]" value="Buy-side" @if ($profile) @if (in_array("Buyside", $industryarray)) checked=checked @endif @endif>Buyside</label>
                    <label class="checkbox-inline" for="flexible"><input type="checkbox" name="industry[]" value="Flexible" @if ($profile) @if (in_array("Flexible", $industryarray)) checked=checked @endif @endif>Flexible</label>

                  </div>
                </div>
              </div><br>

              <div class="form-group">
                <label class="control-label col-sm-2" for="role">Role pref*:</label>
                <div class="col-sm-10">
                <div class="checkbox checkbox-success">
                    <label class="checkbox-inline" for="strategy"><input type="checkbox" name="role[]" value="Strategy" @if ($profile) @if (in_array("Strategy", $rolearray)) checked=checked @endif @endif>Strategy</label>
                    <label class="checkbox-inline" for="operations"><input type="checkbox" name="role[]" value="Operations" @if ($profile) @if (in_array("Operations", $rolearray)) checked=checked @endif @endif>Operations</label>
                    <label class="checkbox-inline" for="growth"><input type="checkbox" name="role[]" value="Growth" @if ($profile) @if (in_array("Growth", $rolearray)) checked=checked @endif @endif>Growth</label>
                    <label class="checkbox-inline" for="product"><input type="checkbox" name="role[]" value="Product" @if ($profile) @if (in_array("Product", $rolearray)) checked=checked @endif @endif>Product</label>
                    <label class="checkbox-inline" for="marketing"><input type="checkbox" name="role[]" value="Marketing" @if ($profile) @if (in_array("Marketing", $rolearray)) checked=checked @endif @endif>Marketing</label>
                    <label class="checkbox-inline" for="data science"><input type="checkbox" name="role[]" value="Data Science" @if ($profile) @if (in_array("Data Science", $rolearray)) checked=checked @endif @endif>Data Science</label>
                    <label class="checkbox-inline" for="finance"><input type="checkbox" name="role[]" value="Finance" @if ($profile) @if (in_array("Finance", $rolearray)) checked=checked @endif @endif>Finance</label>
                    <label class="checkbox-inline" for="business development"><input type="checkbox" name="role[]" value="Business Development" @if ($profile) @if (in_array("Business Development", $rolearray)) checked=checked @endif @endif>Business Development</label>
                    <label class="checkbox-inline" for="customer experience"><input type="checkbox" name="role[]" value="Customer Experience" @if ($profile) @if (in_array("Customer Experience", $rolearray)) checked=checked @endif @endif>Customer Experience</label>
                    <label class="checkbox-inline" for="supply chain"><input type="checkbox" name="role[]" value="Supply Chain" @if ($profile) @if (in_array("Supply Chain", $rolearray)) checked=checked @endif @endif>Supply Chain</label>
                    <label class="checkbox-inline" for="flexible"><input type="checkbox" name="role[]" value="Flexible" @if ($profile) @if (in_array("Flexible", $rolearray)) checked=checked @endif @endif>Flexible</label>

                  </div>
                </div>
              </div><br>

              <div class="form-group">
                <label class="control-label col-sm-2" for="location">Location pref*:</label>
                <div class="col-sm-10">
                <div class="checkbox checkbox-success">
                    <label class="checkbox-inline" for="New York"><input type="checkbox" name="location[]" value="New York" @if ($profile) @if (in_array("New York", $locationarray)) checked=checked @endif @endif>New York</label>
                    <label class="checkbox-inline" for="San Francisco"><input type="checkbox" name="location[]" value="San Francisco" @if ($profile) @if (in_array("San Francisco", $locationarray)) checked=checked @endif @endif>San Francisco</label>
                    <label class="checkbox-inline" for="Chicago"><input type="checkbox" name="location[]" value="Chicago"  @if ($profile) @if (in_array("Chicago", $locationarray)) checked=checked @endif @endif>Chicago</label>
                    <label class="checkbox-inline" for="Boston"><input type="checkbox" name="location[]" value="Boston" @if ($profile) @if (in_array("Boston", $locationarray)) checked=checked @endif @endif>Boston</label>
                    <label class="checkbox-inline" for="DC"><input type="checkbox" name="location[]" value="DC" @if ($profile) @if (in_array("DC", $locationarray)) checked=checked @endif @endif>DC</label>
                    <label class="checkbox-inline" for="LA"><input type="checkbox" name="location[]" value="LA" @if ($profile) @if (in_array("LA", $locationarray)) checked=checked @endif @endif>LA</label>
                    <label class="checkbox-inline" for="Dallas"><input type="checkbox" name="location[]" value="Dallas" @if ($profile) @if (in_array("Dallas", $locationarray)) checked=checked @endif @endif>Dallas</label>
                    <label class="checkbox-inline" for="Denver"><input type="checkbox" name="location[]" value="Denver" @if ($profile) @if (in_array("Denver", $locationarray)) checked=checked @endif @endif>Denver</label>
                    <label class="checkbox-inline" for="Seattle"><input type="checkbox" name="location[]" value="Seattle" @if ($profile) @if (in_array("Seattle", $locationarray)) checked=checked @endif @endif>Seattle</label>
                    <label class="checkbox-inline" for="Remote"><input type="checkbox" name="location[]" value="Remote" @if ($profile) @if (in_array("Remote", $locationarray)) checked=checked @endif @endif>Remote</label>
                    <label class="checkbox-inline" for="Flexible"><input type="checkbox" name="location[]" value="Flexible" @if ($profile) @if (in_array("Flexible", $locationarray)) checked=checked @endif @endif>Flexible</label>
                  </div>
                </div>
              </div><br>

              <div class="form-group">
                <label class="control-label col-sm-2" for="timing">Timing pref*:</label>
                <div class="col-sm-10">
                  <div class="checkbox checkbox-success">
                    <label class="checkbox-inline" for="Immediate"><input type="checkbox" name="timing[]" value="Immediate" @if ($profile) @if (in_array("Immediate", $timingarray)) checked=checked @endif @endif>Immediate (0-3 months)</label>
                    <label class="checkbox-inline" for="Soon"><input type="checkbox" name="timing[]" value="Soon" @if ($profile) @if (in_array("Soon", $timingarray)) checked=checked @endif @endif>Soon (3-6 months)</label>
                    <label class="checkbox-inline" for="Passive"><input type="checkbox" name="timing[]" value="Passive" @if ($profile) @if (in_array("Passive", $timingarray)) checked=checked @endif @endif>Passive (6 months - 1 year)</label>
                    <label class="checkbox-inline" for="Future"><input type="checkbox" name="timing[]" value="Future" @if ($profile) @if (in_array("Future", $timingarray)) checked=checked @endif @endif>Future (1 year +) </label>
                  </div>
                </div>
              </div><br>


              <button type="submit" name="save" class="btn pull-right btn-outline">Save profile data</button>

            </form>

            <br><br><br>
          </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
