<?php

namespace App\Livewire\Message;

use App\Models\Message;
use Livewire\Component;
use TallStackUi\Traits\Interactions;
use Illuminate\Testing\Fluent\Concerns\Interaction;


class NewMessages extends Component
{
    use Interactions;

    public $messages, $mensagem;
    public $modalShow = false;


    public function openModalShow() {
        $this->modalShow = true;
    }


    public function closeModalShow() {
        $this->modalShow = false;
    }


    public function render()
    {

        $this->messages = Message::all();
        //dd($messages);


        if($this->messages) {
            //$this->toast()->success('Voce tem uma nova mensagem!')->send();
        }
        return view('livewire.message.new-messages');
    }
}
