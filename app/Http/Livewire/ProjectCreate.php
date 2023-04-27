<?php

namespace App\Http\Livewire;

use App\Models\Team;
use Livewire\Component;

class ProjectCreate extends Component
{
    // store data
    public $name, $description, $start_date, $end_date, $status, $project_manager;

    public function store()
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'description' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'status' => 'required',
        ]);

        if ($this->start_date > $this->end_date) {
            session()->flash('error', 'Start date cannot be greater than end date.');
            return;
        }

        $validatedData['user_id'] = auth()->user()->id;

        $project = new Team;
        $project->name = $validatedData['name'];
        $project->description = $validatedData['description'];
        $project->start_date = $validatedData['start_date'];
        $project->end_date = $validatedData['end_date'];
        $project->status = $validatedData['status'];
        $project->user_id = $validatedData['user_id'];
        $project->personal_team = 0;
        $project->save();

        session()->flash('success', 'Project Created Successfully.');

        return redirect()->route('dashboard');
    }

    public function render()
    {
        return view('livewire.project-create');
    }
}
