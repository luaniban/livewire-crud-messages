<?php
namespace App\Livewire\Message;
use Livewire\Attributes\On;
use App\Models\Message;
use Illuminate\Testing\Fluent\Concerns\Interaction;
use TallStackUi\Traits\Interactions;


use Livewire\Component;

class EnvioDaMensagem extends Component
{

    use Interactions;


    public $modalMessage = false;


    public function mount()
    {
        // Carregar o estado do modal a partir da sessão, se existir
        $this->modalMessage = session('modalMessage', false);
    }

    #[On('dispatch-message-table-send')]
    public function openModalMessage() {

        $this->toast()->success('Mensagem enviada com sucesso!')->send();
        $this->modalMessage = true;
        session(['modalMessage' => true]);
    }


    public function closeModalMessage() {
        $this->modalMessage = false;
        session(['modalMessage' => false]);
    }

    public function render()
    {

        return view('livewire.message.envio-da-mensagem');
    }
}
