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

Route::get('algorithm', function () {
// Define the tasks as an associative array where the key is the task ID and the value is an array with the duration and dependencies
// Define the tasks as an associative array where the key is the task ID and the value is an array with the duration and dependencies
$tasks = array(
    'A' => array('duration' => 6, 'dependencies' => array()),
    'B' => array('duration' => 4, 'dependencies' => array()),
    'C' => array('duration' => 3, 'dependencies' => array('A')),
    'D' => array('duration' => 4, 'dependencies' => array('B')),
    'E' => array('duration' => 3, 'dependencies' => array('B')),
    'F' => array('duration' => 10, 'dependencies' => array()),
    'G' => array('duration' => 3, 'dependencies' => array('E','F')),
    'H' => array('duration' => 2, 'dependencies' => array('C', 'D')),
    // 'E' => array('duration' => 6, 'dependencies' => array('D')),
    // 'F' => array('duration' => 2, 'dependencies' => array('D')),
);
function getSuccessorTasks($tasks, $taskName) {
    $successors = array();
    foreach ($tasks as $taskId => $task) {
        if (in_array($taskName, $task['dependencies'])) {
            // dd($task);
            $successors[] = $taskId;
        }
    }
    return $successors;
}

// foreach($task as $taskId => $task){

// }
// Step 1: Calculate the earliest start and finish times for each task
$earliestStartTimes = array();
$earliestFinishTimes = array();
foreach ($tasks as $taskId => $task) {
    $earliestStartTimes[$taskId] = 0;
    $earliestFinishTimes[$taskId] = $task['duration'];
    foreach ($task['dependencies'] as $dependency) {
        $earliestStartTimes[$taskId] = max($earliestStartTimes[$taskId], $earliestFinishTimes[$dependency]);
    }
    $earliestFinishTimes[$taskId] = $earliestStartTimes[$taskId] + $task['duration'];
}

// Step 2: Calculate the latest start and finish times for each task
$latestStartTimes = array();
$latestFinishTimes = array();
$endTime = max($earliestFinishTimes);
foreach (array_reverse($tasks) as $taskId => $task) {
    $latestFinishTimes[$taskId] = $endTime;
    $latestStartTimes[$taskId] = $latestFinishTimes[$taskId] - $task['duration'];
    foreach (getSuccessorTasks($tasks,$taskId) as $dependency) {
        $latestFinishTimes[$taskId] = min($latestFinishTimes[$taskId], $latestStartTimes[$dependency]);
    }
    $latestStartTimes[$taskId] = $latestFinishTimes[$taskId] - $task['duration'];
}
// dd($earliestFinishTimes, $latestFinishTimes);
// Step 3: Identify the critical path
$criticalPath = array();
foreach ($tasks as $taskId => $task) {
    if ($earliestStartTimes[$taskId] === $latestStartTimes[$taskId]) {
        $criticalPath[] = $taskId;
    }
}
$criticalTime = 0;
foreach($tasks as $taskId => $task){
    if (in_array($taskId, $criticalPath)){
        $criticalTime += $task['duration'];
    }
}
// Print the critical path
if (count($criticalPath) > 0) {
    echo "Critical path: " . implode(" -> ", $criticalPath);
    echo "Shortest Time to Complete Intire Project: $criticalTime ";
} else {
    echo "No critical path found";
}
});
