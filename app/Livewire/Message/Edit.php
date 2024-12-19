<?php

namespace App\Livewire\Message;
use Livewire\Attributes\On;
use Livewire\Component;
use App\Models\Message;

use TallStackUi\Traits\Interactions;

class Edit extends Component
{

    use Interactions;

    public  $name, $file, $dataAt, $destinatario, $status, $titulo, $descricao, $password, $user, $user_id;
    public function render()
    {
        return view('livewire.message.edit');
    }

    public $modalEdit = false;

    public function closeModalEdit() {
        $this->modalEdit = false;
    }
    #[On('dispatch-message-table-edit')]
    public function edit($id) {
        $user = Message::find($id);

        $this->user_id = $user->id;
        $this->destinatario = $user->destinatario;
        $this->descricao = $user->descricao;
        $this->name = $user->name;
        $this->file = $user->name;
        $this->dataAt = $user->dataAt;
        $this->status = $user->status;
        $this->titulo = $user->titulo;

        $this->modalEdit = true;

    }


    public function update() {
        $this->validate([ //Para o admin colocar os dados corretamente, caso esteja errado, irá aparecer uma mensagem dizendo que o campo de dados está errado e está sendo requerido novamente.
            'destinatario' => 'required|in:Professor,Gestor',
            'descricao' => 'required|string|max:100'
        ]);

        $user = Message::find($this->user_id);

        $user->update([
            'destinatario' => $this->destinatario,
            'descricao' => $this->descricao,
        ]);


        $this->toast()->success('Mensagem atualizada com sucesso!')->send();

        $this->dispatch('dispatch-edit-concluida')->to(Table::class);

        $this->modalEdit = false;
    }
}


// Diretor = 2
// Demanda = 3
