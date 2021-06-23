<?php
use App\Notice;
use App\Web_About;
use App\Web_Banner;
use App\Web_Contact;
use App\Web_Counter;
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
    $banner = Web_Banner::find(1)->first();
    $banner2 = Web_Banner::where('id', 2)->first();
    $about = Web_About::all()->first();
    $counter = Web_Counter::all()->first();
    // dd($banner2);
    $contact = Web_Contact::all()->first();
    return view('welcome',['notice'=>$notice,'banner'=>$banner,'banner2'=>$banner2,'about'=>$about,'counter'=>$counter,'contact'=>$contact,]);
});

// Route::get('/admin', function () {
//     return view('admin.home');
// });

Auth::routes();



Route::middleware('auth')->group(function(){
    
    
    Route::get('/home', 'HomeController@index')->name('home');
    // Route::get('/home', 'AdminController@index')->name('admin.home')->middleware('isAdmin');

    
    // NOTICE
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

    // POST SUBJECT
    Route::get('/post/{post}/index', 'PostController@index')->name('subject.post');
    Route::get('/post/{post}/none', 'PostController@show')->name('subject.post.none');
    Route::get('/post/{post}/detail', 'PostController@detail')->name('post.detail');

    // SUBMISSION
    Route::get('/submission/{submission}/detail', 'SubmissionController@detail')->name('submission.detail');
    Route::get('/download/{file_download}', 'SubmissionController@download')->name('submission.download');
    // Route::get('/download/{file_download}', 'SubmissionController@edit')->name('submission.edit');

    // FORUM
    Route::get('/forum', 'ForumController@index')->name('forum');
    Route::get('/forum/all', 'ForumController@show1')->name('forum-user');
    // Route::get('/admin/notice/{$notice}', 'NoticeController@show')->name('admin.notice-detail');
    Route::get('/forum-detail/{forum}', 'ForumController@show')->name('forum-detail'); 
    Route::post('/forum', 'ForumController@store')->name('forum.store');
    Route::get('/forum/create', 'ForumController@create')->name('forum.create');
    Route::delete('/forum/{forum}/delete', 'ForumController@destroy')->name('forum.destroy');
    Route::get('/forum/{forum}/edit', 'ForumController@edit')->name('forum.edit');
    Route::post('/forum/{forum}/update', 'ForumController@update')->name('forum.update');


    // // TEACHER
    // SUBJECT
    // Route::get('/home', 'TeacherController@index')->name('home');
    Route::get('teacher/subject/all', 'TeacherController@SubjectIndex')->name('teacher.subject.index');
    Route::get('teacher/subject/not_assigned', 'TeacherController@SubjectIndex')->name('teacher.subject.none');
    // Route::get('teacher/subject/create', 'SubjectController@create')->name('subject.create');
    // Route::post('teacher/subject/add', 'SubjectController@store')->name('subject.store');
    // Route::get('teacher/subject/{subject}/edit', 'SubjectController@edit')->name('subject.edit');
    // Route::post('teacher/subject/{subject}/update', 'SubjectController@update')->name('subject.update');
    // Route::delete('teacher/subject/{subject}/delete', 'SubjectController@destroy')->name('subject.destroy');

    // POST
    Route::post('teacher/post', 'PostController@store')->name('post.store');
    Route::get('teacher/post/{post}/create', 'PostController@create')->name('post.create');
    Route::get('teacher/post/{post}/edit', 'PostController@edit')->name('post.edit');
    Route::post('teacher/post/{post}/update', 'PostController@update')->name('post.update');
    Route::delete('teacher/post/{post}/delete', 'PostController@destroy')->name('post.destroy');

    // ASSIGNMENT
    Route::get('teacher/{post}/submission/all', 'SubmissionController@teacherIndex')->name('submission.teacherIndex');
    Route::get('teachers/{id}/submission/all', 'SubmissionController@IndexByPost')->name('submission.IndexByPost');
    Route::get('teacher/submission/all', 'SubmissionController@IndexAll')->name('submission.teacherAll');
    Route::post('student/submission/{submission}/mark', 'SubmissionController@mark')->name('submission.teacherMark');

    // USER
    Route::get('/teacher/all', 'UserController@teacherList')->name('teacherList');
    Route::get('/student/all', 'UserController@studentList')->name('studentList');
    Route::get('/teacher/{user}/profile', 'UserController@teacherDetail')->name('teacherDetail');
    Route::get('/student/{user}/profile', 'UserController@studentDetail')->name('studentDetail');



    
    // // STUDENT
    // SUBJECT
    Route::get('student/class/subject', 'StudentController@show')->name('student-subject.index');


    // ASSIGNMENT
    Route::get('student/submission/all', 'SubmissionController@index')->name('submission.index');
    Route::post('student/submission', 'SubmissionController@store')->name('submission.store');
    Route::get('student/submission/{submission}/edit', 'SubmissionController@edit')->name('submission.edit');
    Route::post('student/submission/{submission}/update', 'SubmissionController@update')->name('submission.update');



    

    
    
    
    
});




