<?php

namespace App\Http\Livewire;

use App\Models\Task;
use App\Models\Team;
use Livewire\Component;
use App\Actions\Algorithm\Algorithm;

class LiveAlgorithm extends Component
{
    public $status = '', $criticalPath = [], $criticalTime = 0;

    public function mount()
    {
        $this->status = 'idle';
    }

    public function algorithm()
    {
        $user = auth()->user();
        $project_id = Team::find($user->current_team_id)->id;

        $tasks_data = Task::where("project_id", $project_id)->get();

        $tasks = Algorithm::getStructure($tasks_data);

        $algorithm_result = Algorithm::getCriticalPath($tasks);

        $this->updateStatus("running");

        $this->criticalPath = implode("->", $algorithm_result[0]);
        $this->criticalTime = $algorithm_result[1];

        $this->updateStatus("success");
    }

    public function updateStatus($newStatus)
    {
        $this->status = $newStatus;
    }

    public function render()
    {
        return view('livewire.live-algorithm');
    }
}
