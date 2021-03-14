<?php

use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return view('index');
// });

Route::get('/', 'helloController@index');

Route::get('/about','helloController@aboutView');

Route::get('/contact', 'helloController@contactView');
Route::get('/blog', 'helloController@blogView');



Route::get('/addcategory', 'helloController@addCategory');
Route::get('all/category', 'helloController@allCategory')->name('all.category');

Route::post('store/category', 'helloController@storeCategory')->name('store.category');

Route::get('view/category/{id}','helloController@viewCategory');
Route::get('delete/category/{id}','helloController@deleteCategory');
Route::get('edit/category/{id}','helloController@editCategory');
Route::post('update/category/{id}','helloController@updateCategory');

// post crud are here
Route::get('/writepost', 'PostController@writePost');
Route::post('store/post', 'PostController@storePost')->name('store.post');
Route::get('all/post', 'PostController@allPost')->name('all.post');
Route::get('view/post/{id}','PostController@viewPost');
Route::get('edit/post/{id}','PostController@editPost');
Route::post('update/post/{id}','PostController@updatePost');
Route::get('delete/post/{id}','PostController@deletePost');

//Students
Route::get('students', 'StudentController@create')->name('student');
Route::post('store/student', 'StudentController@store')->name('store.student');
Route::get('all/students', 'StudentController@index')->name('all.student');
Route::get('view/student/{id}', 'StudentController@show');
Route::get('delete/student/{id}', 'StudentController@destroy');
Route::get('edit/student/{id}', 'StudentController@edit');
Route::post('update/student/{id}', 'StudentController@update');