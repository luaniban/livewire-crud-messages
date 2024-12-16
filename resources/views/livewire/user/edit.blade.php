<div>
    <x-dialog-modal wire:model.live="modalEdit" submit="edit">
        <x-slot name="title">
            Form Edit User
        </x-slot>
        <x-slot name="content">

            <div class="grid grid-cols-12 gap-4 mb-24">

                <div class="col-span-12">
                    <x-ts-errors />
                </div>
                <div class="col-span-6">
                    <x-ts-input label="Nome" wire:model="form.name" />
                </div>
                <div class="col-span-6">
                    <x-model-escolas label="Escola" campo="form.escola_id" />
                </div>
                <div class="col-span-6">
                    <x-ts-input label="E-mail" wire:model="form.email" />
                </div>
                <div class="col-span-6">
                    <x-ts-input label="Matrícula" wire:model="form.matricula" />
                </div>
                <div class="col-span-6">
                    <x-ts-select.styled label="Perfil" wire:model="form.selectedRoles" :options="[
                        ['label' => 'Administrador', 'value' => 1],
                        ['label' => 'Formador', 'value' => 2],
                        ['label' => 'Coordenador', 'value' => 3],
                        ['label' => 'Professor', 'value' => 4],
                    ]" select="label:label|value:value" />
                </div>
                <div class="col-span-6">
                    <x-radio-status label="É professor?"
                    campo="form.ativo"/>
                </div>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-secondary-button @click="$wire.set('modalEdit', false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-button class="ms-3" wire:loading.attr="disabled" wire:click="edit">
                {{ __('Atualizar') }}
            </x-button>
        </x-slot>
    </x-dialog-modal>
</div>
