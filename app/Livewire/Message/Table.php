<?php

namespace App\Livewire\Message;
use App\Models\Message;
use Livewire\Attributes\On;
use Livewire\Component;

class Table extends Component


{

    //public $search = '';
    public $pUserPerPage = 5;
    //public $destinatarioSearch = "";


    public function destinatarioSearch() {
        dd($this->destinatarioSearch);
    }
    
    #[On('dispatch-delete-concluida')]
    #[On('dispatch-edit-concluida')]
    #[On('dispatch-message-table-create-criado')]
    public function render()
    {
        $results = [];


        $users = Message::all();
        return view('livewire.message.table', ['users' => Message::orderBy('id', 'desc')->paginate($this->pUserPerPage)]);
    }
}
