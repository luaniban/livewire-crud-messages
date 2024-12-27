<?php

namespace App\Livewire\Message;
use App\Models\User;
use App\Models\Message;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;

class Table extends Component
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

    }

    public function closeSearchUser() {
        $this->searchUser = false;
    }


    // Função de submit para filtrar os resultados

    #[On('dispatch-delete-concluida')]
    #[On('dispatch-edit-concluida')]
    #[On('dispatch-message-table-create-criado')]
    //#[On('dispatch-notification-count,{}')]
    public function submit()
    {
        //dd($this->destinatarioSearch) ;
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





        $users = $usersQuery->orderBy('id', 'desc')->paginate(10);


        return view('livewire.message.table',['users' => $users]);
    }

    // Função render para exibir a tabela de dados
    public function render(){


        // Chama a função submit para carregar os dados filtrados ou não
        return $this->submit();
    }
}
