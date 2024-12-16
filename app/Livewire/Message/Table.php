<?php

namespace App\Livewire\Message;
use App\Models\Message;
use Livewire\Component;

class Table extends Component
{
    public function render()
    {

        $users = Message::all();
        return view('livewire.message.table', compact('users'));
    }
}
