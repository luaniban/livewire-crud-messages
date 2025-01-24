<?php

namespace App\Livewire\Message;

use App\Models\Message;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use TallStackUi\Traits\Interactions;

class Delete extends Component
{
    use Interactions;

    public $message_id, $message;
    public $modalDelete = false;



    #[On('dispatch-message-table-delete')]
    public function openModalDelete($id) {

        $message = Message::find($id);
        $this->message_id = $message->id;

        $this->modalDelete = true;
    }

    public function closeModalDelete() {
        $this->modalDelete = false;
    }

    public function delete() {

        DB::table('message_user')->where('message_id', $this->message_id)->delete();
        Message::find($this->message_id)->delete();

        $this->dispatch('dispatch-delete-concluida')->to(Table::class);
        $this->closeModalDelete();
        $this->toast()->success('Mensagem excluida com sucesso!')->send();
    }
    public function render()
    {
        return view('livewire.message.delete');
    }
}
