<?php

namespace App\Livewire\Message;
use Livewire\Attributes\On;
use App\Models\Message;
use Livewire\Component;
use Illuminate\Support\Carbon;

class CountNotifications extends Component
{
    public $destinatario, $countTodos, $countProfessor, $countGestor, $countPaisDeAlunos, $countUsuario, $countADM;

    #[On('dispatch-edit-concluida')]
    #[On('dispatch-message-table-create-criado')]
    public function mount() {

        $currentDate = Carbon::now()->toDateTimeString();
        //dd($currentDate);

        //fazer a validação caso a data atual seja menor que a data especificada


        $this->countTodos = Message::where('destinatario', 'todos')->where('status', 1)->where('dataAt', '>=', $currentDate)->count();

        $this->countProfessor = Message::where('destinatario', 'professor')->where('status', 1)->where('dataAt', '>=', $currentDate)->count();
        $this->countGestor = Message::where('destinatario', 'gestor')->where('status', 1)->where('dataAt', '>=', $currentDate)->count();
        $this->countPaisDeAlunos = Message::where('destinatario', 'pais de alunos')->where('status', 1)->where('dataAt', '>=', $currentDate)->count();
        $this->countUsuario = Message::where('destinatario', 'usuario')->where('status', 1)->where('dataAt', '>=', $currentDate)->count();

        $this->countADM = $this->countTodos + $this->countProfessor + $this->countGestor + $this->countPaisDeAlunos;
    }

    //#[On('dispatch-message-table-vizualizacao')]

    public function render()
    {





       // $this->dispatch('dispatch-notification-count.{$count->count()}')->to(Table::class);

        return view('livewire.message.count-notifications');
    }
}
