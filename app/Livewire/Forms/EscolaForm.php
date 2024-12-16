<?php

namespace App\Livewire\Forms;

use App\Models\Escola;
use Livewire\Attributes\Validate;
use Livewire\Form;

class EscolaForm extends Form
{
    public ?Escola $escola;

    // #[Locked]
    public $id;

    #[Validate('required|string', as: 'nome')]
    public $name;

    #[Validate('required|string', as: 'região')]
    public $regiao;

    #[Validate('required|string', as: 'bairro')]
    public $bairro;

    #[Validate('required|string', as: 'endereço')]
    public $endereco;

    #[Validate('required|string', as: 'telefone')]
    public $telefone;

    #[Validate('required', as: 'status')]
    public $status;

    public function setEscola(Escola $escola) //Armazena ou Atualiza automaticamente preenche os campos
    {
        $this->escola = $escola;

        $this->name = $escola->name;
        $this->regiao = $escola->regiao;
        $this->bairro = $escola->bairro;
        $this->endereco = $escola->endereco;
        $this->telefone = $escola->telefone;
        $this->status = $escola->status;
    }

    public function store()
    {
        Escola::create($this->except(['escola']));

        $this->reset();
    }

    public function update()
    {
        $this->escola->update($this->except(['escola']));

        $this->reset();
    }
}
