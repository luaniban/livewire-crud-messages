<div>
    <div class="grid grid-cols-12 gap-4">
        <div class="col-span-4">
            <x-ts-input icon="magnifying-glass" wire:model.live.debounce.500ms="search" placeholder="Pesquisar.." />
        </div>
        <div class="col-span-4">
            <x-model-escolas placeholder="Escola.." campo="form.escola_id" />
        </div>
        <div class="col-span-2">
        </div>
        <div class="col-span-2">
            <livewire:user.create />
        </div>
    </div>
    <table class="min-w-full mt-2 divide-y divide-gray-200">
        @if($data->isNotEmpty())
        <thead>
            <tr>
                <x-table-th @click="$wire.sortField('id')" class="text-center">
                    <x-sort :$sortDirection :$sortBy :field="'id'" />ID
                </x-table-th>

                <x-table-th @click="$wire.sortField('name')">
                    <x-sort :$sortDirection :$sortBy :field="'name'" />Nome
                </x-table-th>

                <x-table-th>Perfil</x-table-th>

                <x-table-th @click="$wire.sortField('escola_id')">
                    <x-sort :$sortDirection :$sortBy :field="'escola_id'" />Escola
                </x-table-th>

                <x-table-th></x-table-th>
            </tr>
        </thead>
        @endif
        <tbody>
            @forelse ($data as $user)
            <tr class="text-xs">
                <x-table-td class="text-center">{{ $user->id }}</x-table-td>

                <x-table-td>
                    <span>{{ $user->name }} - {{ $user->matricula }}</span><br>
                    <span class="text-xs text-slate-500">{{ $user->email }}</span>
                </x-table-td>

                <x-table-td>{{ $user->roles->first()->title }}</x-table-td>

                <x-table-td>{{ $user->escola->name }}</x-table-td>

                <x-table-td class="space-x-1 text-center">

                    <x-ts-button icon="pencil" color="secondary" outline text="Editar"
                        @click="$dispatch('dispatch-user-table-edit', { id: '{{ $user->id}}' })" />

                    <x-ts-button icon="finger-print" color="teal" outline wire:click="resetPassword({{ $user->id }})"
                        text="Senha" />
                    @can('admin_access')
                    <x-ts-button icon="x-mark" color="red" outline
                        @click="$dispatch('dispatch-user-table-delete', {id: '{{ $user->id }}', name: '{{ $user->name }}' })"
                        text="Excluir" />

                    <x-ts-button xl icon="user" color="blue" outline href="{{ route('impersonate', $user->id) }}" />
                    @endcan

                </x-table-td>
            </tr>
            @empty
            <div class="my-20 text-center">
                <span class="text-red-700 dark:text-red-700">Sem resultado dessa pesquisa: {{ $search }}</span>
            </div>
            @endforelse
        </tbody>
    </table>
    @if($data->isNotEmpty())
    <div class="flex px-2 py-3 space-x-2 rounded-md dark:bg-gray-900 bg-gray-50">
        <div class="w-full">
            {{ $data->onEachSide(1)->links() }}
        </div>
        <div class="-mt-0.5">
            <x-ts-select.native wire:model.live="paginate" :options="[
            ['label' => '5 por página', 'value' => 5],
            ['label' => '10 por página', 'value' => 10],
            ['label' => '25 por página', 'value' => 25],
            ['label' => '50 por página', 'value' => 50],
            ['label' => '100 por página', 'value' => 100],
            ['label' => '1000 por página', 'value' => 1000],
        ]" select="label:label|value:value" />
        </div>
    </div>
    @endif
</div>
