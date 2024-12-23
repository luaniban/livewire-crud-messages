<?php

namespace App\Livewire\Message;
use Livewire\Attributes\On;
use App\Models\Message;
use Livewire\Component;

class CountNotifications extends Component
{
    public $user, $destinatario, $countTodos, $countProfessor, $countGestor, $countPaisDeAlunos, $countUsuario, $countADM;


    public function mount() {

        $this->countTodos = Message::where('destinatario', 'todos')->count();
        $this->countProfessor = Message::where('destinatario', 'professor')->count();
        $this->countGestor = Message::where('destinatario', 'gestor')->count();
        $this->countPaisDeAlunos = Message::where('destinatario', 'pais de alunos')->count();
        $this->countUsuario = Message::where('destinatario', 'usuario')->count();

        $this->countADM = $this->countTodos + $this->countProfessor + $this->countGestor + $this->countPaisDeAlunos;
    }

    //#[On('dispatch-message-table-vizualizacao')]
    public function render()
    {





       // $this->dispatch('dispatch-notification-count.{$count->count()}')->to(Table::class);

        return view('livewire.message.count-notifications');
    }
}
