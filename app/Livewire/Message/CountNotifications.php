<?php

namespace App\Livewire\Message;
use Livewire\Attributes\On;
use App\Models\Message;
use Livewire\Component;

class CountNotifications extends Component
{
    public $user, $destinatario;


    //#[On('dispatch-message-table-vizualizacao')]
    public function render()
    {

        //$count = Message::where('destinatario', 'professor')->count();

       // $this->dispatch('dispatch-notification-count.{$count->count()}')->to(Table::class);

        return view('livewire.message.count-notifications');
    }
}
