<?php

namespace App\View\Components\Dashboard;

use App\Models\Project;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class Projects extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public ?Collection $projects,
    ) {
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Closure|\Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        if ($this->projects->isEmpty()) {
            $this->projects = Project::orderBy('created_at', 'desc')->get();
        }

        return view('components.dashboard.projects');
    }
}
