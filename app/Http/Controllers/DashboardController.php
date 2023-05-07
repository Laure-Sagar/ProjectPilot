<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Task;
use App\Models\Team;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Actions\Algorithm\Algorithm;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $user = auth()->user();
        $project_id = Team::find($user->current_team_id)->id;

        $tasks_data = Task::where("project_id", $project_id)->get();
        
        return view('dashboard', compact('tasks_data', 'project_id'));
    }
}
