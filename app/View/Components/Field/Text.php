<?php

namespace App\View\Components\Field;

use Illuminate\View\Component;

class Text extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public ?string $name = 'text',
        public ?string $label = null,
        public ?string $type = 'text',
        public ?string $placeholder = null,
        public ?string $value = null,
        public ?bool $required = false,
        public ?bool $multiline = false,
    ) {
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Closure|\Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.field.text');
    }
}
