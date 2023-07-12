<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::group(['middleware' => 'auth'], function () {

    Route::get('/', [App\Http\Controllers\Blade\HomeController::class, 'index']);
    Route::get('/home', [App\Http\Controllers\Blade\HomeController::class, 'index'])->name('home');


    // Module
    Route::group(['prefix' => 'module', 'namespace' => '\App\Http\Controllers\Admin'], function () {
        Route::get('/', 'ModuleController@index')->name('moduleIndex');
        Route::get('/create', 'ModuleController@create')->name('moduleCreate');
        Route::post('/store', 'ModuleController@store')->name('moduleStore');
        Route::get('/show/{id}', 'ModuleController@show')->name('moduleShow');
        Route::get('/edit/{id}', 'ModuleController@edit')->name('moduleEdit');
        Route::post('/update/{id}', 'ModuleController@update')->name('moduleUpdate');
        Route::delete('/delete/{id}', 'ModuleController@delete')->name('moduleDelete');
    });
    // Day
    Route::group(['prefix' => 'day', 'namespace' => '\App\Http\Controllers\Admin'], function () {
        Route::get('/', 'DayController@index')->name('dayIndex');
        Route::get('/create', 'DayController@create')->name('dayCreate');
        Route::post('/store', 'DayController@store')->name('dayStore');
        Route::get('/show/{id}', 'DayController@show')->name('dayShow');
        Route::get('/edit/{id}', 'DayController@edit')->name('dayEdit');
        Route::post('/update/{id}', 'DayController@update')->name('dayUpdate');
        Route::delete('/delete/{id}', 'DayController@delete')->name('dayDelete');
    });
    // Grammer
    Route::group(['prefix' => 'grammer', 'namespace' => '\App\Http\Controllers\Admin'], function () {
        Route::get('/', 'GrammerController@index')->name('grammerIndex');
        Route::get('/create', 'GrammerController@create')->name('grammerCreate');
        Route::post('/store', 'GrammerController@store')->name('grammerStore');
        Route::get('/show/{id}', 'GrammerController@show')->name('grammerShow');
        Route::get('/edit/{id}', 'GrammerController@edit')->name('grammerEdit');
        Route::post('/update/{id}', 'GrammerController@update')->name('grammerUpdate');
        Route::delete('/delete/{id}', 'GrammerController@delete')->name('grammerDelete');
        Route::post('/partStore/{id}', 'GrammerController@partstore')->name('partStoreGrammer');
    });
    // Part
    Route::group(['prefix' => 'part', 'namespace' => '\App\Http\Controllers\Admin'], function () {
        Route::get('/edit/{id}', 'PartController@edit')->name('partEdit');
        Route::post('/update/{id}', 'PartController@update')->name('partUpdate');
        Route::delete('/delete/{id}', 'PartController@delete')->name('partDelete');
    });
    // Blog
    Route::group(['prefix' => 'blog', 'namespace' => '\App\Http\Controllers\Admin'], function () {
        Route::get('/', 'BlogController@index')->name('blogIndex');
        Route::get('/create', 'BlogController@create')->name('blogCreate');
        Route::post('/store', 'BlogController@store')->name('blogStore');
        Route::get('/show/{id}', 'BlogController@show')->name('blogShow');
        Route::get('/edit/{id}', 'BlogController@edit')->name('blogEdit');
        Route::post('/update/{id}', 'BlogController@update')->name('blogUpdate');
        Route::delete('/delete/{id}', 'BlogController@delete')->name('blogDelete');
    });
    // Listening
    Route::group(['prefix' => 'listening', 'namespace' => '\App\Http\Controllers\Admin'], function () {
        Route::get('/', 'ListeningController@index')->name('listeningIndex');
        Route::get('/create', 'ListeningController@create')->name('listeningCreate');
        Route::post('/store', 'ListeningController@store')->name('listeningStore');
        Route::get('/show/{id}', 'ListeningController@show')->name('listeningShow');
        Route::get('/edit/{id}', 'ListeningController@edit')->name('listeningEdit');
        Route::post('/update/{id}', 'ListeningController@update')->name('listeningUpdate');
        Route::delete('/delete/{id}', 'ListeningController@delete')->name('listeningDelete');
        Route::post('/partstorelistening/{id}', 'ListeningController@partstore')->name('partStoreListening');
    });
    // Listening Repeat
    Route::group(['prefix' => 'listen_repeat', 'namespace' => '\App\Http\Controllers\Admin'], function () {
        Route::get('/', 'ListeningRepeatController@index')->name('listeningRepeatIndex');
        Route::get('/create', 'ListeningRepeatController@create')->name('listeningRepeatCreate');
        Route::post('/store', 'ListeningRepeatController@store')->name('listeningRepeatStore');
        Route::get('/show/{id}', 'ListeningRepeatController@show')->name('listeningRepeatShow');
        Route::get('/edit/{id}', 'ListeningRepeatController@edit')->name('listeningRepeatEdit');
        Route::post('/update/{id}', 'ListeningRepeatController@update')->name('listeningRepeatUpdate');
        Route::delete('/delete/{id}', 'ListeningRepeatController@delete')->name('listeningRepeatDelete');
    });
    // Speaking
    Route::group(['prefix' => 'speaking', 'namespace' => '\App\Http\Controllers\Admin'], function () {
        Route::get('/', 'SpeakingController@index')->name('speakingIndex');
        Route::get('/create', 'SpeakingController@create')->name('speakingCreate');
        Route::post('/store', 'SpeakingController@store')->name('speakingStore');
        Route::get('/show/{id}', 'SpeakingController@show')->name('speakingShow');
        Route::get('/edit/{id}', 'SpeakingController@edit')->name('speakingEdit');
        Route::post('/update/{id}', 'SpeakingController@update')->name('speakingUpdate');
        Route::delete('/delete/{id}', 'SpeakingController@delete')->name('speakingDelete');
    });
    // Vocabulary
    Route::group(['prefix' => 'vocabulary', 'namespace' => '\App\Http\Controllers\Admin'], function () {
        Route::get('/', 'VocabularyController@index')->name('vocabularyIndex');
        Route::get('/create', 'VocabularyController@create')->name('vocabularyCreate');
        Route::post('/store', 'VocabularyController@store')->name('vocabularyStore');
        Route::get('/show/{id}', 'VocabularyController@show')->name('vocabularyShow');
        Route::get('/edit/{id}', 'VocabularyController@edit')->name('vocabularyEdit');
        Route::post('/update/{id}', 'VocabularyController@update')->name('vocabularyUpdate');
        Route::delete('/delete/{id}', 'VocabularyController@delete')->name('vocabularyDelete');
        Route::post('/partstorevocabulary/{id}', 'VocabularyController@partstore')->name('partStoreVocabulary');
    });


    // User
    Route::group(['prefix' => 'user', 'namespace' => '\App\Http\Controllers\Blade'], function () {
        Route::get('/', 'UserController@index')->name('userIndex');
        Route::get('/add', 'UserController@add')->name('userAdd');
        Route::post('/create', 'UserController@create')->name('userCreate');
        Route::get('/{id}/edit', 'UserController@edit')->name('userEdit');
        Route::post('/update/{id}', 'UserController@update')->name('userUpdate');
        Route::delete('/delete/{id}', 'UserController@destroy')->name('userDestroy');
        Route::get('/theme-set/{id}', 'UserController@setTheme')->name('userSetTheme');
    });

    // Permission
    Route::group(['prefix' => 'permission', 'namespace' => '\App\Http\Controllers\Blade'], function () {
        Route::get('/', 'PermissionController@index')->name('permissionIndex');
        Route::get('/add', 'PermissionController@add')->name('permissionAdd');
        Route::post('/create', 'PermissionController@create')->name('permissionCreate');
        Route::get('/{id}/edit', 'PermissionController@edit')->name('permissionEdit');
        Route::post('/update/{id}', 'PermissionController@update')->name('permissionUpdate');
        Route::delete('/delete/{id}', 'PermissionController@destroy')->name('permissionDestroy');
    });

    // Role
    Route::group(['prefix' => 'role', 'namespace' => '\App\Http\Controllers\Blade'], function () {
        Route::get('/', 'RoleController@index')->name('roleIndex');
        Route::get('/add', 'RoleController@add')->name('roleAdd');
        Route::post('/create', 'RoleController@create')->name('roleCreate');
        Route::get('/{id}/edit', 'RoleController@edit')->name('roleEdit');
        Route::post('/update/{id}', 'RoleController@update')->name('roleUpdate');
        Route::delete('/delete/{id}', 'RoleController@destroy')->name('roleDestroy');
    });

    // teachers
    Route::group(['prefix' => 'teacher', 'namespace' => '\App\Http\Controllers\Admin'], function () {
        Route::get('/', 'TeacherController@index')->name('teacherIndex');
        Route::get('/create', 'TeacherController@create')->name('teacherCreate');
        Route::post('/store', 'TeacherController@store')->name('teacherStore');
        Route::get('/show/{id}', 'TeacherController@show')->name('teacherShow');
        Route::get('/edit/{id}', 'TeacherController@edit')->name('teacherEdit');
        Route::post('/update/{id}', 'TeacherController@update')->name('teacherUpdate');
        Route::delete('/delete/{id}', 'TeacherController@delete')->name('teacherDelete');
    });
    // infos
    Route::group(['prefix' => 'info', 'namespace' => '\App\Http\Controllers\Admin'], function () {
        Route::get('/', 'InfoController@index')->name('infoIndex');
        Route::get('/create', 'InfoController@create')->name('infoCreate');
        Route::post('/store', 'InfoController@store')->name('infoStore');
        Route::get('/show/{id}', 'InfoController@show')->name('infoShow');
        Route::get('/edit/{id}', 'InfoController@edit')->name('infoEdit');
        Route::post('/update/{id}', 'InfoController@update')->name('infoUpdate');
        Route::delete('/delete/{id}', 'InfoController@delete')->name('infoDelete');
    });

});

// Change language session condition
Route::get('/language/{lang}', function ($lang) {
    $lang = strtolower($lang);
    if ($lang == 'ru' || $lang == 'uz') {
        session([
            'locale' => $lang
        ]);
    }
    return redirect()->back();
});
