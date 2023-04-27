<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Team;
use Illuminate\Http\Request;
use Termwind\Components\Dd;

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

    public function edit_dates($project_id)
    {

        $project = Team::find($project_id);
        return view('task.edit_project_date')->with('project', $project);
    }

    public function storeDates(Request $request, $project_id)
    {
        $project = Team::find($project_id);
        $project->start_date = $request->start_date;
        $project->save();
        return redirect('/project');
    }

    public function edit($project_id)
    {
        return redirect('/teams/' . $project_id);
    }

    public function destroy($id)
    {
        $user = auth()->user();
        $team = $user->ownedTeams->count();
        if ($team == 1) {
            return redirect()->back()->with('error', 'You must have at least one project to delete a project');
        } else {
            $project = Team::find($id);
            $project->delete();
            $team = $user->ownedTeams->first();
            $user->switchTeam($team);
        }

        return redirect()->back()->with('success', 'Project deleted successfully');
    }
}
