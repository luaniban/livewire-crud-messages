<div>


    <table class="flex-col items-center hidden min-w-full divide-y divide-gray-200 md:table">

        <div class="flex items-center gap-4 mb-4">
            <x-ts-button icon="folder-plus" color="emerald" class="mt-5 mb-4" outline @click="$dispatch('dispatch-message-table-create')">
                Criar mensagem
            </x-ts-button>


        <div class="flex items-center ">

     


            <x-ts-select.styled class="w-min-xl" placeholder="Filtrar por Destinatario" wire:model="destinatarioSearch" select="label:label|value:value" :options="[
                ['label' => 'Todos', 'value' => 'todos'],
                ['label' => 'Professor', 'value' => 'professor'],
                ['label' => 'Gestor', 'value' => 'gestor'],
                ['label' => 'Pais de Alunos', 'value' => 'pais de alunos'],
                ['label' => 'Pesquisar Usuário', 'value' => 'usuario'],

            ]" />
            <x-ts-button  icon="adjustments-vertical" wire:click="submit()" color="emerald" class="h-8 ml-4">Filtrar</x-ts-button>

        </div>
        @if($searchUsuarioTrueOrFalse)


            <div class="flex-col items-center p-2 mt-2 ml-4">
                <div class="flex items-center">
                    <x-ts-icon name="magnifying-glass" outline class="w-5 h-5 mr-2"/>

                    <input type="search" placeholder="Pesquisar..." aria-label="Search" wire:model.live="search" class="h-10 border-gray-300 rounded shadow-md">
                </div>
                @if(sizeof($usersSearch) > 0)
                    @foreach($usersSearch as $userSearch)

                    <div class="bg-gray-200 w-62 ml-7">
                        <button  class="w-full text-center bg-gray-100 " wire:model="destinatarioSearch">{{ $userSearch->name }}
                        </button>

                    </div>
                    @endforeach
                @endif


            </div>
        @endif
        <tr>
            <thead class="bg-gray-50">
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
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($users as $user)
            <tr class="hover:bg-gray-50">
                <x-table-td>{{ $user->id }}</x-table-td>
                <x-table-td>{{ $user->destinatario }}</x-table-td>
                <x-table-td>{{ $user->name }}</x-table-td>
                <x-table-td>{{ $user->titulo }}</x-table-td>

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
