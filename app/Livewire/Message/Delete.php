<?php

namespace App\Livewire\Message;

use Illuminate\Support\Facades\App;
use Livewire\Attributes\On;
use Livewire\Component;
use App\Models\Message;
use TallStackUi\Traits\Interactions;

class Delete extends Component
{
    use Interactions;

    public $user_id, $user;
    public $modalDelete = false;



    #[On('dispatch-message-table-delete')]
    public function openModalDelete($id) {

        $user = Message::find($id);
        $this->user_id = $user->id;

        $this->modalDelete = true;
    }

    public function closeModalDelete() {
        $this->modalDelete = false;
    }

    public function delete() {

        Message::find($this->user_id)->delete();

        $this->dispatch('dispatch-delete-concluida')->to(Table::class);
        $this->closeModalDelete();
        $this->toast()->success('Mensagem excluida com sucesso!')->send();
    }
    public function render()
    {
        return view('livewire.message.delete');
    }
}
