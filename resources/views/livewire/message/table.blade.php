<div>


    <table class="flex-col items-center hidden min-w-full divide-y divide-gray-200 md:table">

        <div class="flex items-center gap-4 mb-4">
            <x-ts-button icon="folder-plus" color="emerald" class="mt-5" outline @click="$dispatch('dispatch-message-table-create')">
                Criar mensagem
            </x-ts-button>


            <div class="w-44">
                <x-ts-select.styled placeholder="Filtrar.." label="Destinátario" wire:click="destinatarioSearch" select="label:label|value:value" :options="[
            ['label' => 'Todos', 'value' => 'todos'],
            ['label' => 'Professor', 'value' => 'professor'],
            ['label' => 'Gestor', 'value' => 'gestor'],
            ['label' => 'Pais de Alunos', 'value' => 'pais de alunos'],
            ['label' => 'Pesquisar Usuário', 'value' => 'usuario'],
        ]" />
            <x-ts-button wire:click="">Filtrar</x-ts-button>




            </div>
        </div>
        <tr>
            <thead>
                <x-table-th>
                    ID
                </x-table-th>
                <x-table-th>
                    Destinatário
                </x-table-th>
                <x-table-th>
                   Nome
                </x-table-th>
                <x-table-th>
                   Titulo
                </x-table-th>
                <x-table-th>
                    Descricão
                </x-table-th>
                <x-table-th>
                    status
                </x-table-th>
                <x-table-th>
                    Data-at
                </x-table-th>
                <x-table-th>
                    Ações
                </x-table-th>
            </thead>
        </tr>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <x-table-td>{{ $user->id }}</x-table-td>
                <x-table-td>{{ $user->destinatario }}</x-table-td>
                <x-table-td>{{ $user->name }}</x-table-td>
                <x-table-td>{{ $user->titulo }}</x-table-td>
                <x-table-td>{{ $user->descricao }}</x-table-td>
                <x-table-td>{{ $user->status }}</x-table-td>
                <x-table-td>{{ $user->dataAt}}</x-table-td>
                <x-table-td>
                    <x-ts-button icon="pencil" color="gray"  outline @click="$dispatch('dispatch-message-table-edit', { id: '{{ $user->id}}' })"></x-ts-button>
                    <x-ts-button icon="x-mark" color="red" outline @click="$dispatch('dispatch-message-table-delete', { id: '{{ $user->id}}' })"></x-ts-button>
                </x-table-td>
            </tr>

            @endforeach

        </tbody>
    </table>

    <div class="mt-4">
        {{ $users->links() }}
    </div>

</div>
