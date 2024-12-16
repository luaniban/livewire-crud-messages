<?php

namespace App\Livewire\Escola;

use App\Models\Escola;
use App\Traits\WithSorting;
use App\Livewire\Forms\EscolaForm;
use Livewire\Attributes\{On, Url};
use Illuminate\Support\Facades\Gate;
use Livewire\{Component, WithPagination};
use Symfony\Component\HttpFoundation\Response;

class Table extends Component
{
    use WithPagination;
    use WithSorting;

    public EscolaForm $form;

    public $paginate = 5;

    public $sortBy = 'escolas.updated_at';

    public $sortDirection = 'desc';

    #[Url]
    public string $search = '';

    protected $queryString = [
        'search'   => ['except' => ''],
        'paginate' => ['except' => '5'],
    ];

    #[On('dispatch-escola-create-save')]
    #[On('dispatch-escola-create-edit')]
    #[On('dispatch-escola-delete-del')]
    public function render()
    {
        abort_if(Gate::denies('diretor_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $data = Escola::pesquisa($this->search)
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate($this->paginate);

        return view('livewire.escola.table', compact('data'));
    }
}
