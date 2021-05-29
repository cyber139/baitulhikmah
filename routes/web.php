<?php
use App\Notice;
// use Auth;
use Illuminate\Support\Facades\Auth;
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
    Route::get('/user/{user}/profile', 'ProfileController@show')->name('user.index');
    Route::post('/user/{user}/update', 'ProfileController@update')->name('user.update');
    Route::post('/user/{user}/edit', 'ProfileController@edit')->name('user.edit');
    // Route::get('user/{user}/create', 'ProfileController@create')->name('user.create');

    Route::post('/user/{user}/store', 'ProfileController@store')->name('user.store');

    // // TEACHER
    // Route::get('/home', 'TeacherController@index')->name('home');
    Route::get('teacher/subject/all', 'TeacherController@SubjectIndex')->name('teacher.subject.index');
    Route::get('teacher/subject/not_assigned', 'TeacherController@SubjectIndex')->name('teacher.subject.none');
    Route::get('teacher/subject/create', 'SubjectController@create')->name('subject.create');
    Route::post('teacher/subject/add', 'SubjectController@store')->name('subject.store');
    Route::get('teacher/subject/{subject}/edit', 'SubjectController@edit')->name('subject.edit');
    Route::post('teacher/subject/{subject}/update', 'SubjectController@update')->name('subject.update');
    Route::delete('teacher/subject/{subject}/delete', 'SubjectController@destroy')->name('subject.destroy');

    // POST
    Route::get('teacher/post/{post}/index', 'PostController@index')->name('subject.post');
    Route::get('teacher/post/{post}/none', 'PostController@show')->name('subject.post.none');
    Route::get('teacher/post/{post}/detail', 'PostController@detail')->name('post.detail');
    Route::post('teacher/post', 'PostController@store')->name('post.store');
    Route::get('teacher/post/{post}/create', 'PostController@create')->name('post.create');
    Route::get('teacher/post/{post}/edit', 'PostController@edit')->name('post.edit');
    Route::post('teacher/post/{post}/update', 'PostController@update')->name('post.update');
    Route::delete('teacher/post/{post}/delete', 'PostController@destroy')->name('post.destroy');



    

    
    
    
    
});




