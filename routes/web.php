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



Route::middleware(['auth' ,'delete-expired', 'expire'])->group(function(){

	Route::get('/dashboard/{user_id}', '\App\Http\Controllers\DashController@showDashboard');

	Route::get('/deleted-user/{user_id}' , '\App\Http\Controllers\DashController@getDeletedUser');

	Route::get('/data/{user_id}' , '\App\Http\Controllers\DashController@getData');

});




//_____________________________________________________--//

Route::get('test' , '\App\Http\Controllers\DashController@test');
