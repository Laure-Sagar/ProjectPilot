<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Actions\Algorithm\Algorithm;

class TaskController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function show(string $id)
    {
        $task = Task::find($id);
        return view('task.view')->with('task', $task);
    }

    /**
     * Display a listing of the resource.
     */
    public function showtasks($project_id)
    {
        $tasks_data = Task::where("project_id", $project_id)->get();

        $tasks = Algorithm::getStructure($tasks_data);

        $criticalPath = Algorithm::getCriticalPath($tasks);

        return view('task.index', compact("criticalPath", "criticalTime", 'tasks_data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function subindex()
    {
        return view('subtasks.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $task = new Task();
        $task->name = $request->task_name;
        $task->description = $request->task_description;
        $task->task_duration = $request->task_days;
        if ($request->task_dependencies == null)
            $task->dependencies = "[]";
        else
            $task->dependencies = json_encode($request->task_dependencies);
        $task->project_id = auth()->user()->current_team_id;
        $task->save();

        return redirect("/board/" . auth()->user()->current_team_id . "/tasks");
    }
}
