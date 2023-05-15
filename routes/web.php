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

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/logout', 'App\Http\Controllers\AuthController@logout')->name('logout');

    Route::prefix('/{project_id}/tasks')->name('task.')->group(
        function () {
            Route::get('', 'App\Http\Controllers\TaskController@showtasks')->name('view');
            Route::get('/create', 'App\Http\Controllers\TaskController@taskcreate')->name('create');
            Route::post('/store', 'App\Http\Controllers\TaskController@store')->name('store');
            Route::get('{task_id}/edit', 'App\Http\Controllers\TaskController@editForm')->name('edit');
            Route::post('{task_id}/edit', 'App\Http\Controllers\TaskController@editStore')->name('edit');
            Route::get('/{task_id}/destroy', 'App\Http\Controllers\TaskController@destroy')->name('destroy');
        }
    );

    Route::prefix('/{task_id}')->name('subtask.')->group(function () {
        Route::get('/subtasks', 'App\Http\Controllers\TaskController@subindex')->name('index');
        Route::get('/subtasks/create', 'App\Http\Controllers\TaskController@subindexCreate')->name('create');
    });

    Route::view('/subtasks', 'subtasks.trello');

    Route::prefix('/project')->name('project.')->group(
        function () {
            Route::get('/', 'App\Http\Controllers\ProjectController@index')->name('index');
            Route::get(
                '/{project_id}/start_date',
                'App\Http\Controllers\ProjectController@edit_dates'
            )->name('edit_start_date');
            Route::post('/{project_id}/start_date', 'App\Http\Controllers\ProjectController@storeDates')->name('updatedates');
            Route::get('/{project_id}/destroy', 'App\Http\Controllers\ProjectController@destroy')->name('destroy');
            Route::get('/{project_id}/edit', 'App\Http\Controllers\ProjectController@edit')->name('edit');
            Route::get('/create', 'App\Http\Controllers\ProjectController@create')->name('create');
        }
    );

    Route::get('/dashboard', 'App\Http\Controllers\DashboardController@dashboard')->name('dashboard');
});

Route::get('popup', function () {
    return view('popup');
});
