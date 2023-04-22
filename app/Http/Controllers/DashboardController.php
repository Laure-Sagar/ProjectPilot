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

        $tasks = Algorithm::getStructure($tasks_data);

        $algorithm_result = Algorithm::getCriticalPath($tasks);
        $criticalPath = $algorithm_result[0];
        $criticalTime = $algorithm_result[1];

        return view('dashboard', compact("criticalPath", "criticalTime", 'tasks_data'));
    }
}
