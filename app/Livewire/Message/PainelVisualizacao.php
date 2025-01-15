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
    public $userName = [];


    public function openModalPainelVisualizacao(){
        $this->openModalPainel = true;
    }
    public function closeModalPainelVisualizacao(){

        $this->openModalPainel = false;
        $this->openModalUsersVisualizacao = false;
    }

    #[On('dispatch-open-modal-user-visualizaram')]
    public function openModalUsersVisualizacao(){

        $this->openModalUsersVisualizacao = true;

    }
    public function closeModalUsersVisualizacao(){
        $this->openModalUsersVisualizacao = false;

    }
    public function openModalUsersNaoVisualizacao(){
        $this->openModalUsersNaoVisualizacao = true;

    }
    public function closeModalUsersNaoVisualizacao(){
        $this->openModalUsersNaoVisualizacao = false;

    }

    #[On('dispatch-list-painel')]
    public function teste($id) {
        $this->openModalPainel = true;

        $this->usersVisualizaram = DB::table('message_user')->where('message_id', $id)->get();
      

    }



    public function render()
    {
        return view('livewire.message.painel-visualizacao');
    }
}
