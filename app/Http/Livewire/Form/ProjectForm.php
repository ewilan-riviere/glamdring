<?php

namespace App\Http\Livewire\Form;

use App\Models\Project;
use Livewire\Component;

class ProjectForm extends Component
{
    public ?string $title = '';

    protected $rules = [
        'title' => 'required|string|min:6',
    ];

    public function save()
    {
        $data = $this->validate();

        Project::create($data);
    }

    public function render()
    {
        return view('livewire.form.project-form');
    }
}
