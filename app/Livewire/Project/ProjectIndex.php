<?php

namespace App\Livewire\Project;

use App\Models\Project;
use Livewire\Component;
use Livewire\WithPagination;

class ProjectIndex extends Component
{
    use WithPagination;

    public $sortValue = 'desc';

    public $search = '';
    public $selectedFilter = 'all';

    protected $listeners = ['projectCreated' => '$refresh'];

    public function render()
    {
        $query = Project::query();

        if ($this->selectedFilter !== 'all') {
            $query->where('is_active', $this->selectedFilter === 'active');
        }

        if ($this->search) {
            $query->where('name', 'like', '%' . $this->search . '%');
        }

        $projects = $query->withCount(['tasks', 'comments'])
            ->orderBy('id', $this->sortValue)
            ->paginate(10);

        return view('livewire.project.project-index', [
            'projects' => $projects,
        ]);
    }

    public function updatedSelectedFilter($value)
    {
        $this->selectedFilter = $value;
    }

    public function delete($projectId)
    {
        Project::find($projectId)->delete();
        $this->resetPage(); // Reset to the first page after deletion
    }

    public function showCreateProjectModal()
    {
        $this->emit('showCreateProjectModal');
    }
}

