<?php

namespace App\View\Components\App;

use Illuminate\View\Component;

class Button extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public ?string $type = 'button',
        public ?string $color = 'primary',
        public ?string $class = '',
        public ?bool $link = false,
        public ?bool $external = false
    ) {
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Closure|\Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        $base = 'flex w-full justify-center rounded-md border border-transparent py-2 px-4 text-sm shadow-sm transition-colors duration-100 focus:outline-none focus:ring-2 focus:ring-offset-2 dark:ring-offset-gray-700 font-semibold';

        $primary_class = 'bg-indigo-600 text-white hover:bg-indigo-700 focus:ring-indigo-500';
        $secondary_class = 'bg-gray-200 dark:bg-gray-600 dark:text-gray-100 text-gray-900 hover:bg-gray-400 dark:hover:bg-gray-700';

        $this->class = match ($this->color) {
            'primary' => "{$base} {$primary_class}",
            'secondary' => "{$base} {$secondary_class}",
            default => "{$base} {$primary_class}",
        };

        return view('components.app.button');
    }
}
