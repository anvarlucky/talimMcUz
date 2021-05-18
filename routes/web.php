<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
Route::group(['namespace' => 'client'], function(){
    Route::get('student/{id}', 'StudentController@show')->name('student');
});

    Auth::routes();


Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
//
//Route::get('/login', 'Auth\LoginController@login' )->name('login');
//Route::post('/login', 'Auth\LoginController@login' )->middleware('admin');

Route::group(['middleware' => ['web','auth']], function () {
    Route::group(['namespace' => 'client'],function(){
        Route::resource('ticket','TicketController');
        Route::get('/', 'StudentController@index');
        Route::resource('students', 'StudentController');
        Route::get('studentsCertified', 'StudentController@indexCertified')->name('certified');
        Route::get('certificate/{id}','StudentController@certificate')->name('certificate');
        Route::get('order/{id}','StudentController@order')->name('order');
        Route::post('students.search', 'StudentController@search')->name('students.search');
    });
    Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['admin']], function() {
        Route::get('/', 'HomeController@index');
        Route::resource('regions', 'RegionController');
        Route::resource('districts', 'DistrictController');
        //Api uchun front
        Route::resource('reg', 'RegController');
        Route::resource('dis', 'DisController');
        //
        Route::resource('colleges', 'CollegeController');
        Route::resource('courses', 'CourseController');
        Route::resource('sts', 'StudentController');
        Route::resource('users', 'UserController');
        Route::resource('reg', 'RegController');
        Route::resource('dis', 'DisController');
    });
});



