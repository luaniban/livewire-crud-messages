<?php

namespace App\Livewire\Message;
use Livewire\Attributes\On;
use App\Models\Message;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination; // Para usar a paginação
    //public $users;
    public $count;
    public $searchUsuarioTrueOrFalse = false;
    public $search ="";
    public $destinatarioSearch = null;
    protected $queryString = ['destinatarioSearch']; // Mantém o valor na URL

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

        if ($this->destinatarioSearch && $this->destinatarioSearch !== 'usuario') {
            $usersQuery->where('destinatario', $this->destinatarioSearch);
        }
        if($this->destinatarioSearch == 'usuario') {
            $this->searchUsuarioTrueOrFalse = true;

            if(strlen($this->search) >= 1) {
                $results = Message::where('name', 'like', '%' . $this->search . '%')->limit(5)->get();}

        }
        else {
            $this->searchUsuarioTrueOrFalse = false;
        }


        



        $users = $usersQuery->orderBy('id', 'desc')->paginate(10);


        return view('livewire.message.table',['users' => $users, 'usersSearch' => $results]);
    }

    // Função render para exibir a tabela de dados
    public function render()
    {
        // Chama a função submit para carregar os dados filtrados ou não
        return $this->submit();
    }
}
