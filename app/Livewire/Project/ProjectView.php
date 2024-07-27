<?php

namespace App\Livewire\Project;

use App\Models\Project;
use App\Models\Task;
use Livewire\Component;

class ProjectView extends Component
{

    public $sortValue = 'desc';

    public $selectedFilter = 'all';

    public $tasks;
    public $project;

    public function mount($project)
    {
        $this->project = Project::find($project);
        $this->tasks = $this->project->tasks;
    }

    private function loadTask()
    {
        if ($this->selectedFilter !== 'all') {
            $this->tasks = $this->project->tasks->where('is_complete', $this->selectedFilter === 'complete');
        }else{
            $this->tasks = $this->project->tasks;
        }

        if ($this->sortValue === 'asc') {
            $this->tasks = $this->tasks->sortBy('due_date');
        } else {
            $this->tasks = $this->tasks->sortByDesc('due_date');
        }
    }

    public function render()
    {
        $this->loadTask();

        return view('livewire.project.project-view');
    }

    public function deleteTask($taskId)
    {
        Task::find($taskId)->delete();

        $this->tasks = $this->project->tasks;
    }
}
