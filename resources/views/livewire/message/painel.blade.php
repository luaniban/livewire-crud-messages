<div>

  <div class="p-4 mt-8 ml-8 mr-8 bg-white rounded">
    <table class="flex-col items-center hidden min-w-full border divide-y divide-gray-200 md:table">



    <div class="mb-4 w-28">
        <x-ts-select.native wire:model='destinatarioSearch' class="w-24">
            <option wire:click="closeSearchUser()">Filtrar...</option>
            <option wire:click="closeSearchUser()">Todos</option>
            <option wire:click="closeSearchUser()">Professor</option>
            <option wire:click="closeSearchUser()">Gestor</option>
            <option wire:click="closeSearchUser()">Pais de Alunos</option>
            <option wire:click='pesquisarUsuario()'>Pesquisar Usuario</option>
        </x-ts-select.native>
    </div>

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
                    Lista de visualizações
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
                <x-table-td> <x-ts-button class="ml-12" icon="clipboard-document-list" color="blue" outline @click="$dispatch('dispatch-list-painel', { id: '{{ $user->id}}' })"></x-ts-button></x-table-td>

            </tr>

            @endforeach

        </tbody>


    </table>

    <div class="mt-4">
        {{ $users->links() }}
    </div>
    <livewire:message.painel-visualizacao/>
    @endif

    </div>
</div>
