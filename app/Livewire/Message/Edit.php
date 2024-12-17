<?php

namespace App\Livewire\Message;
use Livewire\Attributes\On;
use Livewire\Component;
use App\Models\Message;

use TallStackUi\Traits\Interactions;

class Edit extends Component
{

    use Interactions;

    public $user, $cargo, $descricao, $user_id;
    public function render()
    {
        return view('livewire.message.edit');
    }

    public $modalEdit = false;

    public function closeModal() {
        $this->modalEdit = false;
    }
    #[On('dispatch-message-table-edit')]
    public function edit($id) {
        $user = Message::find($id);

        $this->user_id = $user->id;
        $this->cargo = $user->cargo;
        $this->descricao = $user->descricao;

        $this->modalEdit = true;

    }


    public function update() {
        $this->validate([ //Para o admin colocar os dados corretamente, caso esteja errado, irá aparecer uma mensagem dizendo que o campo de dados está errado e está sendo requerido novamente.
            'cargo' => 'required|in:Professor,Gestor',
            'descricao' => 'required|string|max:100'
        ]);

        $user = Message::find($this->user_id);

        $user->update([
            'cargo' => $this->cargo,
            'descricao' => $this->descricao,
        ]);


        $this->toast()->success('Mensagem atualizada com sucesso!')->send();

        $this->dispatch('dispatch-edit-concluida')->to(Table::class);

        $this->modalEdit = false;
    }
}


// Diretor = 2
// Demanda = 3
