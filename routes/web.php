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
//queue test route
Route::get('home/send', 'HomeController@send');


//team and members 
Route::get('teams/store', 'TeamsController@store');
Route::get('team/updateteam/{id}', 'TeamsController@updateTeam');
Route::get('team/destroy/{id}', 'TeamsController@destroy');
Route::resource('teams', TeamsController::class);

Route::get('member/store', 'MembersController@store');
Route::get('member/update/{id}', 'MembersController@update');
Route::get('member/destroy/{id}', 'MembersController@destroy');
Route::resource('members', MembersController::class);

Route::group(['middleware' => 'auth'], function () {
	


    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
});
