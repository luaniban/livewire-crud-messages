<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Component;
use App\Livewire\Forms\UserForm;
use TallStackUi\Traits\Interactions;

class Create extends Component
{
    use Interactions;

    public UserForm $form;

    public $modalCreate = false;


    public function updatedFormEmail()
    {
        $this->validateEmail();
    }

    public function validateEmail()
    {
        if (!empty($this->form->email)) {
            $existingUser = User::where('email', $this->form->email)->first();
            if ($existingUser) {
                $this->addError('form.email', 'Este Email já está cadastrado.');
                $this->toast()->error('Email já cadastrado')->send();
            } else {
                $this->resetErrorBag('form.email');
                $this->toast()->success('Email disponível para cadastro')->send();
            }
        }
    }

    public function updatedFormMatricula()
    {
        $this->validateMatricula();
    }

    public function validateMatricula()
    {
        if (!empty($this->form->matricula)) {
            $existingUser = User::where('matricula', $this->form->matricula)->first();
            if ($existingUser) {
                $this->addError('form.matricula', 'Este matrícula já está cadastrado.');
                $this->toast()->error('Matrícula já cadastrado')->send();
            } else {
                $this->resetErrorBag('form.matricula');
                $this->toast()->success('Matrícula disponível para cadastro')->send();
            }
        }
    }

    public function save()
    {
        $this->validateEmail();
        $this->validateMatricula();

        if ($this->getErrorBag()->hasAny(['form.email', 'form.matricula'])) {
            return;
        }

        $this->validate();

        $this->form->store();

        $this->toast()->success('Cadastro realizado com sucesso!')->send();

        $this->dispatch('dispatch-User-create-save')->to(Table::class);

        $this->modalCreate = false;

        return redirect()->route('user.index');
    }

    public function render()
    {
        return view('livewire.user.create');
    }
}
