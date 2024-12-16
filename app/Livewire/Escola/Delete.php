<?php

namespace App\Livewire\Escola;

use App\Models\Escola;
use Livewire\Attributes\{Locked, On};
use Livewire\Component;
use TallStackUi\Traits\Interactions;

class Delete extends Component
{
    use Interactions;

    #[Locked]
    public $id;

    #[Locked]
    public $name;

    public $modalDelete = false;

    #[On('dispatch-escola-table-delete')]
    public function set_escola($id, $name)
    {
        $this->id   = $id;
        $this->name = $name;

        $this->modalDelete = true;
    }

    public function del()
    {
        $del = Escola::destroy($this->id);

        ($del)
        ? $this->toast()->success('Cadastro excluído com sucesso!')->send()
        : $this->toast()->error('Cadastro não excluído!')->send();

        $this->modalDelete = false;

        $this->dispatch('dispatch-escola-delete-del')->to(Table::class);
    }

    public function render()
    {
        return view('livewire.escola.delete');
    }
}
