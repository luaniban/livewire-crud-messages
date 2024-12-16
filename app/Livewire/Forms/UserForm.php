<?php

namespace App\Livewire\Forms;

use App\Models\User;
use App\Services\LogService;
use Livewire\Attributes\Validate;
use Livewire\Form;

class UserForm extends Form
{
    public ?User $user;

    // #[Locked]
    public $id;

    #[Validate('required', as: 'nome')]
    public $name = '';

    #[Validate('required|email', as: 'e-mail')]
    public $email = '';

    #[Validate('nullable', as: 'ultimo_acesso_at')]
    public $ultimo_acesso_at = '';

    #[Validate('required|string', as: 'cpf')]
    public $cpf = '';

    #[Validate('required|integer', as: 'matrícula')]
    public $matricula = '';

    #[Validate('required', as: 'data nascimento')]
    public $data_nascimento = '';

    #[Validate('required|integer', as: 'escola')]
    public $escola_id = '';

    #[Validate('required|integer', as: 'cargo')]
    public $cargo_id = '';

    public $selectedRoles = '';

    public function setUser(User $user) //Armazena ou Atualiza automaticamente preenche os campos
    {
        $this->user = $user->load('roles');

        $this->name = $user->name;
        $this->email = $user->email;
        $this->matricula = $user->matricula;
        $this->cpf = $user->cpf;
        $this->data_nascimento = $user->data_nascimento;
        $this->escola_id = $user->escola_id;
        $this->cargo_id = $user->cargo_id;

        $this->user->load('roles');
        $this->selectedRoles = $user->roles->pluck('id')->toArray();
    }

    public function store()
    {
        $user = User::create($this->except(['user']));

        $user->roles()->attach(3);
        $user->ativo = 1;

        LogService::sendCreateUserLog($user->id);

        $this->reset();
    }

    public function update()
    {
        $this->user->update($this->except(['user']));

        $this->user->roles()->sync($this->selectedRoles);

        LogService::sendUpdateteUserLog($this->user);

        $this->reset();

    }
}
