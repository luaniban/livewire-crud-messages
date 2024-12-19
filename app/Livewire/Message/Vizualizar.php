<?php

namespace App\Livewire\Message;
use App\Models\Message;
use Livewire\Component;
use Livewire\Attributes\On;


class Vizualizar extends Component
{
    public $user, $descricao, $titulo;
    public $modalVizu = false;

    public function closeModalVizu() {

        $this->modalVizu = false;
    }





    #[On('dispatch-message-table-vizualizacao')]
    public function vizualiza($id) {

        $this->modalVizu = true;
        $user = Message::findOrFail($id);
        $this->descricao = $user->descricao;
        $this->titulo = $user->titulo;

    }


    public function render()
    {
        return view('livewire.message.vizualizar', ['descricao' => $this->descricao, 'titulo' => $this->titulo]);
    }
}
