<?php

namespace App\Livewire\Escola;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\Title;
use Livewire\Component;

class Index extends Component
{
    #[Title('Escola')]
    public function render(): View
    {
        return view('livewire.escola.index');
    }
}
