<?php

namespace App\Http\Livewire;

use App\Models\Team;
use Livewire\Component;

class SubtaskPopup extends Component
{
    public $button = 'closed', $teams;

    public function mount()
    {
        // get all team members in the project
        $this->teams = Team::find(auth()->user()->current_team_id)->teamMembers;
    }

    public function open()
    {
        $this->button = 'open';
    }

    public function close()
    {
        $this->button = 'closed';
    }

    public function render()
    {
        return view('livewire.subtask-popup', [
            'teams' => $this->teams,
        ]);
    }
}
