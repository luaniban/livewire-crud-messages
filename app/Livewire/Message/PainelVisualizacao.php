<?php

namespace App\Livewire\Message;

use App\Models\User;
use App\Models\Message;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\DB;

class PainelVisualizacao extends Component
{
    public $openModalPainel = false;
    public $openModalUsersVisualizacao = false;
    public $openModalUsersNaoVisualizacao = false;
    public $usersVisualizaram;
    public $userTabelaMessageUser = [];
    public $userTabelaUser;
    public $value = 0;
    public $verificaUserPesquisarUser;

    public function openModalPainelVisualizacao(){
        $this->openModalPainel = true;
    }
    public function closeModalPainelVisualizacao(){

        $this->openModalPainel = false;
        $this->openModalUsersVisualizacao = false;
        $this->openModalUsersNaoVisualizacao = false;
    }

    #[On('dispatch-open-modal-user-visualizaram')]
    public function openModalUsersVisualizacao(){

        $this->openModalUsersVisualizacao = true;

    }
    public function closeModalUsersVisualizacao(){
        $this->openModalUsersVisualizacao = false;

    }

    #[On('dispatch-open-modal-user-nao-visualizaram')]
    public function openModalUsersNaoVisualizacao(){
        $this->openModalUsersNaoVisualizacao = true;

    }
    public function closeModalUsersNaoVisualizacao(){
        $this->openModalUsersNaoVisualizacao = false;

    }





    #[On('dispatch-list-painel')]
    public function teste($id) {
        $this->openModalPainel = true;

        $this->userTabelaMessageUser = DB::table('message_user')
        ->join('users', 'message_user.user_id', '=', 'users.id')
        ->where('message_user.message_id', $id)
        ->get();

      //  dd($this->userTabelaMessageUser);


      $this->userTabelaUser = User::all();
    $this->verificaUserPesquisarUser = Message::find($id);

    $this->verificaUserPesquisarUser = $this->verificaUserPesquisarUser->destinatario;




    }



    public function render()
    {



        return view('livewire.message.painel-visualizacao');
    }
}
