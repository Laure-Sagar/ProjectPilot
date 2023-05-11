<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SubtaskPopup extends Component
{
    public $button = 'closed';

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
        return view('livewire.subtask-popup');
    }
}
