<?php

namespace App\View\Components\Layout\Navigation;

use Illuminate\View\Component;
use Request;

class Item extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public string $href = '/',
        public bool $external = false,
        public string $current = ''
    ) {
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $this->current = Request::url();

        return view('components.layout.navigation.item');
    }
}
