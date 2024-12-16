<div>
    <x-ts-button @click="$wire.set('modalCreate', true)" color="teal" icon="user-plus" text="Novo cadastro" outline></x-ts-button>

    <x-dialog-modal wire:model="modalCreate" submit="save">
        <x-slot name="title">
            Escola cadastro
        </x-slot>

        <x-slot name="content">
            <div class="grid grid-cols-12 gap-4">
                <div class="col-span-12">
                    <x-ts-errors />
                </div>
                <div class="col-span-8">
                    <x-ts-input label="Nome" wire:model="form.name" />
                </div>

                <div class="col-span-4">
                    <x-ts-select.styled placeholder="Selecione.." label="Status" wire:model="form.status"
                    select="label:label|value:value"
                    :options="[
                    ['label' => 'Ativo', 'value' => 1],
                    ['label' => 'Inativo', 'value' => 2],
                    ]" />
                </div>
                <div class="col-span-4">
                    <x-ts-input label="Bairro" wire:model="form.bairro" />
                </div>
                <div class="col-span-4">
                    <x-ts-select.styled placeholder="Selecione.." label="Região" wire:model.live="form.regiao"
                        select="label:label|value:value" :options="[
                            'Extremo-Sul',
                            'Sul',
                            'Centro-Sul ',
                            'Central',
                            'Centro-Norte',
                            'Norte',
                            'Extremo-Norte',
                            'SEDUC',
                        ]" />
                </div>
                <div class="col-span-8">
                    <x-ts-input label="Endereço" wire:model="form.endereco" />
                </div>
                <div class="col-span-4">
                    <x-ts-input label="Telefone" wire:model="form.telefone" />
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button @click="$wire.set('modalCreate', false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-button class="ms-3" wire:loading.attr="disabled" wire:click="save">
                {{ __('Save') }}
            </x-button>
        </x-slot>
    </x-dialog-modal>
</div>
