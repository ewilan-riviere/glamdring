<?php

namespace App\Http\Livewire\Form;

use Livewire\Component;

class ProjectForm extends Component
{
    public ?string $message = 'Hello';

    public function render()
    {
        return view('livewire.form.project-form');
    }
}
