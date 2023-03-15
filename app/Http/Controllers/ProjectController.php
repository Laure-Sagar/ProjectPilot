<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Team;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Team::where('user_id', auth()->user()->id)->get();

        foreach ($projects as $project) {
            $start_date = $project->start_date;
            $end_date = $project->end_date;
            $start_date = Carbon::parse($start_date);
            $end_date = Carbon::parse($end_date);
            $project->start_date = $start_date->format('m/d/Y');
            $project->end_date = $end_date->format('m/d/Y');
        }

        return view('project.project-dashboard')->with('projects', $projects);
    }
}
