<?php

namespace App\Actions\Algorithm;

use App\Models\Task;



class Algorithm
{

    public static function getStructure($tasks_data)
    {
        $tasks = [];
        foreach ($tasks_data as $task) {
            $taskd = [
                'name' => $task->name,
                'duration' => $task->duration,
                'dependencies' => json_decode($task->dependencies),
            ];
            array_push($tasks, $taskd);
        }
        
        return $tasks;
    }

    // getSuccessorTasks($tasks, $taskName)
    public static function getSuccessorTasks($tasks, $taskName)
    {
        $successors = array();
        foreach ($tasks as $task) {
            $task_name = [];
            
            foreach($task['dependencies'] as $dependency){
                $task_name[] = Task::find($dependency)->name;
                // if($dependency != null)
                // dd($task_name);
            }
            if (in_array($taskName, $task_name)) {
                $successors[] = $task['name'];
            }
        }
       
        return $successors;
    }

    // CPM Algorithm
    public static function getCriticalPath($tasks)
    {
        // dd($tasks);
        $latestFinishTimes = 0; 
        $latestStartTimes = 0; 
        $earliestFinishTimes = 0; 
        $earliestStartTimes = 0;
        if ($tasks != null) {

            // Step 1: Calculate the earliest start and finish times for each task
            $earliestStartTimes = array();
            $earliestFinishTimes = array();
            foreach ($tasks as $task) {
                $earliestStartTimes[$task['name']] = 0;
                $earliestFinishTimes[$task['name']] = $task['duration'];

                foreach ($task['dependencies'] as $dependency) {
                    $dependency = Task::find($dependency)->name;
                    // dd($dependency);
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
                foreach (Algorithm::getSuccessorTasks($tasks, $task['name']) as $dependency) {
                    $latestFinishTimes[$task['name']] = min($latestFinishTimes[$task['name']], $latestStartTimes[$dependency]);
                }
                $latestStartTimes[$task['name']] = $latestFinishTimes[$task['name']] - $task['duration'];
            }
            // Step 3: Identify the critical path
            $criticalPath = array();
            foreach ($tasks as  $task) {
                if ($earliestStartTimes[$task['name']] === $latestStartTimes[$task['name']]) {
                    $criticalPath[] = $task['name'];
                }
            }
            $criticalTime = 0;
            foreach ($tasks as  $task) {
                if (in_array($task['name'], $criticalPath)) {
                    $criticalTime += $task['duration'];
                }
            }
        } else {
            $criticalTime = 0;
            $criticalPath = [];
        }
        // dd($tasks);
        return array($criticalPath, $criticalTime, $latestFinishTimes, $latestStartTimes, $earliestFinishTimes, $earliestStartTimes);
    }
}
