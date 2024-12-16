<?php

namespace App\Livewire\User;

use App\Models\User;
use App\Services\LogService;
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

    #[On('dispatch-user-table-delete')]
    public function set_user($id, $name)
    {
        $this->id   = $id;
        $this->name = $name;

        $this->modalDelete = true;

        LogService::sendDeleteUserLog($id, $name);
    }

    public function del()
    {
        $user = User::find($this->id);

        $user->roles()->detach();

        $del = $user->destroy($this->id);

        ($del)
        ? $this->toast()->success('Cadastro excluído com sucesso!')->send()
        : $this->toast()->error('Cadastro não excluído!')->send();

        $this->modalDelete = false;

        $this->dispatch('dispatch-user-delete-del')->to(Table::class);
    }

    public function render()
    {
        return view('livewire.user.delete');
    }
}
