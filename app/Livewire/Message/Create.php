<?php

namespace App\Livewire\Message;

use Livewire\Component;

class Create extends Component
{


    public $modalCreate = false;

    public function create() {
        $this->modalCreate = true;

    }

    public function story() {
        
    }
    public function render()
    {
        return view('livewire.message.create');
    }
}
