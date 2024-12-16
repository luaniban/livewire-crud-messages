<?php

namespace App\Livewire\Message;

use App\Models\Message;
use App\Models\User;

use Livewire\Component;

class Create extends Component
{
    public $message;
    public $isCargoSelected = false;
    public $users;
    public $destinatarios = [];
    public $cargo;
    public $destinatario;

    public function create() {
        Message::create([
            'message' => $this->message,
            'destinatario' => $this->destinatario
        ]);
    }


    public function cargoState() {
        $this->destinatarios = [];
        $this->isCargoSelected = true;
        if($this->cargo == 'todos') {
            $users = User::whereNot('cargo_id', 1)->get();
        }
        else {
            $users = User::where('cargo_id', $this->cargo)->get();
        }
        $this->users = $users;
        foreach ($users as $user) {
            array_push($this->destinatarios, ['label' => $user->name, 'value' => $user->id]);
        }
    }

    public function render()
    {
        return view('livewire.message.create');
    }
}
