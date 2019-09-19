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

Route::redirect('/', '/login');
Route::redirect('/home', '/fantasy-pool');

Route::get('/storage/{filename}', 'Auth\AccountController@getUserImage')->name('user.image');

Auth::routes();

Route::resource('fantasy-pool', 'FantasyPoolController')->except(['show']);
Route::get('/fantasy-pool/{pool}/dashboard', 'FantasyPool\DashboardController')->name('fantasy-pool.dashboard');
Route::get('/fantasy-pool/add-houseguest/{pool}', 'Admin\AddHouseguestController')->name('fantasy-pool.add_houseguest');

Route::get('/pool-players/{pool}', 'FantasyPool\ExistingPlayersController')->middleware('auth')->name('existing-players');
Route::get('/pool-houseguests/{pool}', 'FantasyPool\ExistingHouseguestsController')->name('existing-houseguests');

Route::resource('player', 'PlayerController')->only(['show']);
Route::post('/player-pick', 'PlayerPickController@store')->name('player-pick.store');
Route::get('/player-pick/{pool}', 'PlayerPickController@index')->name('player-pick.index');

Route::resource('houseguest', 'HouseguestController')->except(['index', 'destroy']);

Route::get('/account', 'Auth\AccountController@show')->name('account');
Route::post('/account/update', 'Auth\AccountController@update')->name('account.update');

Route::resource('login-as', 'Auth\LoginAsController')->only(['index', 'show']);

Route::post('/fantasy-pool/{pool}/invite', 'InvitationsController')->name('fantasy-pool.invitePlayer');
Route::get('/fantasy-pool/{pool}/game-actions', 'GameActionsController@index')->name('pool.game-actions');
Route::post('/fantasy-pool/{pool}/game-actions', 'GameActionsController@store')->name('pool.game-actions.store');
Route::get('/fantasy-pool/{pool}/game-actions/create', 'GameActionsController@create')->name('pool.game-actions.create');
Route::get('/fantasy-pool/{pool}/game-actions/{action}/edit', 'GameActionsController@edit')->name('pool.game-actions.edit');
Route::put('/fantasy-pool/{pool}/game-actions/{action}', 'GameActionsController@update')->name('pool.game-actions.update');
Route::delete('/game-actions/{action}', 'GameActionsController@destroy')->name('game-actions.destroy');

Route::resource('houseguest-actions', 'HouseguestActionsController')->only(['store', 'destroy']);
