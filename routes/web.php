<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
  return view('welcome');
});

Auth::routes();

// Routes with Linkedin

Route::get('linkedin', function () {return view('auth.login');});

Route::get('auth/linkedin', 'Auth\LinkedinController@redirectToLinkedin');

Route::get('auth/linkedin/callback', 'Auth\LinkedinController@handleLinkedinCallback');

// Routes regarding posting a rotation
Route::get('/postings', 'PostingController@index');

Route::get('/postings/create', 'PostingController@create');

Route::post('/postings', 'PostingController@store');

Route::post('/postings/sendfriend', 'InvitesController@store');

Route::post('interested', 'InterestsController@store');

Route::post('notinterested', 'InterestsController@destroy');

Route::get('/postings/{postings}', 'PostingController@show');

Route::post('/postings/{postings}', 'InterestsController@store');


// Home aka first landing page and if you click Opus logo
Route::get('/home', 'PostingController@index');


// Routes regarding profile information
Route::get('/profiles', 'UserController@index');

Route::get('/profiles/create', 'ProfileController@create');

Route::post('/profiles', 'ProfileController@store');

// Passes through this page when avatar is posted
Route::post('avatar', 'UserController@update_avatar');
