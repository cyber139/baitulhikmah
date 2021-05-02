<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'isAdmin'], function () {
    
    // Route::get('/home', 'AdminController@index')->name('admin.home');

    //  ADMIN : USER PROFILE    
    Route::get('/user/{user}/profile', 'UserController@show')->name('admin.user.index');
    Route::post('/user/{user}/update', 'UserController@update')->name('admin.user.update');

    // ADMIN : USER ACCESS CONTROL
    Route::get('/uac', 'UacController@uac')->name('admin.uac.index');
    Route::get('/uac/{user}/edit', 'UacController@uac_edit')->name('admin.uac.edit');
    Route::delete('/uac/{user}/delete', 'UacController@uac_delete')->name('admin.uac.destroy');
    Route::get('/uac/create', 'UacController@uac_create')->name('admin.uac.create');
    Route::post('/uac', 'UacController@uac_store')->name('uac.store');
    Route::put('/uac/{user}/attach', 'UacController@attach')->name('uac.attach');
    Route::put('/uac/{user}/detach', 'UacController@detach')->name('uac.detach');
    Route::post('/uac/{user}/status', 'UacController@status')->name('uac.status');
    
    // ADMIN : Teacher
    Route::get('/teacher', 'TeacherController@index')->name('teacher.index');
    Route::get('/teacher/{user}/edit', 'TeacherController@edit')->name('teacher.edit');
    
    // ADMIN : Student
    Route::get('/student', 'StudentController@index')->name('student.index');
    Route::get('/student/{user}/edit', 'StudentController@edit')->name('student.edit');
    
    // ADMIN : NOTICE BOARD
    Route::get('/notice', 'NoticeController@index')->name('notice');
    Route::get('/notice/all', 'NoticeController@show1')->name('notice.index');
    Route::post('/notice', 'NoticeController@store')->name('notice.store');
    Route::get('/notice/create', 'NoticeController@create')->name('notice.create');
    Route::delete('/notice/{notice}/delete', 'NoticeController@destroy')->name('notice.destroy');
    Route::get('/notice/{notice}/edit', 'NoticeController@edit')->name('notice.edit');
    Route::post('/notice/{notice}/update', 'NoticeController@update')->name('notice.update');
    
    
    // ADMIN : Class
    Route::get('/class/all', 'GradeController@index')->name('grade.index');
    Route::get('/class/create', 'GradeController@create')->name('grade.create');
    Route::post('/class/add', 'GradeController@store')->name('grade.store');
    Route::get('/class/{grade}/edit', 'GradeController@edit')->name('grade.edit');
    Route::post('/class/{grade}/update', 'GradeController@update')->name('grade.update');
    Route::delete('/class/{grade}/delete', 'GradeController@destroy')->name('grade.destroy');
    Route::put('/class/{grade}/attach', 'GradeController@attach')->name('grade.attach');
    Route::put('/class/{grade}/detach', 'GradeController@detach')->name('grade.detach');
    
    // ADMIN : Subject
    Route::get('/subject/all', 'SubjectController@index')->name('subject.index');
    Route::get('/subject/create', 'SubjectController@create')->name('subject.create');
    Route::post('/subject/add', 'SubjectController@store')->name('subject.store');
    Route::get('/subject/{subject}/edit', 'SubjectController@edit')->name('subject.edit');
    Route::post('/subject/{subject}/update', 'SubjectController@update')->name('subject.update');
    Route::delete('/subject/{subject}/delete', 'SubjectController@destroy')->name('subject.destroy');
});
