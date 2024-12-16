<?php

namespace App\Livewire\Escola;

use App\Livewire\Forms\EscolaForm;
use App\Models\Escola;
use Livewire\Attributes\On;
use Livewire\Component;
use TallStackUi\Traits\Interactions;

class Edit extends Component
{
    use Interactions;

    public EscolaForm $form;

    public $modalEdit = false;

    #[On('dispatch-escola-table-edit')]
    public function set_escola(Escola $id)
    {
        $this->form->setEscola($id);

        $this->modalEdit = true;
    }

    public function edit()
    {
        $this->validate();

        $this->form->update();

        $this->toast()->success('Cadastro atualizado com sucesso!')->send();

        $this->dispatch('dispatch-escola-create-edit')->to(Table::class);

        $this->modalEdit = false;

        return redirect()->route('escola.index');
    }

    public function render()
    {
        return view('livewire.escola.edit');
    }
}
