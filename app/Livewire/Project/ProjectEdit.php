<?php

namespace App\Livewire\Project;

use App\Models\Project;
use App\Models\User;
use Livewire\Component;

class ProjectEdit extends Component
{
    public $project;
    public $name;
    public $description;
    public $owner_id;
    public $start_date;
    public $end_date;

    protected $rules = [
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'owner_id' => 'required|exists:users,id',
        'start_date' => 'required|date',
        'end_date' => 'required|date',
    ];

    public function mount(Project $project)
    {
        $this->project = $project;
        $this->name = $project->name;
        $this->description = $project->description;
        $this->owner_id = $project->owner_id;
        $this->start_date = $project->start_date;
        $this->end_date = $project->end_date;
    }

    public function save()
    {
        $this->validate();

        $this->project->update([
            'name' => $this->name,
            'description' => $this->description,
            'owner_id' => $this->owner_id,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'updated_by_user_id' => auth()->id(),
        ]);

        return redirect()->route('project.index');
    }

    public function render()
    {
        return view('livewire.project.project-edit', [
            'users' => User::orderBy('name', 'asc')->get()
        ]);
    }
}
