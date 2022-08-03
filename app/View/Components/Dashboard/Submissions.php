<?php

namespace App\View\Components\Dashboard;

use App\Models\Submission;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class Submissions extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public ?Collection $submissions,
    ) {
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Closure|\Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        if ($this->submissions->isEmpty()) {
            $this->submissions = Submission::orderBy('created_at', 'desc')->get();
        }

        return view('components.dashboard.submissions');
    }
}
