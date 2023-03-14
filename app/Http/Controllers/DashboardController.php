<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Project;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $projects = Project::all();

        foreach ($projects as $project) {
            $start_date = $project->start_date;
            $end_date = $project->end_date;
            $start_date = Carbon::parse($start_date);
            $end_date = Carbon::parse($end_date);
            $project->start_date = $start_date->format('m/d/Y');
            $project->end_date = $end_date->format('m/d/Y');
        }

        return view('dashboard')->with('projects', $projects);
    }
}
