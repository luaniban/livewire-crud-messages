<?php

namespace App\Livewire\Message;

use Livewire\Component;

class Create extends Component
{
    public $message;
    public function create() {
        dump($this->message);
    }

    public function render()
    {
        return view('livewire.message.create');
    }
}
