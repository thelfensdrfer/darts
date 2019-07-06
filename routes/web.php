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

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

    Route::name('match.')->prefix('matches')->group(function () {
        Route::get('/create', 'MatchController@create')->name('create');
        Route::post('/', 'MatchController@store')->name('store');
        Route::get('/{match}', 'MatchController@show')->name('show');
    });

    Route::name('friend.')->prefix('friends')->group(function () {
        Route::get('/', 'FriendController@index')->name('index');
    });
});

Route::group([], function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('frontpage');
});

Auth::routes(['verify' => true]);
