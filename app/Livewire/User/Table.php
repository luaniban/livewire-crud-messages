<?php

namespace App\Livewire\User;

use App\Livewire\Forms\UserForm;
use App\Models\User;
use App\Traits\WithSorting;
use Illuminate\Support\Facades\{Gate, Hash};
use Livewire\Attributes\{On, Url};
use Livewire\{Component, WithPagination};
use Symfony\Component\HttpFoundation\Response;
use TallStackUi\Traits\Interactions;

class Table extends Component
{
    use Interactions;
    use WithPagination;
    use WithSorting;

    public UserForm $form;

    public $paginate = 5;

    public $sortBy = 'users.updated_at';

    public $sortDirection = 'desc';

    public $selectedEscola ;

    #[Url]
    public string $search = '';

    protected $queryString = [
        'search'   => ['except' => ''],
        'paginate' => ['except' => '5'],
    ];

    #[On('dispatch-user-create-save')]
    #[On('dispatch-user-create-edit')]
    #[On('dispatch-user-delete-del')]
    public function render()
    {
        abort_if(Gate::denies('diretor_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $data = User::pesquisa($this->search)

            ->escola_id($this->selectedEscola)

            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate($this->paginate);

        return view('livewire.user.table', compact('data'));
    }

    public function resetPassword(User $user)
    {
        $user->password = Hash::make('Atividade1!');

        $user->save();

        $this->toast()->success('Senha redefinida para Atividade1!')->send();
    }
}
