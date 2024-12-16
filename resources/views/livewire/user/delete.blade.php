<div>
    <x-dialog-modal wire:model.live="modalDelete">
        <x-slot name="title">
            Form Delete User
        </x-slot>

        <x-slot name="content">
            <p>Tem certeza de excluir o cadastro ID: {{ $id }} e o nome do cliente: {{ $name }}?</p>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button @click="$wire.set('modalDelete', false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-danger-button @click="$wire.del()" class="ms-3" wire:loading.attr="disabled">
                {{ __('Delete') }}
            </x-danger-button>
        </x-slot>
    </x-dialog-modal>
</div>
