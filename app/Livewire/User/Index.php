<?php

namespace App\Livewire\User;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\Title;
use Livewire\Component;

class Index extends Component
{
    #[Title('User')]
    public function render(): View
    {
        return view('livewire.user.index');
    }
}
