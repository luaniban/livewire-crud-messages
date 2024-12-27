<?php

namespace App\Livewire\Message;
use App\Models\User;
use App\Models\Message;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;
use TallStackUi\Traits\Interactions;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Finder\SplFileInfo;
use Illuminate\Testing\Fluent\Concerns\Interaction;

class Create extends Component
{
    use WithFileUploads;
    use Interactions;



    public $name,  $dataAt, $destinatario, $status, $titulo, $descricao, $password, $user, $path;

    public $search = '';
    public $pesquisarUsers = [];
    public $searchUser = false;
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


    public function store() {


        $this->validate([
            'destinatario' => 'required|not_in:Selecione...',
            'descricao' => 'required',
            //'name' => 'required',
            //'file' => 'required|nullable',
            'dataAt' => 'required',
            'titulo' => 'required',

        ]);

        // dd($this->name);
        if($this->destinatario == 'Pesquisar Usuario') {
            $this->validate([
                'name' => 'required|not_in:Selecione...',
            ]);
            $this->searchUser = false;
        }







        if ($this->status == "") {
            $this->status = 0;
        }
        else {
            $this->status = 1;
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
