<?php

// auth
Route::group(['prefix' => 'auth', 'namespace' => '\App\Http\Controllers\Api'], function () {
    Route::post('/register', 'AuthController@register');
    Route::post('/login', 'AuthController@login');
});

// day
Route::group(['prefix' => 'day', 'namespace' => '\App\Http\Controllers\Api'], function () {
    Route::get('/get', 'DayController@get');
});

// module
Route::group(['prefix' => 'module', 'namespace' => '\App\Http\Controllers\Api'], function () {
    Route::get('/get', 'ModuleController@get');
});

// teacher
Route::group(['prefix' => 'teacher', 'namespace' => '\App\Http\Controllers\Api'], function () {
    Route::get('/get', 'TeacherController@get');
});

// info
Route::group(['prefix' => 'info', 'namespace' => '\App\Http\Controllers\Api'], function () {
    Route::get('/get', 'InfoController@get');
});

// Grammer
Route::group(['prefix' => 'grammer', 'namespace' => '\App\Http\Controllers\Api'], function () {
    Route::get('/get', 'GrammerController@get');
    Route::post('/result', 'GrammerController@result');
});
