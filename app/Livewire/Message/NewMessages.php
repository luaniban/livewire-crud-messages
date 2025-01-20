<?php

namespace App\Livewire\Message;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Message;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use TallStackUi\Traits\Interactions;
use Illuminate\Testing\Fluent\Concerns\Interaction;
use Illuminate\Support\Facades\Session;

class NewMessages extends Component
{

    use WithPagination;
    use Interactions;


    public $olhinhoFechado;
    public $modalShow = false;

    public $itemsPerPage = 10;
    public $dbMessageId;
    //public $messages;

    public function openModalShow() {
        $this->modalShow = true;
    }


    #[On('dispatch-message-table-vizualizacao')]
    public function olhinho($id) {

        $userVizualizou = Auth::user();
        

        $userVizualizou->messages()->syncWithoutDetaching([
            $id => ['visualizado' => 1]
        ]);

        $this->dbMessageId = DB::table('message_user')->where('message_id', $id)->get();
        $this->dbMessageId = $this->dbMessageId->toArray();

        $this->olhinhoFechado = true;

        Session::put('olhinhoFechado', $this->olhinhoFechado);
    }
    public function closeModalShow() {
        $this->modalShow = false;
    }



    public function render()
    {


        $dataAtual = Carbon::now()->toDateString();

        $messages = Message::orderBy('id', 'desc')->where('status', 1)->where('dataAt', '=', $dataAtual)->paginate($this->itemsPerPage);
        $users = User::all();

        $namePesquisarUser  = Auth::user();
        $namePesquisarUser = $namePesquisarUser->name;
        //dd($dbMessageId);
        $pesquisarUsers = Message::orderBy('id', 'desc')->where('name', $namePesquisarUser)->where('status', 1)->where('dataAt', '=', $dataAtual)->paginate($this->itemsPerPage);




        return view('livewire.message.new-messages', compact('messages', 'users', 'pesquisarUsers'));
    }
}
