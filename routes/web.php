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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/admin', function () {
//     return view('admin.home');
// });

Auth::routes();



Route::middleware('auth')->group(function(){
    Route::get('/home', 'HomeController@index')->name('home');
    
    // Notice
    Route::get('/notice', 'NoticeController@index')->name('notice');
    // Route::get('/admin/notice/{$notice}', 'NoticeController@show')->name('admin.notice-detail');
    Route::get('/notice-detail/{notice}', 'NoticeController@show')->name('notice-detail');
    // Route::get('/notice-detail', 'NoticeController@show')->name('notice-detail');



    // ADMIN
    Route::get('/admin', 'AdminController@index')->name('admin.home');
    // Route::get('/admin/notice', 'AdminController@show')->name('admin.notice');
    
    //  ADMIN : USER PROFILE    
    Route::get('/admin/user/{user}/profile', 'UserController@show')->name('admin.user.index');
    Route::post('/admin/user/{user}/update', 'UserController@update')->name('admin.user.update');

    // ADMIN : USER ACCESS CONTROL
    Route::get('/admin/uac', 'UacController@uac')->name('admin.uac.index');
    Route::get('/admin/uac/{user}/edit', 'UacController@uac_edit')->name('admin.uac.edit');
    Route::delete('/admin/uac/{user}/delete', 'UacController@uac_delete')->name('admin.uac.destroy');
    Route::get('/admin/uac/create', 'UacController@uac_create')->name('admin.uac.create');
    Route::post('/admin/uac', 'UacController@uac_store')->name('uac.store');
    Route::put('/admin/uac/{user}/attach', 'UacController@attach')->name('uac.attach');
    Route::put('/admin/uac/{user}/detach', 'UacController@detach')->name('uac.detach');
    Route::post('/admin/uac/{user}/status', 'UacController@status')->name('uac.status');

    // ADMIN : NOTICE BOARD
    Route::get('/admin/notice/all', 'NoticeController@show1')->name('notice.index');
    Route::post('/admin/notice', 'NoticeController@store')->name('notice.store');
    Route::get('/admin/notice/create', 'NoticeController@create')->name('notice.create');
    Route::delete('/admin/notice/{notice}/delete', 'NoticeController@destroy')->name('notice.destroy');
    Route::get('/admin/notice/{notice}/edit', 'NoticeController@edit')->name('notice.edit');
    Route::post('/admin/notice/{notice}/update', 'NoticeController@update')->name('notice.update');
    
});




