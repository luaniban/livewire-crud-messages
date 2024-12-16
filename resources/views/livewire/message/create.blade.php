<div>
    <div class="fixed inset-0 bg-gray-500 bg-opacity-50 flex justify-center items-center z-50">
        <div class="bg-white p-6 rounded-lg shadow-lg w-1/2">
            <h2 class="text-xl mb-4">Criar Nova Mensagem</h2>
            <div class="flex items-center mb-4  space-x-2">
                <x-ts-select.styled wire:model.live="cargo" wire:change="cargoState" label="Cargo" select="label:label|value:value" :options="[
                    ['label' => 'Todos', 'value' => 'todos'],
                    ['label' => 'Professor', 'value' => '2'],
                    ['label' => 'Gestor', 'value' => '3'],
                ]" />
                <x-ts-select.styled wire:model.prevent="destinatario" label="Destinatário" select="label:label|value:value" :options="$destinatarios" multiple/>

            </div>

            <x-ts-textarea wire:model="message" placeholder="Digite sua mensagem" label="Mensagem"></x-ts-textarea>

            <div class="mt-4 flex justify-end">
                <button wire:click="create" class="bg-blue-500 text-white px-4 py-2 rounded">Enviar</button>

                <button wire:click="$parent.closeMessageBox" class="bg-gray-500 text-white px-4 py-2 rounded ml-2">Fechar</button>
            </div>
        </div>
    </div>
</div>
