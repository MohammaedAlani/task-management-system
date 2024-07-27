<?php

namespace App\Livewire\Task;

use App\Models\Task;
use App\Models\User;
use Livewire\Component;

class TaskCreate extends Component
{
    public $name;

    public $project;

    public $description;

    public $assignees;

    public $due_date;

    protected $rules = [
        'name' => 'required',
        'description' => 'required',
        'assignees' => 'required|array',
        'due_date' => 'required',
    ];

    public function save()
    {
        $this->validate();

        // Save the task
        $newTask = Task::create([
            'project_id' => $this->project,
            'name' => $this->name,
            'description' => $this->description,
            'due_date' => $this->due_date,
            'create_by_user_id' => auth()->id(),
        ]);

        // Assign the task to the selected users
        $newTask->users()->attach($this->assignees);

        // Redirect to the task show page
        return redirect()->route('task.show', $newTask);
    }


    public function render()
    {
        return view('livewire.task.task-create', [
            'users' => User::orderBy('name')->get(),
        ]);
    }
}
