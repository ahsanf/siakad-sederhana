<?php

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

Auth::routes();

Route::resource('users', 'UserController', [
    'only' => [ 'index', 'edit', 'update','store', 'destroy' ],
    'middleware' => ['auth']
]);

Route::resource('coures', 'CourseController', [
    'only' => [ 'index', 'edit', 'update','store', 'destroy'],
    'middleware' => ['auth']
]);

Route::resource('credits', 'CreditController', [
    'only' => [ 'index', 'edit', 'update','store', 'destroy' ],
    'middleware' => ['auth']
]);

Route::resource('studies', 'StuidesController', [
    'only' => [ 'index', 'edit', 'update','store', 'destroy' ],
    'middleware' => ['auth']
]);


// Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/mahasiswa', 'StudentController@index')->name('mahasiswa')->middleware('mahasiswa');
// Route::get('/admin', 'AdminController@index')->name('admin')->middleware('admin');
// Route::get('/dosen', 'LecturerController@index')->name('dosen')->middleware('dosen');