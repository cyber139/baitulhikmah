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
    Route::get('/admin/users', 'UserController@index')->name('admin.uac');

    // ADMIN : NOTICE BOARD
    Route::get('/admin/notice/all', 'NoticeController@show1')->name('notice.index');
    Route::get('/admin/notice/create', 'NoticeController@create')->name('notice.create');
    Route::post('/admin/notice', 'NoticeController@store')->name('notice.store');
    Route::delete('/admin/notice/{notice}/delete', 'NoticeController@destroy')->name('notice.destroy');
    Route::get('/admin/notice/{notice}/edit', 'NoticeController@edit')->name('notice.edit');
    Route::post('/admin/notice/{notice}/update', 'NoticeController@update')->name('notice.update');
    
});


