<?php

namespace App\View\Components\Project;

use App\Models\Project;
use Illuminate\View\Component;

class Card extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public Project $project
    ) {
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Closure|\Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.project.card');
    }
}
