<?php

namespace App\Livewire\User;

use App\Livewire\Forms\UserForm;
use App\Models\{Role, User};
use Livewire\Attributes\On;
use Livewire\Component;
use TallStackUi\Traits\Interactions;

class Edit extends Component
{
    use Interactions;

    public UserForm $form;

    public $user;

    public $modalEdit = false;

    #[On('dispatch-user-table-edit')]
    public function set_user(User $id)
    {
        $this->form->setUser($id);

        $this->modalEdit = true;
    }

    public function edit()
    {
        $this->validate();

        $this->form->update();

        $this->toast()->success('Cadastro atualizado com sucesso!')->send();

        $this->dispatch('dispatch-user-create-edit')->to(Table::class);

        $this->modalEdit = false;

        return redirect()->route('user.index');
    }

    public function render()
    {
        $roles = Role::all();

        $user = User::find($this->user);

        return view('livewire.user.edit', [
            'roles' => $roles,
            'user'  => $user,
        ]);
    }
}
