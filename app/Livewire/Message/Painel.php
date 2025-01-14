<?php

namespace App\Livewire\Message;

use App\Models\Message;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Illuminate\Support\Carbon;

class Painel extends Component
{
    use WithPagination; // Para usar a paginação
    //public $users;
    public $searchUsuarioTrueOrFalse = false;
    public $search ='';
    public $pesquisarUsers = [];
    public $destinatarioSearch = null;
    //protected $queryString = ['destinatarioSearch']; // Mantém o valor na URL
    public $searchUser = false;



    public function pesquisarUsuario(){

        $this->searchUser = true;

        $usersQuery = Message::query();

    }

    public function closeSearchUser() {
        $this->searchUser = false;
    }



    public function submit()
    {

        $results = [];
        $usersQuery = Message::query();

        if ($this->destinatarioSearch && $this->destinatarioSearch != 'Filtrar...') {
            $usersQuery->where('destinatario', $this->destinatarioSearch);
            //dump($usersQuery);
        }

        if(strlen($this->search) >= 1) {
            $this->pesquisarUsers = Message::where('name', 'like', '%'.$this->search.'%')->limit(5)->get();
        }

      // dump($this->pesquisarUsers);



        $dataAtual = Carbon::now()->toDateString();

        $users = $usersQuery->orderBy('id', 'desc')->where('status', 1)->where('dataAt', '=', $dataAtual)->paginate(10);


        return view('livewire.message.painel',['users' => $users]);
    }

    // Função render para exibir a tabela de dados
    public function render(){


        // Chama a função submit para carregar os dados filtrados ou não
        return $this->submit();
    }
}
