<?php

namespace App\Livewire\Message;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Message;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use TallStackUi\Traits\Interactions;
use Illuminate\Testing\Fluent\Concerns\Interaction;

class NewMessages extends Component
{

    use WithPagination;
    use Interactions;

    public $modalShow = false;
    public $itemsPerPage = 10;
    //public $messages;

    public function openModalShow() {
        $this->modalShow = true;
    }


    public function closeModalShow() {
        $this->modalShow = false;
    }



    public function render()
    {

        $dataAtual = Carbon::now()->toDateString();

        $messages = Message::orderBy('id', 'desc')->where('status', 1)->where('dataAt', '=', $dataAtual)->paginate($this->itemsPerPage);
        $users = User::all();






        return view('livewire.message.new-messages', compact('messages', 'users'));
    }
}
