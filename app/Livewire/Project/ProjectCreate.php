<?php

namespace App\Livewire\Project;

use App\Models\Project;
use App\Models\User;
use Livewire\Component;

class ProjectCreate extends Component
{

    public $name;
    public $description;
    public $is_active = true;
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

    public function save()
    {
        $this->validate();

        Project::create([
            'name' => $this->name,
            'description' => $this->description,
            'owner_id' => $this->owner_id,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'create_by_user_id' => auth()->id(),
        ]);

        return redirect()->route('project.index');
    }


    public function render()
    {
        return view('livewire.project.project-create',[
            'users' => User::orderBy('name', 'asc')->get()
        ]);
    }
}
