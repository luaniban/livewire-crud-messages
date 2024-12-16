<div>


    <table class="flex-col items-center hidden min-w-full divide-y divide-gray-200 md:table">

        <div class="flex items-center gap-4 mb-4">
            <x-button class="mt-5" @click="$wire.set('createBox', true)">
                Criar menssagem
            </x-button>

            <div class="w-36">
                <x-ts-select.styled placeholder="Selecione.." label="Cargo" wire:model="cargo" select="label:label|value:value" :options="[
            ['label' => 'Todos', 'value' => 'todos'],
            ['label' => 'Professor', 'value' => 'admin'],
            ['label' => 'Gestor', 'value' => 'gestor'],
        ]" />


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
                    Cargo
                </x-table-th>
                <x-table-th>
                    Descrição
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
                <x-table-td>{{ $user->name }}</x-table-td>
                <x-table-td>{{ $user->cargo }}</x-table-td>
                <x-table-td>{{ $user->descricao }}</x-table-td>
                <x-table-td>
                    <x-ts-button icon="pencil" outline @click="$dispatch('dispatch-message-table-edit', { id: '{{ $user->id}}' })"></x-ts-button>
                    <x-ts-button icon="x-mark" color="red" outline @click="$dispatch('dispatch-message-table-delete', { id: '{{ $user->id}}' })"></x-ts-button>
                </x-table-td>
            </tr>

            @endforeach

        </tbody>
    </table>
    @if($createBox== true)
    @livewire('message.create')
    @endif

</div>
