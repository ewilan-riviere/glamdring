<?php

namespace App\View\Components;

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
        public ?bool $external = false,
        public ?bool $full = false,
    ) {
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Closure|\Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        $base_class = 'flex justify-center rounded-md border border-transparent py-2 px-4 text-sm shadow-sm transition-colors duration-100 relative font-medium';
        $ring_class = 'focus:outline-none focus:ring-2 focus:ring-offset-2 dark:ring-offset-gray-700';
        $base_class .= $ring_class;

        $primary_class = 'bg-indigo-600 text-white hover:bg-indigo-700 focus:ring-indigo-500';
        $secondary_class = 'border border-gray-300 text-gray-900 hover:bg-gray-50 dark:border-gray-600 dark:text-gray-100 dark:hover:bg-gray-800';

        $this->class = match ($this->color) {
            'primary' => "{$base_class} {$primary_class}",
            'secondary' => "{$base_class} {$secondary_class}",
            default => "{$base_class} {$primary_class}",
        };

        if ($this->full) {
            $this->class .= ' w-full';
        }

        return view('components.button');
    }
}
