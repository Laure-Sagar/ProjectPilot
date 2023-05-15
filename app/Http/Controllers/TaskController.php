<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Team;
use Termwind\Components\Dd;
use Illuminate\Http\Request;
use App\Actions\Algorithm\Algorithm;
use App\Http\Requests\ProjectRequest;

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


        return view('task.index');
    }


    public function taskcreate($project_id)
    {
        $task = Task::where('project_id', $project_id)->get();

        return view('task.createform')->with('project_id', $project_id)->with('tasks', $task);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function subindex($task_id)
    {
        $task = Task::find($task_id);
        return view('subtasks.trello')->with('task_id', $task_id);
    }

    public function subindexCreate()
    {

        return view('subtasks.popup');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectRequest $request)
    {
        $data = Task::where('name', $request->task_name)->where('project_id', auth()->user()->current_team_id)->first();

        if ($data != null) return redirect()->back()->with('error_task', 'Task Name must be unique in a Project')->withInput();;

        $task = new Task();
        $task->name = $request->task_name;
        $task->description = $request->task_description;
        $task->duration = $request->duration;
        if ($request->task_dependencies == null)
            $task->dependencies = "[]";
        else
            $task->dependencies = json_encode($request->task_dependencies);
        $task->project_id = auth()->user()->current_team_id;
        $task->save();
        return redirect()->back()->with('success', 'Task created successfully');
    }

    public function editform($project_id, $task_id)
    {
        $task = Task::find($task_id);
        $tasks = Task::where('project_id', $project_id)->get();
        return view('task.editform')->with('task', $task)->with('tasks', $tasks);
    }

    public function editStore()
    {
        $task = Task::find(request()->task_id);
        $task->name = request()->task_name;
        $task->description = request()->task_description;
        $task->duration = request()->duration;
        if (request()->task_dependencies == null)
            $task->dependencies = "[]";
        else 
            $task->dependencies = json_encode(request()->task_dependencies);
        $task->save();

        return redirect()->back()->with('success', 'Task edited successfully');
    }

    function destroy($project_id, $task_id)
    {
        $task = Task::findOrFail($task_id);

        $tasks = Task::where('dependencies', 'like', '%' . $task_id . '%')->get();
        foreach ($tasks as $t) {
            $dependencies = json_decode($t->dependencies);
            $index = array_search($task_id, $dependencies);
            unset($dependencies[$index]);
            $t->dependencies = json_encode($dependencies);
            $t->save();
        }
        $task->delete();

        return redirect()->back()->with('success', 'Task deleted successfully');
    }
}
