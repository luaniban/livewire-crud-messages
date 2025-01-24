<div>


    <table class="flex-col items-center hidden min-w-full border divide-y divide-gray-200 md:table">

        <div class="flex items-center gap-4 mb-4">
            <x-ts-button icon="folder-plus" color="emerald" class="mt-5 mb-4" outline @click="$dispatch('dispatch-message-table-create')">
                Criar mensagem
            </x-ts-button>


        <div class="flex items-center ">


        <x-ts-select.native wire:model='destinatarioSearch' >
            <option wire:click="closeSearchUser()">Filtrar...</option>
            <option wire:click="closeSearchUser()">Todos</option>
            <option wire:click="closeSearchUser()">Professor</option>
            <option wire:click="closeSearchUser()">Gestor</option>
            <option wire:click="closeSearchUser()">Pais de Alunos</option>
            <option wire:click='pesquisarUsuario()'>Pesquisar Usuario</option>
        </x-ts-select.native>

    

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

        @if($searchUser == true)
        <div class="flex-col items-center mt-2 mb-5">
            <div class="flex items-center mb-1">
                <x-ts-icon name="magnifying-glass" outline class="w-5 h-5 mr-2"/>

                <input type="search" placeholder="Pesquisar..." aria-label="Search" wire:model.live="search" class="border-gray-300 rounded shadow-md ">
            </div>
        </div>
            @if(sizeof($pesquisarUsers) > 0)
                <tbody class="bg-white divide-y divide-gray-200 ">
                    @foreach($pesquisarUsers as $pesquisarUser)

                        <tr class="hover:bg-gray-50">
                            <x-table-td>{{ $pesquisarUser->id }}</x-table-td>
                            <x-table-td>{{ $pesquisarUser->destinatario }}</x-table-td>
                            <x-table-td>{{ $pesquisarUser->name }}</x-table-td>
                            <x-table-td>{{ $pesquisarUser->titulo }}</x-table-td>
                            <x-table-td>{{ $pesquisarUser->status }}</x-table-td>
                            <x-table-td>{{ $pesquisarUser->dataAt}}</x-table-td>
                            <x-table-td>
                                <x-ts-button icon="pencil" color="gray"  outline @click="$dispatch('dispatch-message-table-edit', { id: '{{ $pesquisarUser->id}}' })"></x-ts-button>
                                <x-ts-button icon="x-mark" color="red" outline @click="$dispatch('dispatch-message-table-delete', { id: '{{ $pesquisarUser->id}}' })"></x-ts-button>
                            </x-table-td>
                        </tr>


                    @endforeach
                </tbody>
            </table>

            <div class="mt-4">
                {{ $users->links() }}
            </div>
            @endif
        @endif


    @if($searchUser == false)
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
    @endif


</div>
