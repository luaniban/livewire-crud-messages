<?php

namespace App\Livewire\Message;
use App\Models\User;
use App\Models\Message;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Can;

class CountNotifications extends Component
{
    public $countTodos = 0;
    public $countProfessorOrGestor = 0;
    public $countPaisDeAlunos = 0;
    public $countPesquisarUser = 0;
    public $countAll = 0;
    public $professor = 0;
    #[On('dispatch-edit-concluida')]
    #[On('dispatch-message-table-create-criado')]
    #[On('dispatch-count')]
    public function mount() {

        $currentDate = Carbon::now()->toDateString();
        $user = Auth::user();


        $messages = Message::all();

        foreach ($messages as $message) {
           if($message->destinatario == 'Todos' && $message->dataAt == $currentDate && $message->status == 1){

                $this->countTodos = DB::table('message_user')->where('message_id', '=', $message->id)->where('visualizado', 0)->where('user_id', $user->id)->count();
            }
            if(($message->destinatario == 'Professor' || $message->destinatario == 'Gestor') && ($user->cargo_id == 2 || $user->cargo_id == 1) && $message->dataAt == $currentDate && $message->status == 1) {
                $this->countProfessorOrGestor = DB::table('message_user')->where('message_id', '=', $message->id)->where('visualizado', 0)->where('user_id', $user->id)->count();
            }
            if(($message->destinatario == 'Pais de alunos' || $message->destinatario == 'Pais de Alunos') && $user->cargo_id == 3 && $message->dataAt == $currentDate && $message->status == 1)  {
                $this->countPaisDeAlunos = DB::table('message_user')->where('message_id', '=', $message->id)->where('visualizado', 0)->where('user_id', $user->id)->count();
            }
            if($message->name == $user->name && $message->dataAt == $currentDate && $message->status == 1){
                $this->countPesquisarUser = DB::table('message_user')->where('message_id', '=', $message->id)->where('visualizado', 0)->where('user_id', $user->id)->count();
            }
        }

       // dump($this->countTodos, $this->countProfessorOrGestor, $this->countPaisDeAlunos, $this->countPesquisarUser);

        $this->countAll = $this->countTodos + $this->countProfessorOrGestor + $this->countPaisDeAlunos + $this->countPesquisarUser;


       // $this->CountNotifications = countTodos +







        }


    public function render()
    {





       // $this->dispatch('dispatch-notification-count.{$count->count()}')->to(Table::class);

        return view('livewire.message.count-notifications');
    }
}
