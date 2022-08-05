<?php

namespace App\Http\Livewire\Forge;

use App\Models\Project;
use App\Services\GitForgeService;
use Livewire\Component;

class Sync extends Component
{
    public function sync()
    {
        Project::query()->delete();

        $forge = GitForgeService::create();
        $forge->fetchRepositories();

        $this->emit('projectsListUpdate');
    }

    public function render()
    {
        return view('livewire.forge.sync');
    }
}
