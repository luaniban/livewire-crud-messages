<?php

namespace App\Livewire\Message;
use App\Models\User;
use App\Models\Message;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithFileUploads;
use TallStackUi\Traits\Interactions;

class Edit extends Component
{
    use WithFileUploads;
    use Interactions;

    public $search = '';
    public $pesquisarUsers = [];
    public $searchUser = false;

    public $file;
    protected $rules = [
        'file' => 'required|file|max:2048|mimes:jpg,jpeg,png,gif,pdf,doc,docx',
    ];

    public  $name, $dataAt, $destinatario, $status, $titulo, $descricao, $password, $user, $user_id;



    public function closeSearchUser() {
        $this->searchUser = false;
    }


    public function pesquisarUsuario(){

        $this->searchUser = true;

    }

    public function updatedSearch()
    {
        if(strlen($this->search) >= 1) {
            $this->pesquisarUsers = User::where('name', 'like', '%'.$this->search.'%')->limit(5)->get();
        }

    }

    public function render()
    {
        return view('livewire.message.edit');
    }

    public $modalEdit = false;

    public function closeModalEdit() {
        $this->modalEdit = false;
    }
    #[On('dispatch-message-table-edit')]
    public function edit($id) {
        $user = Message::find($id);




            $this->user_id = $user->id;
            $this->destinatario = $user->destinatario;
            $this->descricao = $user->descricao;
            $this->name = $user->name;

            $this->dataAt = $user->dataAt;
            $this->status = $user->status;
            $this->titulo = $user->titulo;

           
        $this->modalEdit = true;

    }


    public function update() {
        $this->validate([ //Para o admin colocar os dados corretamente, caso esteja errado, irá aparecer uma mensagem dizendo que o campo de dados está errado e está sendo requerido novamente.
            'destinatario' => 'required',
            'descricao' => 'required|string|max:1000',
            'dataAt' => 'required',
            'titulo' => 'required',
        ]);

        $user = Message::find($this->user_id);


        if($this->file != null) {

            $path = $this->file->store('uploads', 'public');

            $user->update([
                'destinatario' => $this->destinatario,
                'descricao' => $this->descricao,
                'titulo' => $this->titulo,
                'name' => $this->name,
                'file' => $path,
                'dataAt' => $this->dataAt,
                'status' => $this->status

            ]);
        }
        else {
            $user->update([
                'destinatario' => $this->destinatario,
                'descricao' => $this->descricao,
                'titulo' => $this->titulo,
                'name' => $this->name,
                'dataAt' => $this->dataAt,
                'status' => $this->status
            ]);
        }
        if($this->destinatario == 'Pesquisar Usuario') {
            $this->validate([
                'name' => 'required|not_in:Selecione...',
            ]);
            $this->searchUser = false;
        }

        $this->toast()->success('Mensagem atualizada com sucesso!')->send();

        $this->dispatch('dispatch-edit-concluida')->to(Table::class);

        $this->modalEdit = false;
    }
}


// Diretor = 2
// Demanda = 3
