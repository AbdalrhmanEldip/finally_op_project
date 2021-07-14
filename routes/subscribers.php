<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;




Route::post('/save-details' , '\App\Http\Controllers\SubscriberController@store');

Route::post('/subscriber-search' , '\App\Http\Controllers\SubscriberController@search');

Route::post('/deleted-subs-search' , '\App\Http\Controllers\SubscriberController@searchDeletedSubscribers');

Route::post('/register' , '\App\Http\Controllers\SubscriberController@register');

Route::post('/update-data/{subscriber_id}' , '\App\Http\Controllers\SubscriberController@update')->name('update');




Route::get('/userdelete/{subscriber_id}' , '\App\Http\Controllers\SubscriberController@delete');

Route::get('/restore-user/{subscriber_id}' , '\App\Http\Controllers\SubscriberController@restore');

Route::get('/erase/{admin_id}' , '\App\Http\Controllers\SubscriberController@erase');

Route::get('/print-details' , '\App\Http\Controllers\SubscriberController@printDetails');
