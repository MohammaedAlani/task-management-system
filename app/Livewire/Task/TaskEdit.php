<?php

namespace App\Livewire\Task;

use App\Models\Task;
use App\Models\User;
use Livewire\Component;

class TaskEdit extends Component
{
    public $name;

    public $project;

    public $description;

    public $assignees;

    public $due_date;

    public $users;

    public $taskId;

    public function mount($task)
    {
        $taskInfo = Task::find($task);

        $this->taskId = $taskInfo->id;

        $this->name = $taskInfo->name;
        $this->project = $taskInfo->project_id;
        $this->description = $taskInfo->description;
        $this->assignees = $taskInfo->users->pluck('id')->toArray();
        $this->due_date = $taskInfo->due_date;

        $this->users = User::orderBy('name')->get();
    }

    protected $rules = [
        'name' => 'required',
        'description' => 'required',
        'assignees' => 'required|array',
        'due_date' => 'required',
    ];

    public function save()
    {
        $this->validate();

        $taskInfo = Task::find($this->taskId);

        // Save the task
        $taskInfo->update([
            'project_id' => $this->project,
            'name' => $this->name,
            'description' => $this->description,
            'due_date' => $this->due_date,
        ]);

        // Sync the task assignees
        $taskInfo->users()->sync($this->assignees);

        // Redirect to the task show page
        return redirect()->route('task.show', $taskInfo->id);
    }


    public function render()
    {
        return view('livewire.task.task-edit');
    }
}
