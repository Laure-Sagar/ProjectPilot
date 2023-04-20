<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Board;

class TaskController extends Controller
{
    public function index($id)
    {
        $tasks_data = Board::where("project_id",$id)->get();
        $tasks = [];
        foreach($tasks_data as $task){
            
            $taskd = [
                'name' => $task->name,
                'duration' => $task->task_duration, 
                'dependencies' => json_decode($task->dependencies),
            ];

            array_push($tasks,$taskd);

        }

        if($tasks != null){
      
        
        // Define the tasks as an associative array where the key is the task ID and the value is an array with the duration and dependencies
        // Define the tasks as an associative array where the key is the task ID and the value is an array with the duration and dependencies
        // $tasks = array(
        //     'Task 1' => array('duration' => 6, 'dependencies' => array()),
        //     'Task 2' => array('duration' => 4, 'dependencies' => array()),
        //     'Task 3' => array('duration' => 3, 'dependencies' => array('Task 1')),
        //     'Task 4' => array('duration' => 4, 'dependencies' => array('Task 2')),
        //     'Task 5' => array('duration' => 3, 'dependencies' => array('Task 2')),
        //     'Task 6' => array('duration' => 10, 'dependencies' => array()),
        //     'Task 7' => array('duration' => 3, 'dependencies' => array('Task 5','Task 6')),
        //     'Task 8' => array('duration' => 2, 'dependencies' => array('Task 3', 'Task 4')),
        //     // 'E' => array('duration' => 6, 'dependencies' => array('D')),
        //     // 'F' => array('duration' => 2, 'dependencies' => array('D')),
        // );
        function getSuccessorTasks($tasks, $taskName) {
            $successors = array();
            foreach ($tasks as $task) {
                if (in_array($taskName, $task['dependencies'])) {
                    // dd($task);
                    $successors[] = $task['name'];
                }
            }
            return $successors;
        }

        // foreach($task as $task['name'] => $task){

        // }
        // Step 1: Calculate the earliest start and finish times for each task
        $earliestStartTimes = array();
        $earliestFinishTimes = array();
        foreach ($tasks as $task) {
            $earliestStartTimes[$task['name']] = 0;
            $earliestFinishTimes[$task['name']] = $task['duration'];
            foreach ($task['dependencies'] as $dependency) {
                $earliestStartTimes[$task['name']] = max($earliestStartTimes[$task['name']], $earliestFinishTimes[$dependency]);
            }
            $earliestFinishTimes[$task['name']] = $earliestStartTimes[$task['name']] + $task['duration'];
        }

        // Step 2: Calculate the latest start and finish times for each task
        $latestStartTimes = array();
        $latestFinishTimes = array();
        $endTime = max($earliestFinishTimes);
        foreach (array_reverse($tasks) as $task) {
            $latestFinishTimes[$task['name']] = $endTime;
            $latestStartTimes[$task['name']] = $latestFinishTimes[$task['name']] - $task['duration'];
            foreach (getSuccessorTasks($tasks,$task['name']) as $dependency) {
                $latestFinishTimes[$task['name']] = min($latestFinishTimes[$task['name']], $latestStartTimes[$dependency]);
            }
            $latestStartTimes[$task['name']] = $latestFinishTimes[$task['name']] - $task['duration'];
        }
        // dd($earliestFinishTimes, $latestFinishTimes);
        // Step 3: Identify the critical path
        $criticalPath = array();
        foreach ($tasks as  $task) {
            if ($earliestStartTimes[$task['name']] === $latestStartTimes[$task['name']]) {
                $criticalPath[] = $task['name'];
            }
        }
        $criticalTime = 0;
        foreach($tasks as  $task){
            if (in_array($task['name'], $criticalPath)){
                $criticalTime += $task['duration'];
            }
        }
    }else{
        $criticalTime = 0;
        $criticalPath = [];
    }
        // // Print the critical path
        // if (count($criticalPath) > 0) {
        //     echo "Critical path: " . implode(" -> ", $criticalPath);
        //     echo "Shortest Time to Complete Intire Project: $criticalTime ";
        // } else {
        //     echo "No critical path found";
        // }
        return view('task.index',compact("criticalPath","criticalTime",'tasks_data'));
    }
    public function subindex()
    {
        return view('subtasks.index');
    }

    public function store(Request $request)
    {
        $task = new Board();
        $task->name = $request->task_name;
        $task->description = $request->task_description;
        $task->task_duration = $request->task_days;
        if($request->task_dependencies == null)
        $task->dependencies = "[]";
        else
        $task->dependencies = json_encode($request->task_dependencies);
        $task->project_id = auth()->user()->current_team_id;
       
        $task->save();

        return redirect("/board/".auth()->user()->current_team_id."/tasks");
    }
}
