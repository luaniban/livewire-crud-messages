<?php

namespace App\Livewire\Message;
use App\Models\User;
use App\Models\Message;

use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
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

    public  $name, $dataAt, $destinatario, $status, $titulo, $descricao, $password,  $message_id;



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
        $message = Message::find($id);




            $this->message_id = $message->id;
            $this->destinatario = $message->destinatario;
            $this->descricao = $message->descricao;
            $this->name = $message->name;

            $this->dataAt = $message->dataAt;
            $this->status = $message->status;
            $this->titulo = $message->titulo;


        $this->modalEdit = true;

    }


    public function update() {
        $this->validate([ //Para o admin colocar os dados corretamente, caso esteja errado, irá aparecer uma mensagem dizendo que o campo de dados está errado e está sendo requerido novamente.
            'destinatario' => 'required',
            'descricao' => 'required|string|max:1000',
            'dataAt' => 'required',
            'titulo' => 'required',
        ]);

        $message = Message::find($this->message_id);


        if($this->file != null) {

            $path = $this->file->store('uploads', 'public');

            $message->update([
                'destinatario' => $this->destinatario,
                'descricao' => $this->descricao,
                'titulo' => $this->titulo,

                'file' => $path,
                'dataAt' => $this->dataAt,
                'status' => $this->status

            ]);
        }
        else {
            $message->update([
                'destinatario' => $this->destinatario,
                'descricao' => $this->descricao,
                'titulo' => $this->titulo,

                'dataAt' => $this->dataAt,
                'status' => $this->status
            ]);
        }
        if($this->destinatario == 'Pesquisar Usuario') {
            $this->validate([
                'name' => 'required|not_in:Selecione...',
            ]);

            $message->update([
                'name' => $this->name,

            ]);

            $this->searchUser = false;
        }






        if($this->destinatario == 'Pesquisar Usuario') {

            $userIds = User::where('name', $this->name)->pluck('id')->toArray();
        }

        if($this->destinatario == 'todos' || $this->destinatario == 'Todos') {
            $userIds = User::pluck('id')->toArray();
        }


        if($this->destinatario == 'Gestor' || $this->destinatario == 'Professor') {
            $userIds = User::where('Cargo_id', 2)->pluck('id')->toArray();
        }

        if($this->destinatario == 'Pais de alunos') {
            $userIds = User::where('Cargo_id', 3)->pluck('id')->toArray();
        }



        DB::table('message_user')->where('message_id', $message->id)->delete();
        
        $message->users()->attach($userIds, ['visualizado' => 0]);



        $this->toast()->success('Mensagem atualizada com sucesso!')->send();

        $this->dispatch('dispatch-edit-concluida');

        $this->modalEdit = false;
    }
}


// Diretor = 2
// Demanda = 3
