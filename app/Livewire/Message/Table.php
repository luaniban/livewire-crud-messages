<?php

namespace App\Livewire\Message;
use App\Models\Message;
use Livewire\Attributes\On;
use Livewire\Component;

class Table extends Component
{

    public $createBox = false;

    public function closeMessageBox()
    {
        $this->createBox = false;
    }

    #[On('dispatch-delete-concluida')]
    #[On('dispatch-edit-concluida')]
    #[On('dispatch-message-table-create-criado')]
    public function render()
    {

        $users = Message::all();
        return view('livewire.message.table', compact('users'));
    }
}
