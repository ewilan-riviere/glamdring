<?php

namespace App\View\Components\App;

use Illuminate\View\Component;

class Img extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $src,
        public ?string $color = '#ffffff',
        public ?string $alt = '',
        public ?string $placeholder = '/default.webp',
    ) {
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Closure|\Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.app.img');
    }
}
