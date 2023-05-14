<?php

namespace App\Http\Livewire;

use App\Models\Team;
use App\Models\SubTask;
use Livewire\Component;

class SubtaskPopup extends Component
{
    public $button = 'closed', $teams, $taskname, $description, $date, $members = [], $task_id, $subtasks;
    public $status;

    public function mount($task_id)
    {
        $project_id = auth()->user()->current_team_id;
        $this->teams = Team::find($project_id)->teamMembers;
        $this->task_id = $task_id;
    }

    public function save()
    {
        if ($this->date < date('Y-m-d')) {
            $this->addError('date', 'Date should be in future');
            return;
        }

        SubTask::create([
            'name' => $this->taskname,
            'description' => $this->description,
            'date' => $this->date,
            'status' => $this->status,
            'members' => json_encode($this->members),
            'task_id' => $this->task_id,
        ]);

        $this->button = 'closed';
    }

    public function open()
    {
        $this->button = 'open';
    }

    public function close()
    {
        $this->button = 'closed';
    }

    public function SortTodo($event)
    {
        foreach ($event as $data) {
            $subtask = SubTask::find($data['value']);
            $subtask->position = $data['order'];
            $subtask->save();
        }
    }

    function moveToDoing($id)
    {
        $subtask = SubTask::find($id);
        $subtask->status = 'doing';
        $subtask->save();
    }

    function moveToDone($id)
    {
        $subtask = SubTask::find($id);
        $subtask->status = 'done';
        $subtask->save();
    }

    function moveToDo($id)
    {
        $subtask = SubTask::find($id);
        $subtask->status = 'todo';
        $subtask->save();
    }

    public function render()
    {
        $this->subtasks = SubTask::where('task_id', $this->task_id)
            ->orderBy('status')
            ->orderBy('position')
            ->get();

        return view(
            'livewire.subtask-popup',
            [
                'task_id' => $this->task_id,
                'subtasks' => $this->subtasks
            ]
        );
    }
}
