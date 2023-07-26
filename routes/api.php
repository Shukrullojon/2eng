<?php

// auth
Route::group(['prefix' => 'auth', 'namespace' => '\App\Http\Controllers\Api'], function () {
    Route::post('/register/phone', 'AuthController@phone');
    Route::post('/register/code', 'AuthController@code');
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
// blog
Route::group(['prefix' => 'blog', 'namespace' => '\App\Http\Controllers\Api'], function () {
    Route::get('/get', 'BlogController@get');
});
// Listening
Route::group(['prefix' => 'listening', 'namespace' => '\App\Http\Controllers\Api'], function () {
    Route::get('/get', 'ListeningController@get');
    Route::post('/result', 'ListeningController@result');
});
// Listening Repeat
Route::group(['prefix' => 'listening_repeat', 'namespace' => '\App\Http\Controllers\Api'], function () {
    Route::get('/get', 'ListeningRepeatController@get');
});
// Speaking
Route::group(['prefix' => 'speaking', 'namespace' => '\App\Http\Controllers\Api'], function () {
    Route::get('/get', 'SpeakingController@get');
});
// Vocabulary
Route::group(['prefix' => 'vocabulary', 'namespace' => '\App\Http\Controllers\Api'], function () {
    Route::get('/get', 'VocabularyController@get');
    Route::post('/result', 'VocabularyController@result');
});
