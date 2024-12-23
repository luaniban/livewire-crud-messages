<?php

namespace App\Livewire\Message;
use Livewire\Attributes\On;
use App\Models\Message;
use Illuminate\Testing\Fluent\Concerns\Interaction;
use TallStackUi\Traits\Interactions;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Finder\SplFileInfo;
use Livewire\WithFileUploads;

use Livewire\Component;

class Create extends Component
{
    use WithFileUploads;
    use Interactions;



    public $name,  $dataAt, $destinatario, $status, $titulo, $descricao, $password, $user, $searchUser, $path;

    public $file;
    protected $rules = [
        'file' => 'required|file|max:2048|mimes:jpg,jpeg,png,gif,pdf',
    ];




    public $modalCreate = false;

    public function openModalCreate(){
        $this->modalCreate = true;
    }

    public function closeModalCreate(){
        $this->modalCreate = false;
    }

    private function resetInputFields(){
        $this->name = '';
        $this->file = '';
        $this->dataAt = '';
        $this->status = '';
        $this->titulo = '';
        $this->destinatario = '';
        $this->descricao= '';

    }

    #[On('dispatch-message-table-create')]
    public function create(){
        $this->resetInputFields();
        $this->openModalCreate();
    }



    public function store() {


        $this->validate([
            'destinatario' => 'required',
            'descricao' => 'required',
            //'name' => 'required', fazer a validação caso o destinatario seja "Pesquisar usuario"
            //'file' => 'required|nullable',
            'dataAt' => 'required',
            'titulo' => 'required',

        ]);




        if ($this->status == "") {
            $this->status = 0;
        }

        if ($this->destinatario == "usuario") {
            $this->validate([
                'name' => 'required',
            ]);
            $this->searchUser = true;
        }
        else {
            $this->searchUser = false;
        }


        if($this->file != null) {
            $path = $this->file->store('uploads', 'public');

            Message::create([

                'destinatario' => $this->destinatario,
                'descricao' => $this->descricao,
                'name' => $this->name,
                'file' => $path,
                'dataAt' => $this->dataAt,
                'status' => $this->status,
                'titulo' => $this->titulo,

            ]);
        }

        else {
            Message::create([

                'destinatario' => $this->destinatario,
                'descricao' => $this->descricao,
                'name' => $this->name,
                'dataAt' => $this->dataAt,
                'status' => $this->status,
                'titulo' => $this->titulo,

            ]);
        }



        $this->closeModalCreate();
        $this->resetInputFields();
        $this->toast()->success('Mensagem criada com sucesso!')->send();


        $this->dispatch('dispatch-message-table-create-criado')->to(Table::class);

    }

    public function render()
    {






        return view('livewire.message.create');
    }
}
