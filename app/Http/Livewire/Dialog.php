<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Dialog extends Component
{
    public bool $isOpened = false;
    // public $data;

    protected $listeners = [
        'openDialog',
    ];

    // public function mount(mixed $data = null) {
    //     $this->data = $data;
    //     $this->show = false;
    // }

    // public function trigger(mixed $data = null) {
    //     $this->data = $data;

    //     $this->doShow();
    // }

    // public function doShow() {
    //     $this->show = true;
    // }

    // public function doClose() {
    //     $this->show = false;
    // }

    // public function doSomething() {
    //     // Do Something With Your Modal

    //     // Close Modal After Logic
    //     $this->doClose();
    // }

    public function openDialog()
    {
        $this->isOpened = true;
    }

    public function render()
    {
        return view('livewire.dialog');
    }
}
