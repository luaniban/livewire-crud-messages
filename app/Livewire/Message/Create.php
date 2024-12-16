<?php

namespace App\Livewire\Message;
use Livewire\Attributes\On;
use App\Models\Message;
use Illuminate\Testing\Fluent\Concerns\Interaction;
use TallStackUi\Traits\Interactions;

use Livewire\Component;

class Create extends Component
{

    use Interactions;

    public $cargo, $descricao, $password, $user;

    public $modalCreate = false;

    public function openModalCreate(){
        $this->modalCreate = true;
    }

    public function closeModalCreate(){
        $this->modalCreate = false;
    }

    private function resetInputFields(){
        $this->cargo = '';
        $this->descricao= '';

    }

    #[On('dispatch-message-table-create')]
    public function create(){
        $this->resetInputFields();
        $this->openModalCreate();
    }



    public function store() {
        $this->validate([
            'cargo' => 'required|in:Gestor,Professor',
            'descricao' => 'required',
        ]);

        Message::create([
            'cargo' => $this->cargo,
            'descricao' => $this->descricao,

        ]);

       
        $this->closeModalCreate();
        $this->resetInputFields();
        $this->toast()->success('Mensagem criada com sucesso!')->send();


        $this->dispatch('dispatch-message-table-create-criado')->to(Table::class);

    }

    public function render()
    {


        return view('livewire.message.create');
    }
}
