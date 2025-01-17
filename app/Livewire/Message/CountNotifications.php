<?php

namespace App\Livewire\Message;
use App\Models\Message;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class CountNotifications extends Component
{
    public $destinatario, $countTodos, $countProfessor, $countGestor, $countPaisDeAlunos, $countUsuario, $countADM;

    #[On('dispatch-edit-concluida')]
    #[On('dispatch-message-table-create-criado')]
    #[On('dispatch-count')]
    public function mount() {

        $currentDate = Carbon::now()->toDateString();

        //dd($currentDate);




        $this->countTodos = Message::where('destinatario', 'Todos')->where('status', 1)->where('dataAt', '=', $currentDate)->count();
       //dd($this->countTodos);
        $this->countProfessor = Message::where('destinatario', 'Professor')->where('status', 1)->where('dataAt', '=', $currentDate)->count();
        $this->countGestor = Message::where('destinatario', 'Gestor')->where('status', 1)->where('dataAt', '=', $currentDate)->count();
        $this->countPaisDeAlunos = Message::where('destinatario', 'Pais de alunos')->where('status', 1)->where('dataAt', '=', $currentDate)->count();
        $this->countUsuario = Message::where('destinatario', 'usuario')->where('status', 1)->where('dataAt', '=', $currentDate)->count();
        
        $this->countADM = $this->countTodos + $this->countProfessor + $this->countGestor + $this->countPaisDeAlunos;
    }

    //#[On('dispatch-message-table-vizualizacao')]

    public function render()
    {





       // $this->dispatch('dispatch-notification-count.{$count->count()}')->to(Table::class);

        return view('livewire.message.count-notifications');
    }
}
