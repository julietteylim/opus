@extends('layouts.app')

@section('title', '| Rotations')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Most recent rotations</div>

                <div class="panel-body">

                  <form method="post" action="{{ action('PostingController@store') }}">

                    {{ csrf_field() }}

                    <div class="form-group">

                        <label for="company_name">Company name*:</label>
                        <input type="text" class="form-control" id="company_name" name="company_name" placeholder="Hooli" required>

                        <label for="company_desc">Company description:</label>
                        <textarea class="form-control" id="company_desc" name="company_desc" rows="3" placeholder="Company description here" required></textarea>

                        <label for="company_size">Company size*:</label>
                        <input type="text" class="form-control" id="company_size" name="company_size" placeholder="2-10 employees" required>

                        <label for="logo_url">Logo Url*:</label>
                        <input type="text" class="form-control" id="logo_url" name="logo_url" placeholder="http://companylogo.png" required>

                        <label for="location">Location*:</label>
                        <input type="text" class="form-control" id="location" name="location" placeholder="Silicon Valley, CA" required>

                        <label for="function">Function/Team*:</label>
                        <input type="text" class="form-control" id="function" name="function" placeholder="COO's team" required>

                        <label for="role">Role*:</label>
                        <input type="text" class="form-control" id="role" name="role" placeholder="Operations analyst" required>

                        <label for="role_desc">Role Description*:</label>
                        <textarea class="form-control" id="role_desc" name="role_desc" rows="3" placeholder="Role description here" required></textarea>

                        <label for="duration">Duration*:</label>
                        <input type="text" class="form-control" id="duration" name="duration" placeholder="6 months" required>

                        <label for="start_date">Preferred Start Date*:</label>
                        <input type="text" class="form-control" id="start_date" name="start_date" placeholder="Jan-Mar 2018" required>

                        <label for="short_desc">Short Description*:</label>
                        <input type="text" class="form-control" id="short_desc" name="short_desc" placeholder="Chief of Staff for SV Technology Startup" required>

                        <label for="candidate_bg">Preferred candidate background:</label>
                        <textarea class="form-control" id="candidate_bg" name="candidate_bg" rows="3" placeholder="Would like someone fluent in SQL/Tableau" required></textarea>

                        <label for="reason1">Reason 1*:</label>
                        <input type="text" class="form-control" id="reason1" name="reason1" placeholder="Reason this rotation rocks" required>

                        <label for="reason2">Reason 2*:</label>
                        <input type="text" class="form-control" id="reason2" name="reason2" placeholder="Reason this rotation rocks" required>

                        <label for="reason3">Reason 3*:</label>
                        <input type="text" class="form-control" id="reason3" name="reason3" placeholder="Reason this rotation rocks" required>
                    </div>

                    <button type="submit" class="btn btn-primary"> Add rotation </button>

                  </form>


              </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
