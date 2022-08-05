<?php

namespace App\Http\Livewire\List;

use App\Models\Project;
use Illuminate\Support\Collection;
use Livewire\Component;

class Projects extends Component
{
    /** @var Collection<int, Project> */
    public ?Collection $projects;

    public function mount()
    {
        $this->projects = Project::all();
    }

    public function byName()
    {
        $this->projects = Project::orderBy('title', 'desc')
            ->get()
        ;
    }

    public function render()
    {
        return view('livewire.list.projects');
    }
}
