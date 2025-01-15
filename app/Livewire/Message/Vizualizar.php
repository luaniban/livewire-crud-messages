<?php

namespace App\Livewire\Message;
use App\Models\User;
//use Illuminate\Container\Attributes\Storage;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class Vizualizar extends Component
{



    public $user, $descricao, $titulo, $file, $fileImg, $extension, $info, $link, $destinatario, $name;
    public $modalVizu = false;
    public $admin;
    public function closeModalVizu() {

        $this->modalVizu = false;
    }





    #[On('dispatch-message-table-vizualizacao')]
    public function vizualiza($user_id, $id) {

        /////////////////////////////
        $userVizualizou = Auth::user();


        $userVizualizou->messages()->syncWithoutDetaching([
            $id => ['visualizado' => 1]
        ]);



            //$messageTeste = Message::find($id);

            //$userTeste = User::where('name', $this->name)->first();

            //$messageTeste->users()->syncWithoutDetaching(['user_id' => $userTeste->id]);





        //////////////////////////////
        $users = Message::find($id)->users();

       $this->admin= User::find($user_id);



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
        return view('livewire.message.vizualizar', ['admin' =>$this->admin, 'descricao' => $this->descricao, 'titulo' => $this->titulo, 'file' => $this->file, 'extension' => $this->extension, 'link' => $this->link]);
    }
}
