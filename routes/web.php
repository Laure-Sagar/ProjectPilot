<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


// Projects Routes Resource
Route::resource('projects', 'App\Http\Controllers\ProjectController');
Route::resource('boards', 'App\Http\Controllers\BoardController');

Route::get('{id}/board', 'App\Http\Controllers\BoardController@index')->name('board.home');
Route::get('board/{id}', 'App\Http\Controllers\BoardController@show')->name('board.view');

Route::get('/task/{id}/subtasks', 'App\Http\Controllers\TaskController@subindex')->name('task.index');
Route::get('/board/{id}/tasks', 'App\Http\Controllers\TaskController@index')->name('task.index');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', 'App\Http\Controllers\DashboardController@dashboard')->name('dashboard');
});

Route::get('test1', function () {
    return view('test1');
});

Route::get('task_form', function () {
    return view('task_form');
});
