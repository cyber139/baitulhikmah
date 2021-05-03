<?php
use App\Notice;
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

    $notice = Notice::orderBy('id', 'DESC','Publish','Yes')->first();
    return view('welcome',['notice'=>$notice]);
});

// Route::get('/admin', function () {
//     return view('admin.home');
// });

Auth::routes();



Route::middleware('auth')->group(function(){
    
    
    Route::get('/home', 'HomeController@index')->name('home');
    // Route::get('/home', 'AdminController@index')->name('admin.home')->middleware('isAdmin');

    
    // Notice
    Route::get('/notice', 'NoticeController@index')->name('notice');
    // Route::get('/admin/notice/{$notice}', 'NoticeController@show')->name('admin.notice-detail');
    Route::get('/notice-detail/{notice}', 'NoticeController@show')->name('notice-detail');
    // Route::get('/notice-detail', 'NoticeController@show')->name('notice-detail');

    //  USER PROFILE    
    Route::get('/user/{user}/profile', 'UserController@show')->name('user.index');
    Route::post('/user/{user}/update', 'UserController@update')->name('user.update');

    // // TEACHER
    // Route::get('/home', 'TeacherController@index')->name('home');

    // HOME


    
    
    
    
});




