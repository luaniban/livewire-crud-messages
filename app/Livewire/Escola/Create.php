<?php

namespace App\Livewire\Escola;

use App\Livewire\Forms\EscolaForm;
use Livewire\Component;
use TallStackUi\Traits\Interactions;

class Create extends Component
{
    use Interactions;

    public EscolaForm $form;

    public $modalCreate = false;

    public function save()
    {
        $this->validate();

        $this->form->store();

        $this->toast()->success('Cadastro realizado com sucesso!')->send();

        $this->dispatch('dispatch-escola-create-save')->to(Table::class);

        $this->modalCreate = false;

        return redirect()->route('escola.index');
    }

    public function render()
    {
        return view('livewire.escola.create');
    }
}
