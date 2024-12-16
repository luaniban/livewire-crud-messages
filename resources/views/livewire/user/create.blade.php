<div>
    <x-ts-button @click="$wire.set('modalCreate', true)" color="teal" icon="user-plus" outline text="Novo usuário"></x-ts-button>

    <x-dialog-modal wire:model="modalCreate" submit="save">
        <x-slot name="title">
            Novo cadastro
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
                    <x-ts-input label="Matrícula" wire:model.blur="form.matricula" />
                </div>
                <div class="col-span-6">
                    <x-ts-input label="E-mail" wire:model.blur="form.email" />
                </div>
                <div class="col-span-6">
                    <x-model-escolas label="Escola" campo="form.escola_id" />
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
