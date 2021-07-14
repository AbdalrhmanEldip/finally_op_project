<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;







Route::post('/login' , '\App\Http\Controllers\AdminController@doLogin')->name('login');

Route::post('/saveAdminData' , '\App\Http\Controllers\AdminController@register');

Route::post('/update-admin-data/{admin_id}' , '\App\Http\Controllers\AdminController@update');

Route::post('/logout' , '\App\Http\Controllers\AdminController@doLogout');

Route::post('/admin-search' , '\App\Http\Controllers\AdminController@searchAdmin')->name('search');

Route::post('/admin-activation/{id}' , '\App\Http\Controllers\AdminController@activation');



Route::get('/' , '\App\Http\Controllers\AdminController@showLoginForm')->name('login');

Route::get('/admin-register' , '\App\Http\Controllers\AdminController@showAdminRegister');

Route::get('/delete-admin/{id}' , '\App\Http\Controllers\AdminController@delete');

Route::get('/unActive-all-admins' , '\App\Http\Controllers\AdminController@DeleteAll');

