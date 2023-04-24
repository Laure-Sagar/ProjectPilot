<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Team;
use Termwind\Components\Dd;
use Illuminate\Http\Request;
use App\Actions\Algorithm\Algorithm;
use App\Http\Request\ProjectRequest;

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
        $project = Team::find($project_id);
        $user = auth()->user();
        $user->switchTeam($project);

        $tasks_data = Task::where("project_id", $project_id)->get();

        $tasks = Algorithm::getStructure($tasks_data);

        $algorithm_result = Algorithm::getCriticalPath($tasks);
        $criticalPath = $algorithm_result[0];
        $criticalTime = $algorithm_result[1];

        return view('task.index', compact("criticalPath", "criticalTime", 'tasks_data'));
    }

    public function taskcreate($project_id)
    {
        $task = Task::where('project_id', $project_id)->get();
        return view('task.createform')->with('project_id', $project_id)->with('tasks', $task);
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
    public function store(ProjectRequest $request)
    {
       
        $task = new Task();
        $task->name = $request->task_name;
        $task->description = $request->task_description;
        $task->duration = $request->task_days;
        if ($request->task_dependencies == null)
            $task->dependencies = "[]";
        else
            $task->dependencies = json_encode($request->task_dependencies);
        $task->project_id = auth()->user()->current_team_id;
        $task->save();
        // 'name' => 'required|max:255',
        // 'description' => 'required',
        // 'start_date' => 'required|date',
        // 'end_date' => 'required|date|after_or_equal:start_date',

        return redirect()->back()->with('success', 'Task created successfully');
    }
}
