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

Route::get('/landing', function () {
    return view('landing');
});

Route::get('/landing', 'InformationsController@show');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('/informations', 'InformationsController');
    Route::get('/table/informations', 'InformationsController@dataTable')->name('table.informations');

    Route::resource('/jobs', 'JobsController');
    Route::get('/table/jobs', 'JobsController@dataTable')->name('table.jobs');

    Route::resource('/teams', 'TeamsController');
    Route::get('/table/teams', 'TeamsController@dataTable')->name('table.teams');
    Route::get('/search/teams', 'TeamsController@loadJobs');
    Route::get('/pdf/teams', 'TeamsController@exportPdf');
});
