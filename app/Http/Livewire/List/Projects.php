<?php

namespace App\Http\Livewire\List;

use App\Models\Project;
use Illuminate\Support\Collection;
use Livewire\Component;

class Projects extends Component
{
    /** @var Collection<int, Project> */
    public ?Collection $projects;

    protected $listeners = [
        'projectsSort' => 'sort',
        'projectsSortReverse' => 'sortReverse',
        'projectsListUpdate' => 'update',
    ];

    public function mount()
    {
        $this->update();
    }

    public function update()
    {
        $this->projects = Project::all();
    }

    public function sort(string $type)
    {
        match ($type) {
            'title' => $this->byTitle(),
            default => ''
        };
    }

    public function sortReverse()
    {
        $this->projects = $this->projects->reverse();
    }

    public function byTitle()
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
