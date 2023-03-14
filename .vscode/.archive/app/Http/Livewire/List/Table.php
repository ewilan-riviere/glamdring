<?php

namespace App\Http\Livewire\List;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Livewire\Component;

class Table extends Component
{
    public bool $reverse = false;

    /** @var Collection<int, Model> */
    public ?Collection $data;

    public function reverse()
    {
        $this->reverse = ! $this->reverse;
    }

    public function render()
    {
        return view('livewire.list.table');
    }
}
