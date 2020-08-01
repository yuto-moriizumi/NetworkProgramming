<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/index', 'HelloController@index');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->middleware('verified');

Route::resource('wcGroups', 'wc_groupController');

Route::resource('wcTournaments', 'wc_tournamentController');

Route::resource('wcRounds', 'wc_roundController');

Route::resource('wcMatches', 'wc_matchController');

Route::resource('wcResults', 'wc_resultController');
Route::get('/api', 'wc_resultController@tournamentId2Teams');

Route::resource('wcTeams', 'wc_teamController');
