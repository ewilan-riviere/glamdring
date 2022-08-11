<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Str;

class Media extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $src,
        public ?string $color = '#ffffff',
        public ?string $alt = '',
        public ?string $placeholder = '/default.webp',
        public bool $iframe = false,
        public ?string $width = '100%',
        public ?string $height = '360',
        public bool $preflight = false,
        public ?string $preflight_class = '',
        public ?string $allow = '',
        public ?string $id = '',
    ) {
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Closure|\Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        $this->id = Str::random();
        $this->preflight_class = 'rounded-md px-5';

        return view('components.media');
    }
}
