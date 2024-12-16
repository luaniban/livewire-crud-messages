<?php

namespace App\Livewire\Message;
use Livewire\Attributes\On;
use Livewire\Component;
use App\Models\Message;

class Edit extends Component
{
    public function render()
    {
        return view('livewire.message.edit');
    }

    public $modalEdit = false;


    #[On('dispatch-message-table-edit')]
    public function edit($id) {
        
    }
    public function update() {
        $this->validate([ //Para o admin colocar os dados corretamente, caso esteja errado, irá aparecer uma mensagem dizendo que o campo de dados está errado e está sendo requerido novamente.
            'name' => 'required|string|max:100',
            'cargo' => 'required|string|max:100',
            'descricao' => 'required|string|max:100'
        ]);


    }
}
