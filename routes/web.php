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

Route::get('/logout', 'App\Http\Controllers\AuthController@logout')->name('logout');

Route::get('/{project_id}/tasks', 'App\Http\Controllers\TaskController@showtasks')->name('task.view');
Route::get('/{project_id}/tasks/create', 'App\Http\Controllers\TaskController@taskcreate')->name('task.create');
Route::post('/{project_id}/task/store', 'App\Http\Controllers\TaskController@store')->name('task.store');

Route::get('/{task_id}/subtasks', 'App\Http\Controllers\TaskController@subindex')->name('subtask.index');

Route::prefix('/project')->name('project.')->group(function () {
    Route::get('/', 'App\Http\Controllers\ProjectController@index')->name('index');
    Route::get('/{project_id}/destroy', 'App\Http\Controllers\ProjectController@destroy')->name('destroy');
    Route::get('/{project_id}/edit', 'App\Http\Controllers\ProjectController@edit')->name('edit');
    Route::get('/create', 'App\Http\Controllers\ProjectController@create')->name('create');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', 'App\Http\Controllers\DashboardController@dashboard')->name('dashboard');
});

Route::get('popup', function () {
    return view('popup');
});
