<?php

namespace App\Livewire\Message;

use App\Models\Message;
use Livewire\Component;
use TallStackUi\Traits\Interactions;
use Illuminate\Testing\Fluent\Concerns\Interaction;
use Carbon\Carbon;
use Livewire\WithPagination;

class NewMessages extends Component
{

    use WithPagination;
    use Interactions;

    public $mensagem, $users;
    public $modalShow = false;
    public $itemsPerPage = 10;


    public function openModalShow() {
        $this->modalShow = true;
    }


    public function closeModalShow() {
        $this->modalShow = false;
    }




    public function render()
    {

        $dataAtual = Carbon::now()->toDateString();

        $messages = Message::orderBy('id', 'desc')->where('status', 1)->where('dataAt', '>=', $dataAtual)->paginate($this->itemsPerPage);






        //$this->users = $this->messages->orderBy('id', 'desc')->paginate(10);


        return view('livewire.message.new-messages', compact('messages'));
    }
}
