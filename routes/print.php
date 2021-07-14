<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;







Route::get('/subscribers-pdf-details', '\App\Http\Controllers\Print\SubscribersPdfController@pdf');

Route::get('/deleted-subscribers-pdf-details', '\App\Http\Controllers\Print\DeletedSubscribersPdfController@pdf');

Route::get('/deleted-subscribers-pdf-details/{sid}', '\App\Http\Controllers\Print\DeletedSubscribersPdfController@printDeleted');

Route::get('/pdf-details/{sid}', '\App\Http\Controllers\Print\SubscribersPdfController@convert_data_by_id');



Route::get('/admins-pdf-details', '\App\Http\Controllers\Print\AdminsPdfController@pdf');
Route::get('/admin-pdf-details-id/{aid}', '\App\Http\Controllers\Print\AdminsPdfController@convert_data_by_id');
