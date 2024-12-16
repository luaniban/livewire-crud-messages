<div>
    <div class="flex justify-between mb-2 -mt-2">
        <x-ts-input icon="magnifying-glass" wire:model.live.debounce.500ms="search" placeholder="Pesquisar.." />
        <livewire:escola.create />
    </div>
    <div class="mt-4 overflow-x-auto bg-white rounded-lg shadow dark:bg-gray-900">
        <!-- Tabela para telas maiores -->
        <table class="hidden min-w-full divide-y divide-gray-200 md:table">
            <thead class="bg-gray-50">
                <tr>
                    <x-table-th @click="$wire.sortField('id')" class="text-center">
                        <x-sort :$sortDirection :$sortBy :field="'id'"/>ID
                    </x-table-th>

                    <x-table-th @click="$wire.sortField('name')" >
                        <x-sort :$sortDirection :$sortBy :field="'name'"/>Nome
                    </x-table-th>

                    <x-table-th @click="$wire.sortField('regiao')" >
                        <x-sort :$sortDirection :$sortBy :field="'regiao'"/>Região
                    </x-table-th>

                    <x-table-th @click="$wire.sortField('telefone')" >
                        <x-sort :$sortDirection :$sortBy :field="'telefone'"/>Telefone
                    </x-table-th>

                    <x-table-th class="text-center">Ações</x-table-th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @isset($data)
                    @foreach ($data as $escola)
                        <tr class="hover:bg-gray-50">
                            <x-table-td class="text-center">{{ $escola->id }}</x-table-td>

                            <x-table-td>
                                <span>{{ $escola->name }}</span><br>
                            </x-table-td>

                            <x-table-td>{{ $escola->regiao }}</x-table-td>

                            <x-table-td>{{ $escola->telefone }}</x-table-td>

                            <x-table-td class="text-center">

                                <x-ts-button icon="pencil" color="secondary"  outline
                                @click="$dispatch('dispatch-escola-table-edit', { id: '{{ $escola->id}}' })"/>

                                <x-ts-button icon="x-mark" color="red"  outline
                                @click="$dispatch('dispatch-escola-table-delete', {id: '{{ $escola->id }}', name: '{{ $escola->name }}' })"/>

                            </x-table-td>
                        </tr>
                    @endforeach
                @endisset
            </tbody>
        </table>
    </div>
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
