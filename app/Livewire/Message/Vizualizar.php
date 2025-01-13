<?php

namespace App\Livewire\Message;
use App\Models\User;
//use Illuminate\Container\Attributes\Storage;
use App\Models\Message;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Storage;


class Vizualizar extends Component
{
    public $user, $descricao, $titulo, $file, $fileImg, $extension, $info, $link, $destinatario;
    public $modalVizu = false;
    public $teste;
    public function closeModalVizu() {

        $this->modalVizu = false;
    }





    #[On('dispatch-message-table-vizualizacao')]
    public function vizualiza($id) {

        $users = Message::find($id)->users();

       $this->teste = User::find(1);


        $this->modalVizu = true;
        $user = Message::findOrFail($id);


        $this->descricao = $user->descricao;
        $this->titulo = $user->titulo;
        $this->file = $user->file;

        if($this->file != null) {


            $info = pathinfo($this->file);
            $this->extension = $info['extension'];

        //dd($this->extension);
            if($this->extension == 'pdf') {
                $this->link = Storage::url($this->file);
            }
        }
        //dd($this->link);

    }






    public function render()
    {
        return view('livewire.message.vizualizar', ['teste' =>$this->teste, 'descricao' => $this->descricao, 'titulo' => $this->titulo, 'file' => $this->file, 'extension' => $this->extension, 'link' => $this->link]);
    }
}
