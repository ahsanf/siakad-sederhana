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
    return view('auth.login');
});

// Route::get('/home', function () {
//     return view('courses.index');
// });

Auth::routes();

// Route::resource('users', 'UserController', [
//     'only' => [ 'index', 'edit', 'update','store', 'destroy' ],
//     'middleware' => ['auth']
// ]);

Route::resource('courses', 'CourseController', [
    'only' => [ 'index', 'create', 'edit', 'update','store', 'destroy'],
    'middleware' => ['auth']
]);

Route::resource('credits', 'CreditController', [
    'only' => [ 'index', 'create','edit', 'update','store', 'destroy' ],
    'middleware' => ['auth']
]);

// Route::resource('studies', 'StudiesController', [
//     'only' => [ 'index', 'create','edit', 'update','store', 'destroy' ],
//     'middleware' => ['auth']
// ]);

Route::resource('periodes', 'PeriodeController', [
    'only' => [ 'index', 'create', 'edit', 'update','store', 'destroy'],
    'middleware' => ['auth']
]);

Route::resource('studies', 'StudiesController', [
    'only' => [ 'index', 'create', 'edit', 'update', 'store', 'destroy'],
    'middleware' => ['auth']
]);