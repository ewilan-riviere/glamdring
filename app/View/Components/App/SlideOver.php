<?php

namespace App\View\Components\App;

use Illuminate\View\Component;

class SlideOver extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public ?string $title = ''
    ) {
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Closure|\Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.app.slide-over');
    }
}
